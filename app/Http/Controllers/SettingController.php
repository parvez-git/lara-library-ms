<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

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

}
