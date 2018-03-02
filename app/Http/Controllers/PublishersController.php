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
      $publisher = Publisher::find($id);
      return response()->json(['publisher' => $publisher]);
    }


    public function edit($id)
    {
        $publisher = Publisher::find($id);
        return response()->json(['publisher' => $publisher]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
      $series = Publisher::find($id)->delete();
      return response()->json(['publisher' => $publisher]);
    }
}
