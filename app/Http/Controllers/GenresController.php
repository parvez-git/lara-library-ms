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
      $genre = Genre::find($id);
      return response()->json(['genre' => $genre]);
    }


    public function edit($id)
    {
        $genre = Genre::find($id);
        return response()->json(['genre' => $genre]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
      $genre = Genre::find($id)->delete();
      return response()->json(['genre' => $genre]);
    }
}
