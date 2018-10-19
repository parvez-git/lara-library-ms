<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

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
          'site_name'               => 'required|min:3',
          'email'                   => 'required|email',
          'phone'                   => 'required',
          'per_page'                => 'required|numeric',
          'currency'                => 'required',
          'home_per_page'           => 'required|numeric',
          'blog_per_page'           => 'required|numeric',
          'withsidebar_per_page'    => 'required|numeric'
        ]);

        $setting = new Setting();

        $setting->updateOrCreate(['id' => 1],
          [
            'site_name'             => $request->site_name,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'per_page'              => $request->per_page,
            'currency'              => $request->currency,
            'home_per_page'         => $request->home_per_page,
            'blog_per_page'         => $request->blog_per_page,
            'withsidebar_per_page'  => $request->withsidebar_per_page,
          ]
        );

        return back()->with('success', 'Setting updated successfully.');
    }

}
