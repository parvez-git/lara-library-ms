<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Language;

class LanguagesController extends Controller
{

    public function index()
    {
        $languages = Language::latest()->get();
        return view('languages.index', compact('languages'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        Language::create([
          'name' => $request->name,
          'slug' => str_slug($request->name, '-')
        ]);

        return back()->with('success', 'Language added successfully.');
    }


    public function show($id)
    {
      $language = Language::findOrFail($id);
      return response()->json(['language' => $language]);
    }


    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return response()->json(['language' => $language]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        $language = Language::findOrFail($id);

        $language->name = $request->name;
        $language->slug = str_slug($request->name, '-');
        $language->save();

        return back()->with('success', 'Language updated successfully.');
    }


    public function destroy($id)
    {
      $language = Language::findOrFail($id)->delete();
      return response()->json(['language' => $language]);
    }
}
