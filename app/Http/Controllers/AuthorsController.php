<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Author;
use App\Country;
use App\Language;

class AuthorsController extends Controller
{

    public function index()
    {
        $authors = Author::latest()->get();
        $countries = Country::latest()->get();
        $languages = Language::latest()->get();
        return view('authors.index', compact('authors','countries','languages'));
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
      $author = Author::find($id);
      return response()->json(['author' => $author]);
    }


    public function edit($id)
    {
        $author = Author::find($id);
        return response()->json(['author' => $author]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
      $author = Author::find($id)->delete();
      return response()->json(['author' => $author]);
    }
}
