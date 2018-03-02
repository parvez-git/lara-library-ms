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
      $country = Country::find($id);
      return response()->json(['country' => $country]);
    }


    public function edit($id)
    {
        $country = Country::find($id);
        return response()->json(['country' => $country]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
      $country = Country::find($id)->delete();
      return response()->json(['country' => $country]);
    }
}
