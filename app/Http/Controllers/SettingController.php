<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\User;
use Auth;
use Hash;

class SettingController extends Controller
{

    public function index()
    {
        $setting = Setting::first();

        return view('settings.index', compact('setting'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'site_name' => 'required|min:3',
          'email'     => 'required|email',
          'phone'     => 'required',
          'per_page'  => 'required|numeric',
          'currency'  => 'required'
        ]);

        $setting = new Setting();

        $setting->updateOrCreate(['id' => 1],
          [
            'site_name' => $request->site_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'per_page'  => $request->per_page,
            'currency'  => $request->currency
          ]
        );

        return back()->with('success', 'Setting updated successfully.');
    }



    // PROFILE SETTING
    public function profile()
    {
        $user = User::where('id',Auth::id())->first();

        return view('settings.profile', compact('user'));
    }

    public function profileUpdate()
    {
        request()->validate([
          'name'      => 'required|string|max:190',
          'email'     => 'required|string|email|max:190',
          'status'    => 'required|boolean'
        ]);

        $user = User::findOrFail(Auth::id());
        $user->update(request(['name','email','status']));

        if (request('status')) {
            return back();
        } else {
            Auth::logout();
            return redirect()->route('login');
        }
    }


    // CHANGE PASSWORD
    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
            return back()->with('error', 'Your current password does not matches with the password you provided! Please try again.');
        }

        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
            return back()->with('error', 'New Password cannot be same as your current password! Please choose a different password.');
        }

        $this->validate($request, [
            'currentpassword' => 'required',
            'newpassword' => 'required|string|min:6|confirmed',
        ]);

        $user = User::findOrFail(Auth::id());
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        return back()->with('success', 'Password changed successfully.');
    }

}
