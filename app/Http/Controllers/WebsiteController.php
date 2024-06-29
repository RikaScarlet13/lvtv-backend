<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserActivityLog;

class WebsiteController extends Controller
{
    public function index(){
        $users = User::where('is_approved', true)
                     ->orWhere('role', 'super_admin')
                     ->get();
        return view("home", compact('users'));
    }
    
    public function createAdminPage(){
        return view("createAdminPage");
    }

    public function storeAdmin(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user with the default role as viewer
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'viewer', // Default role
            'is_approved' => false, // New users need approval
        ]);

        // Redirect or return response
        return redirect()->back()->with('success', 'Account created successfully. Please wait for our Admins approval.');
    }

    public function loginAdmin(){
        return view("loginAdmin");
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
    
            // Update last login timestamp
            $user->last_login_at = now();
            $user->save();
    
            // Log login activity
            UserActivityLog::create([
                'user_id' => $user->id,
                'activity' => 'logged in',
                'timestamp' => now(),
            ]);
    
            // Check if user is approved or super admin
            if ($user->is_approved || $user->role === 'super_admin') {
                switch ($user->role) {
                    case 'super_admin':
                    case 'admin':
                    case 'streamer':
                        return redirect()->intended('/home');
                    case 'viewer':
                    default:
                        return redirect()->intended('/');
                }
            } else {
                Auth::logout();
                return back()->with('status', 'account_pending_approval');
            }
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }    
    
    public function logout(Request $request){
        $user = Auth::user();
        $user->last_logout_at = now();
        $user->save();
    
        // Log logout activity
        UserActivityLog::create([
            'user_id' => $user->id,
            'activity' => 'logged out',
            'timestamp' => now(),
        ]);
    
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/loginAdmin');
    }

    public function usersPage(Request $request)
    {
        $query = User::query();

        // Handle search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")  // Added email search
                  ->orWhere('role', 'LIKE', "%{$search}%");
            });
        }

        // Handle role filtering functionality
        if ($request->filled('role')) {
            $role = $request->input('role');
            $query->where('role', $role);
        }

        // Exclude unapproved users
        $query->where('is_approved', 1);

        $users = $query->get();

        return view('pages.usersPage', compact('users'));
    }   
    
    public function archives(){
        return view("pages.archives");
    }

    public function logs()
    {
        $logs = UserActivityLog::with('user')->latest()->get();

        return view('pages.logs', compact('logs'));
    }

    public function sidebar(){
        return view("sidebar");
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $userName = $user->name;
        $user->delete();

        // Log deletion activity
        UserActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => "deleted user {$userName}",
            'timestamp' => now(),
        ]);

        return redirect()->route('usersPage')->with('success', 'User deleted successfully');
    }

    public function updateRole(Request $request, $id){
        $request->validate([
            'role' => 'required|in:viewer,admin,streamer',
        ]);

        if (!in_array(auth()->user()->role, ['super_admin'])) {
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        }

        $user = User::findOrFail($id);
        $oldRole = $user->role;
        $user->role = $request->role;
        $user->save();

        // Log role change activity
        UserActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => "changed role of user {$user->name} from {$oldRole} to {$request->role}",
            'timestamp' => now(),
        ]);

        return redirect()->back()->with('success', 'User role updated successfully.');
    }

    public function showPendingApprovals()
    {
        // Check if the authenticated user is a super admin or admin
        if (!in_array(auth()->user()->role, ['super_admin', 'admin'])) {
            return redirect()->back()->with('error', 'You are not authorized to access this page.');
        }

        // Fetch users who are not approved and not super admins
        $users = User::where('is_approved', false)
                    ->where('role', '!=', 'super_admin')
                    ->get();

        return view('approval', compact('users'));
    }

    public function approveUser($id)
    {
        if (!in_array(auth()->user()->role, ['super_admin', 'admin'])) {
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        }
    
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();
    
        // Log approval activity
        UserActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => "approved user {$user->name}",
            'timestamp' => now(),
        ]);
    
        return redirect()->route('approval')->with('success', 'User approved successfully.');
    }
    
    public function denyUser($id)
    {
        if (!in_array(auth()->user()->role, ['super_admin', 'admin'])) {
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        }
    
        $user = User::findOrFail($id);
        $user->delete();
    
        // Log denial activity
        UserActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => "denied and deleted user {$user->name}",
            'timestamp' => now(),
        ]);
    
        return redirect()->route('approval')->with('success', 'User denied and deleted successfully.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query users based on search term
        $users = User::where('name', 'like', '%'.$searchTerm.'%')
                    ->orWhere('email', 'like', '%'.$searchTerm.'%')  // Added email search
                    ->orWhere('role', 'like', '%'.$searchTerm.'%')
                    ->where('is_approved', 1)  // Exclude unapproved users
                    ->get();
    
        // Load the usersPage view with filtered users
        return $this->usersPage()->with('users', $users);
    }
}

