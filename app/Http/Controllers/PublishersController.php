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
    }


    public function show($id)
    {
        $publisher = Publisher::findOrFail($id);
        return response()->json(['publisher' => $publisher]);
    }


    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);
        return response()->json(['publisher' => $publisher]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        $publisher = Publisher::findOrFail($id);

        $publisher->name    = $request->name;
        $publisher->slug    = str_slug($request->name, '-');
        $publisher->address = $request->address;
        $publisher->save();

        return back()->with('success', 'Publisher updated successfully.');
    }


    public function destroy($id)
    {
        $series = Publisher::findOrFail($id)->delete();
        return response()->json(['publisher' => 'deleted']);
    }
}
