<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genre;
use App\Setting;

class GenresController extends Controller
{

    public function index()
    {
        $setting     = Setting::first();
        $itemperpage = ($setting) ? (int)$setting['per_page'] : 10;

        $genres = Genre::latest()->paginate($itemperpage);
        return view('genres.index', compact('genres'));
    }


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
    }


    public function show($id)
    {
        $genre = Genre::findOrFail($id);
        return response()->json(['genre' => $genre]);
    }


    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return response()->json(['genre' => $genre]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        $genre = Genre::findOrFail($id);

        $genre->name = $request->name;
        $genre->slug = str_slug($request->name, '-');
        $genre->save();

        return back()->with('success', 'Genre updated successfully.');
    }


    public function destroy($id)
    {
      $genre = Genre::findOrFail($id)->delete();
      return response()->json(['genre' => 'deleted']);
    }
}
