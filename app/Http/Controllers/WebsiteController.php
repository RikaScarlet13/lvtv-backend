<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return redirect()->back()->with('success', 'Account created successfully.');
    }

    public function loginAdmin(){
        return view("loginAdmin");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
    
            // Update last login timestamp
            $user->last_login_at = now();
            $user->save();
    
            // Check if user is approved or super admin
            if ($user->is_approved || $user->role === 'super_admin') {
                // Redirect based on user role
                switch ($user->role) {
                    case 'super_admin':
                    case 'admin':
                    case 'streamer':
                        return redirect()->intended('/home');
                        break;
                    case 'viewer':
                    default:
                        return redirect()->intended('/');
                        break;
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
    
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->last_logout_at = now();
        $user->save();
    
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }    
 
    public function usersPage()
    {
        // Fetch only approved users or super admins
        $users = User::where('is_approved', true)
                     ->orWhere('role', 'super_admin')
                     ->get();
    
        return view("pages.usersPage", compact('users'));
    }
    
    
    public function archives(){
        return view("pages.archives");
    }

    public function logs()
    {
        // Fetch users who have logged in or logged out
        $users = User::whereNotNull('last_login_at')->orWhereNotNull('last_logout_at')->get();

        return view('pages.logs', compact('users'));
    }

    public function sidebar(){
        return view("sidebar");
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('usersPage')->with('success', 'User deleted successfully');
    }

    public function updateRole(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'role' => 'required|in:viewer,admin,streamer', // Update according to your roles
        ]);

        // Check if the authenticated user is a super admin
        if (!in_array(auth()->user()->role, ['super_admin'])) {
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        }

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user's role
        $user->role = $request->role;
        $user->save();

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
        // Check if the authenticated user is a super admin or admin
        if (!in_array(auth()->user()->role, ['super_admin', 'admin'])) {
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        }
    
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();
    
        return redirect()->route('approval')->with('success', 'User approved successfully.');
    }
    
    public function denyUser($id)
    {
        // Check if the authenticated user is a super admin or admin
        if (!in_array(auth()->user()->role, ['super_admin', 'admin'])) {
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        }
    
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('approval')->with('success', 'User denied and deleted successfully.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query users based on search term
        $users = User::where('name', 'like', '%'.$searchTerm.'%')
                    ->orWhere('role', 'like', '%'.$searchTerm.'%')
                    ->get();
    
        // Load the usersPage view with filtered users
        return $this->usersPage()->with('users', $users);
    }

    public function ourStory()
    {
        return view('pages.web.our-story');
    }
    
    
}
