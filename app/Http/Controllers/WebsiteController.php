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

    public function createAdminForm()
    {
        return view('createAdmin');
    }

    public function storeAdmin(Request $request)
    {
        // Validate the request data including custom password rule and terms acceptance
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-zA-Z])(?=.*[@!#])(?=.*\d).{8,}$/'
            ],
            'terms' => 'accepted'
        ], [
            'password.regex' => 'The password must contain at least one letter, one number, and one special character (@, !, #).',
            'terms.accepted' => 'You must accept the terms and conditions to register.'
        ]);

        // Check if the email domain is allowed
        $allowedDomains = ['laverdad.edu.ph', 'student.laverdad.edu.ph'];
        $emailDomain = explode('@', $request->email)[1];
        if (!in_array($emailDomain, $allowedDomains)) {
            return back()->withErrors(['email' => 'You are not authorized to register with this email domain.']);
        }

        // Create the user with the default role as viewer
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'viewer', // Default role
            'is_approved' => false, // New users need approval
        ]);

        // Redirect or return response with success message
        return redirect()->back()->with('success', 'Account created successfully. Please wait for our Admins approval.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return response()->json(['success' => false, 'field' => 'email', 'message' => 'The provided credentials do not match our records.']);
        }
    
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['success' => false, 'field' => 'password', 'message' => 'Wrong password.']);
        }
    
        if (!$user->is_approved && $user->role !== 'super_admin') {
            return response()->json(['success' => false, 'field' => 'status', 'message' => 'Your account is pending approval. Please wait for admin approval.']);
        }
    
        Auth::login($user);
    
        // Update last login timestamp
        $user->last_login_at = now();
        $user->save();
    
        // Log login activity
        UserActivityLog::create([
            'user_id' => $user->id,
            'activity' => 'logged in',
            'timestamp' => now(),
        ]);
    
        return response()->json(['success' => true, 'redirectUrl' => ($user->role === 'viewer' ? '/auth-home' : '/home')]);
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

        return redirect('/');
    }    

    // public function usersPage(Request $request)
    // {
    //     $query = User::query();

    //     // Handle search functionality
    //     if ($request->filled('search')) {
    //         $search = $request->input('search');
    //         $query->where(function ($q) use ($search) {
    //             $q->where('name', 'LIKE', "%{$search}%")
    //               ->orWhere('email', 'LIKE', "%{$search}%")  // Added email search
    //               ->orWhere('role', 'LIKE', "%{$search}%");
    //         });
    //     }

    //     // Handle role filtering functionality
    //     if ($request->filled('role')) {
    //         $role = $request->input('role');
    //         $query->where('role', $role);
    //     }

    //     // Exclude unapproved users
    //     $query->where('is_approved', 1);

    //     $users = $query->get();

    //     return view('pages.usersPage', compact('users'));
    // }   
    
    // public function archives(){
    //     return view("pages.archives");
    // }

    // public function logs(Request $request)
    // {
    //     // Initialize query
    //     $query = UserActivityLog::query();
    
    //     // Handle filtering
    //     $filter = $request->input('filter');
    
    //     if ($filter) {
    //         $query->where('activity', $filter);
    //     }
    
    //     // Fetch logs
    //     $logs = $query->with('user')->orderBy('timestamp', 'desc')->get();
    
    //     // Return view with logs and filter value for sticky selection
    //     return view('pages.logs', compact('logs', 'filter'));
    // }    

    public function logs(Request $request)
{
    // Initialize query
    $query = UserActivityLog::query();

    // Handle filtering
    $filter = $request->input('filter');

    if ($filter) {
        $query->where('activity', $filter);
    }

    // Paginate logs
    $logs = $query->with('user')->orderBy('timestamp', 'desc')->paginate(20); // 20 logs per page

    // Return view with logs and filter value for sticky selection
    return view('pages.logs', compact('logs', 'filter'));
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

    public function ourStory()
    {
        return view('pages.web.our-story');
    }

    public function bab()
    {
        return view('pages.web.bab');
    }
    public function ict()
    {
        return view('pages.web.ict');
    }

    // AUTH
    public function authHome()
    {
        return view('pages.auth-web.home');
    }

    public function teleradio()
    {
        return view('pages.auth-web.teleradio');
    }
    
    public function archives()
    {
        return view('pages.auth-web.archives');
    }

    public function authBab()
    {
        return view('pages.auth-web.bab');
    }
    public function authIct()
    {
        return view('pages.auth-web.ict');
    }
    
    public function authOurStory()
    {
        return view('pages.auth-web.our-story');
    }
    
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ]);
        }

        // Update User
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return response()->json([
            'success' => true,
        ]);
    }

    public function showOwncast()
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login if not authenticated
        }

        // Redirect to the Owncast instance
        return redirect()->away('https://owncastlvtv.online/'); // Assuming Owncast runs on localhost:8080
    }

    public function showOwncastAdmin()
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to login if not authenticated
        }

        // Redirect to the Owncast instance
        return redirect()->away('https://owncastlvtv.online/admin'); // Assuming Owncast runs on localhost:8080
    }
    public function usersPage(Request $request)
    {
        $query = User::query();

        // Handle search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
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

        $users = $query->paginate(5); // Adjust the number of users per page as needed

        return view('pages.usersPage', compact('users'));
    }

}
