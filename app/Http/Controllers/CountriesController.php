<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Country;

class CountriesController extends Controller
{

    public function index()
    {
        $countries = Country::latest()->get();
        return view('countries.index', compact('countries'));
    }


<<<<<<< HEAD
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|unique:countries|max:255',
      ]);

      Country::create([
        'name' => $request->name,
        'slug' => str_slug($request->name)
      ]);

      return back()->with('success', 'Country added successfully.');

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
      $country = Country::findOrFail($id);
=======
      $country = Country::find($id);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
      return response()->json(['country' => $country]);
    }


    public function edit($id)
    {
<<<<<<< HEAD
        $country = Country::findOrFail($id);
=======
        $country = Country::find($id);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
        return response()->json(['country' => $country]);
    }


    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        $request->validate([
            'name'  => 'required'
        ]);

        $country = Country::findOrFail($id);

        $country->name = $request->name;
        $country->slug = str_slug($request->name, '-');
        $country->save();

        return back()->with('success', 'Country updated successfully.');
=======
        //
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }


    public function destroy($id)
    {
<<<<<<< HEAD
      $country = Country::findOrFail($id)->delete();
      return response()->json(['country' => 'deleted']);
=======
      $country = Country::find($id)->delete();
      return response()->json(['country' => $country]);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }
}
