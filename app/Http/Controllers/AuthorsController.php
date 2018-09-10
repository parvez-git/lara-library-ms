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
        $authors   = Author::latest()->with(['country','language'])->get();
        $countries = Country::latest()->get();
        $languages = Language::latest()->get();
        return view('authors.index', compact('authors','countries','languages'));
    }


    public function store(Request $request)
    {
      $request->validate([
          'name'        => 'required',
          'country_id'  => 'required',
          'language_id' => 'required',
          'dateofbirth' => 'required',
          'bio'         => 'required',
          'image'       => 'required|image'
      ]);

      if ($request->hasFile('image')) {

        $imageName = 'author-'.time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

      }

      Author::create([
        'name'        => $request->name,
        'slug'        => str_slug($request->name),
        'country_id'  => $request->country_id,
        'language_id' => $request->language_id,
        'dateofbirth' => $request->dateofbirth,
        'bio'         => $request->bio,
        'image'       => $imageName
      ]);

      return back()->with('success', 'Author added successfully.');
    }


    public function show($id)
    {
      $author = Author::with(['country','language'])->findOrFail($id);
      return response()->json(['author' => $author]);
    }


    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return response()->json(['author' => $author]);
    }


    public function update(Request $request, $id)
    {
      $request->validate([
          'name'        => 'required',
          'country_id'  => 'required',
          'language_id' => 'required',
          'dateofbirth' => 'required',
          'bio'         => 'required',
          'image'       => 'image'
      ]);

      $author = Author::findOrFail($id);

      if ($request->hasFile('image')) {

        if(file_exists(public_path('images/') . $author->image)){
          unlink(public_path('images/') . $author->image);
        }

        $imageName = 'author-'.time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

      }else{
        $imageName = $author->image;
      }

      $author->name         = $request->name;
      $author->slug         = str_slug($request->name);
      $author->country_id   = $request->country_id;
      $author->language_id  = $request->language_id;
      $author->dateofbirth  = $request->dateofbirth;
      $author->bio          = $request->bio;
      $author->image        = $imageName;
      $author->save();

      return back()->with('success', 'Author updated successfully.');
    }


    public function destroy($id)
    {
      $author = Author::findOrFail($id);

      if(file_exists(public_path('images/') . $author->image)){
        unlink(public_path('images/') . $author->image);
      }

      $author->delete();

      return response()->json(['author' => 'deleted']);
    }
}
