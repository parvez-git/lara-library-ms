<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Series;

class SeriesController extends Controller
{

    public function index()
    {
        $allseries = Series::latest()->get();
        return view('series.index', compact('allseries'));
    }


<<<<<<< HEAD
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        Series::create([
          'name' => $request->name,
          'slug' => str_slug($request->name, '-')
        ]);

        return back()->with('success', 'Series added successfully.');
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
      $series = Series::findOrFail($id);
=======
      $series = Series::find($id);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
      return response()->json(['series' => $series]);
    }


    public function edit($id)
    {
<<<<<<< HEAD
        $series = Series::findOrFail($id);
=======
        $series = Series::find($id);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
        return response()->json(['series' => $series]);
    }


    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        $request->validate([
            'name'  => 'required'
        ]);

        $series = Series::findOrFail($id);

        $series->name = $request->name;
        $series->slug = str_slug($request->name, '-');
        $series->save();

        return back()->with('success', 'Series updated successfully.');
=======
        //
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }


    public function destroy($id)
    {
<<<<<<< HEAD
      $series = Series::findOrFail($id)->delete();
      return response()->json(['series' => 'deleted']);
=======
      $series = Series::find($id)->delete();
      return response()->json(['series' => $series]);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }
}
