<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genre;

class GenresController extends Controller
{

    public function index()
    {
        $genres = Genre::latest()->get();
        return view('genres.index', compact('genres'));
    }


<<<<<<< HEAD
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        Genre::create([
          'name' => $request->name,
          'slug' => str_slug($request->name, '-')
        ]);

        return back()->with('success', 'Genre added successfully.');
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
        $genre = Genre::findOrFail($id);
        return response()->json(['genre' => $genre]);
=======
      $genre = Genre::find($id);
      return response()->json(['genre' => $genre]);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }


    public function edit($id)
    {
<<<<<<< HEAD
        $genre = Genre::findOrFail($id);
=======
        $genre = Genre::find($id);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
        return response()->json(['genre' => $genre]);
    }


    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        $request->validate([
            'name'  => 'required'
        ]);

        $genre = Genre::findOrFail($id);

        $genre->name = $request->name;
        $genre->slug = str_slug($request->name, '-');
        $genre->save();

        return back()->with('success', 'Genre updated successfully.');
=======
        //
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }


    public function destroy($id)
    {
<<<<<<< HEAD
      $genre = Genre::findOrFail($id)->delete();
      return response()->json(['genre' => 'deleted']);
=======
      $genre = Genre::find($id)->delete();
      return response()->json(['genre' => $genre]);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }
}
