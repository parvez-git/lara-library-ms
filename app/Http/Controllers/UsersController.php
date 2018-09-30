<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Setting;

use Hash;

class UsersController extends Controller
{
    public function index()
    {
        $setting     = Setting::first();
        $itemperpage = ($setting) ? (int)$setting['per_page'] : 10;

        if(Auth::user()->role_id == 2){
            $users = User::latest()->with('role')->where('role_id',3)->paginate($itemperpage);
        } else {
            $users = User::latest()->with('role')->where('role_id','!=',1)->paginate($itemperpage);
        }

        return view('users.index', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
          'name'      => 'required|string|max:190',
          'email'     => 'required|string|email|max:190|unique:users',
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
          'name'      => 'required|string|max:190',
          'email'     => 'required|string|email|max:190',
          'role_id'   => 'required|numeric',
          'status'    => 'required|boolean'
        ]);

        $user = User::findOrFail($id);


        // STATUS MANAGE ACCORDING TO ROLE
        $status = User::manageStatus($request->role_id, $user->status, $request->status);


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
        $this->validate($request, [
            'newpassword' => 'required|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($request->input('user_id'));
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        return back()->with('success', 'Password changed successfully.');
    }

}
