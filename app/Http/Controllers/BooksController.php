<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\Author;
use App\Language;
use App\Series;
use App\Publisher;
use App\Genre;

class BooksController extends Controller
{

    public function index()
    {
        $books = Book::latest()->get();
        $authors = Author::latest()->get();
        $languages = Language::latest()->get();
        $allseries = Series::latest()->get();
        $publishers = Publisher::latest()->get();
        $genres = Genre::latest()->get();
        return view('books.index', compact('books','authors','languages','allseries','publishers','genres'));
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
