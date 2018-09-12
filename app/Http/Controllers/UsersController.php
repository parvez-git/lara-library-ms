<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

use Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::latest()->with('role')->get();

        return view('users.index', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
          'name'      => 'required|string|max:255',
          'email'     => 'required|string|email|max:255|unique:users',
          'password'  => 'required|string|min:6',
          'role_id'   => 'required|numeric',
          'status'    => 'required|boolean'
        ]);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'role_id'   => $request->role_id,
            'status'    => $request->status
        ]);

        return back()->with('success', 'User added successfully.');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::with('role')->findOrFail($id);
        return response()->json(['user' => $user]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
          'name'      => 'required|string|max:255',
          'email'     => 'required|string|email|max:255',
          'role_id'   => 'required|numeric',
          'status'    => 'required|boolean'
        ]);

        $user = User::findOrFail($id);

        // ROLE AND PERMISSION
        if(Auth::user()->role_id == 2){
          if($request->role_id == 3){
            $status = $request->status;
          }else{
            $status = $user->status;
          }
        }else{
          $status = $request->status;
        }

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->role_id  = $request->role_id;
        $user->status   = $status;
        $user->save();

        return back()->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();

      return response()->json(['user' => 'deleted']);
    }


    // CHANGE PASSWORD
    public function changePassword(Request $request)
    {
        $id = $request->input('user_id');

        if (!(Hash::check($request->get('currentpassword'), User::findOrFail($id)->password))) {
            return back()->with('error', 'Your current password does not matches with the password you provided! Please try again.');
        }

        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
            return back()->with('error', 'New Password cannot be same as your current password! Please choose a different password.');
        }

        $this->validate($request, [
            'currentpassword' => 'required',
            'newpassword' => 'required|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        return back()->with('success', 'Password changed successfully.');
    }

}
