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
      $series = Series::find($id);
      return response()->json(['series' => $series]);
    }


    public function edit($id)
    {
        $series = Series::find($id);
        return response()->json(['series' => $series]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
      $series = Series::find($id)->delete();
      return response()->json(['series' => $series]);
    }
}
