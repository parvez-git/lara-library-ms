<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('blogs.categories.index', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required|unique:categories|max:190',
        ]);

        Category::create([
          'name' => $request->name,
          'slug' => str_slug($request->name)
        ]);

        return back()->with('success', 'Category added successfully.');
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        //
    }
}
