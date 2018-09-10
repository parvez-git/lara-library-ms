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


<<<<<<< HEAD
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
=======
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }


    public function show($id)
    {
<<<<<<< HEAD
      $language = Language::findOrFail($id);
=======
      $language = Language::find($id);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
      return response()->json(['language' => $language]);
    }


    public function edit($id)
    {
<<<<<<< HEAD
        $language = Language::findOrFail($id);
=======
        $language = Language::find($id);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
        return response()->json(['language' => $language]);
    }


    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        $request->validate([
            'name'  => 'required'
        ]);

        $language = Language::findOrFail($id);

        $language->name = $request->name;
        $language->slug = str_slug($request->name, '-');
        $language->save();

        return back()->with('success', 'Language updated successfully.');
=======
        //
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }


    public function destroy($id)
    {
<<<<<<< HEAD
      $language = Language::findOrFail($id)->delete();
=======
      $language = Language::find($id)->delete();
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
      return response()->json(['language' => $language]);
    }
}
