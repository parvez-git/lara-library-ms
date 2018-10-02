<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Country;
use App\Setting;

class CountriesController extends Controller
{

    public function index()
    {
        $setting     = Setting::first();
        $itemperpage = ($setting) ? (int)$setting['per_page'] : 10;

        $countries = Country::latest()->paginate($itemperpage);
        return view('countries.index', compact('countries'));
    }


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
    }


    public function show($id)
    {
      $country = Country::findOrFail($id);
      return response()->json(['country' => $country]);
    }


    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return response()->json(['country' => $country]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        $country = Country::findOrFail($id);

        $country->name = $request->name;
        $country->slug = str_slug($request->name, '-');
        $country->save();

        return back()->with('success', 'Country updated successfully.');
    }


    public function destroy($id)
    {
      $country = Country::findOrFail($id)->delete();
      return response()->json(['country' => 'deleted']);
    }
}
