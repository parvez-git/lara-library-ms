<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Series;
use App\Setting;

class SeriesController extends Controller
{

    public function index()
    {
        $setting     = Setting::first();
        $itemperpage = ($setting) ? (int)$setting['per_page'] : 10;

        $allseries = Series::latest()->paginate($itemperpage);
        return view('series.index', compact('allseries'));
    }


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
    }


    public function show($id)
    {
      $series = Series::findOrFail($id);
      return response()->json(['series' => $series]);
    }


    public function edit($id)
    {
        $series = Series::findOrFail($id);
        return response()->json(['series' => $series]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        $series = Series::findOrFail($id);

        $series->name = $request->name;
        $series->slug = str_slug($request->name, '-');
        $series->save();

        return back()->with('success', 'Series updated successfully.');
    }


    public function destroy($id)
    {
        $series = Series::findOrFail($id)->delete();
        return response()->json(['series' => 'deleted']);
    }
}
