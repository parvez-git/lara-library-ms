<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class BooksController extends Controller
{

    public function index()
    {
        $books = Book::latest()->get();
        return view('books.index', compact('books'));
    }


    public function create()
    {
        return view('books.create');
    }


    public function store(Request $request)
    {
        Book::create($request->all());

        return back();
    }


    public function show($id)
    {
      $book = Book::find($id);
      return response()->json(['book' => $book]);
    }


    public function edit($id)
    {
        $book = Book::find($id);
        return response()->json(['book' => $book]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
      $book = Book::find($id)->delete();
      return response()->json(['book' => $book]);
    }
}
