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


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
      $language = Language::find($id);
      return response()->json(['language' => $language]);
    }


    public function edit($id)
    {
        $language = Language::find($id);
        return response()->json(['language' => $language]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
      $language = Language::find($id)->delete();
      return response()->json(['language' => $language]);
    }
}
