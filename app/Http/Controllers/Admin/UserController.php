<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    // public function add_user(Request $request)
    // {    
        
       
       
    //     if ($request->isMethod('post')) {
             
    //         $request->validate([
    //             'first' => 'required|string|max:255',
    //             'last'  => 'required|string|max:255',
    //             'email'      => 'required|email|unique:admins,email',
    //             'phone'      => 'required|numeric',
    //             'password'   => 'required|min:8|confirmed', // Requires a 'password_confirmation' field in HTML
    //             'role' => 'required'
    //         ]);
            
            
    
    //         try {
    //             // 2. Create the User
    //             $user = new Admin();
    //             $user->first_name    = $request->first;
    //             $user->last_name     = $request->last;
    //             $user->email    = $request->email;
    //             $user->phone    = $request->phone;
    //             $user->password = Hash::make($request->password); 
    
    //             // 3. Assign Roles based on your Checkboxes
    //             // If the checkbox is unchecked, it won't be in $request, so ->has() returns false (0)
    //             $user->role              = $request->role;
             
    //             $user->is_active = $request->user_status;
    
    //             if ($user->save()) {
    //                 session()->flash('success', 'User created successfully with assigned roles!');
    //                 return redirect()->route('admin.manage_users');
    //             }
    
    //         } catch (\Exception $e) {
    //             session()->flash('error', 'Error creating user: ' . $e->getMessage());
    //             return redirect()->back()->withInput();
    //         }
    
    //     } else {
            
    //         $currentPage = "manage_users";
    //         return view('admin.users-ops',['currentPage'=>$currentPage]);
    //     }
    // }
    public function user_edit($id, Request $request){
            $decrptedid = Crypt::decrypt($request->id);
        $user = User::findorFail($decrptedid);
        
        if(!$user){
            return back()->with('error','User Not Found');
        }
        
        if($request->ismethod('Post')){
            
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,'.$user->id,
                'email' => 'required|email|unique:users,email,'.$user->id,
                'phone' => 'required|numeric',
            ]);
            
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->is_active = $request->user_status == 1 ? 1 : 0;
            
            if($user->save()){
                return back()->with('success','User Updated Successfully');
            }
            else{
                return back()->with('error','Error Updating User');
            }
        }
        else{
            $user->encrypted_id = $request->id;
            return view('admin.users-ops',['user'=>$user]);
        }
    
    }
    
    public function manageUsers()
    {
        $users = User::with('instagram')->get();
        foreach ($users as $user) {
            $user->encrypted_id = Crypt::encrypt($user->id);
        }

        $model = Crypt::encrypt('User');
        $currentPage = "manage_users";
        
        return view('admin.manage_users', ['users' => $users, 'model' => $model, "currentPage" => $currentPage]);
    }
    
    public function user_data(){
                $user = User::query();
                return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('name', function($user){
                return $user->name;
            })
            ->addColumn('role', function($user){ 
                 
                return $user->role; 
            })
                        ->addColumn('email', function($user){ 
                return $user->email; 
            })
                        ->addColumn('phone', function($user){ 
                return $user->phone; 
            })
            ->addColumn('is_subscribed', function($user){
                    $status = $user->hasActiveSubscription() ? 'Paid' : 'Un-Paid';
                    $class = $status == 'Paid' ? 'success' : 'secondary';
                    return '<span class="badge bg-'.$class.'">'.$status.'</span>';
                })
                ->addColumn('is_instagram_connected', function($user){
                    $isConnected = $user->instagram?->connection_status == 1;
                    
                    return $isConnected 
                        ? '<button class="btn btn-sm btn-success">Connected</button>' 
                        : '<button class="btn btn-sm btn-outline-danger">Not Linked</button>';
                })
            ->addColumn('is_active', function($user){
                return $user->is_active == true ? 'Active' : 'In active';
            })
            ->addColumn('action', function ($user) {
                return '<div class="dropdown">
                            <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto" data-bs-toggle="dropdown">
                                <i class="feather-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="' . route('admin.user.edit', encrypt($user->id)) . '" class="dropdown-item">Modify</a>
                                <button class="dropdown-item delete" data-id="' . $user->id . '">Delete User</button>
                            </div>
                        </div>';
            })
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('d M, Y');
            })
            ->rawColumns(['action','name','is_active','role','is_subscribed','is_instagram_connected'])
            ->make(true);
    }
}
