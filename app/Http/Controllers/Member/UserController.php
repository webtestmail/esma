<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function add_user(Request $request){
        if ($request->isMethod('post')) {
            // Handle form submission to add a new user
            // You can validate the request data and create a new user here
            // For example:
            $validatedData = $request->validate([
                'display_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'username'=> 'required|string|max:255|unique:users,username',
                // Add other fields as necessary
            ]);

            // Create the user (you may want to hash the password)
            $user = User::create([
                'name' => $validatedData['display_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'username' => $validatedData['username'],
                'role' => User::ROLE_SUBMEMBER, 
                'is_active'=> true,
            ]);

            return response()->json(['success' =>true,'message' => 'User added successfully!']);
        }
        $user = auth()->user();
        return view('user-dashboard.add-user', compact('user'));
    }
    public function users(){
        $user = auth()->user();
        return view('user-dashboard.users', compact('user'));
    }
    public function users_data(Request $request){
        $users = User::where('role', User::ROLE_SUBMEMBER)->get();
        return DataTables::of($users)
        ->addIndexColumn()
        ->addColumn('action', function($users){
            $btn = '
                        <button class="user-del-btn icon-only btn" data-id="'.$users->id.'">
                            <svg class="svg-icon" style="width:16px;height:16px;">
                                  <use href="../images/icons/icons-sprite.svg#icon-bin-small">
                                  </use>
                            </svg> Delete
                        </button>
                    ';
            return $btn;
        })
        ->make(true);
    }
    public function delete_user($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => true, 'message' => 'User deleted successfully!']);
    }

}