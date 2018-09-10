<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Publisher;

class PublishersController extends Controller
{

    public function index()
    {
        $publishers = Publisher::latest()->get();
        return view('publishers.index', compact('publishers'));
    }


<<<<<<< HEAD
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        Publisher::create([
          'name'    => $request->name,
          'slug'    => str_slug($request->name, '-'),
          'address' => $request->address
        ]);

        return back()->with('success', 'Publisher added successfully.');
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
        $publisher = Publisher::findOrFail($id);
        return response()->json(['publisher' => $publisher]);
=======
      $publisher = Publisher::find($id);
      return response()->json(['publisher' => $publisher]);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }


    public function edit($id)
    {
<<<<<<< HEAD
        $publisher = Publisher::findOrFail($id);
=======
        $publisher = Publisher::find($id);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
        return response()->json(['publisher' => $publisher]);
    }


    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        $request->validate([
            'name'  => 'required'
        ]);

        $publisher = Publisher::findOrFail($id);

        $publisher->name    = $request->name;
        $publisher->slug    = str_slug($request->name, '-');
        $publisher->address = $request->address;
        $publisher->save();

        return back()->with('success', 'Publisher updated successfully.');
=======
        //
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }


    public function destroy($id)
    {
<<<<<<< HEAD
        $series = Publisher::findOrFail($id)->delete();
        return response()->json(['publisher' => 'deleted']);
=======
      $series = Publisher::find($id)->delete();
      return response()->json(['publisher' => $publisher]);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }
}
