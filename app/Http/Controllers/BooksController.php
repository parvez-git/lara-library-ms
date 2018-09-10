<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Validator;
=======
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d

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
<<<<<<< HEAD
        $books = Book::latest()->with(['genres','author','publisher','language'])
                               ->withCount(['issuedbooks' => function($query) { $query->where('status', '!=', 'returned'); }])
                               ->get();

        $authors    = Author::latest()->get();
        $languages  = Language::latest()->get();
        $allseries  = Series::latest()->get();
        $publishers = Publisher::latest()->get();
        $genres     = Genre::latest()->get();

=======
        $books = Book::latest()->get();
        $authors = Author::latest()->get();
        $languages = Language::latest()->get();
        $allseries = Series::latest()->get();
        $publishers = Publisher::latest()->get();
        $genres = Genre::latest()->get();
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
        return view('books.index', compact('books','authors','languages','allseries','publishers','genres'));
    }


    public function store(Request $request)
    {
<<<<<<< HEAD
        $request->validate([
            'title'           => 'required',
            'ISBN'            => 'required|unique:books',
            'publisher_id'    => 'required',
            'author_id'       => 'required',
            'genre'           => 'required',
            'published_year'  => 'required',
            'pages'           => 'required',
            'binding'         => 'required',
            'quantity'        => 'required',
            'price'           => 'required',
            'language_id'     => 'required',
            'description'     => 'required',
            'image'           => 'required|image'
        ]);

        if ($request->hasFile('image')) {

          $imageName = 'book-'.time().'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('images'), $imageName);
        }

        $book = Book::create([
          'title'           => $request->title,
          'slug'            => str_slug($request->title),
          'subtitle'        => $request->subtitle,
          'ISBN'            => $request->ISBN,
          'series_id'       => $request->series_id,
          'publisher_id'    => $request->publisher_id,
          'author_id'       => $request->author_id,
          'edition'         => $request->edition,
          'published_year'  => $request->published_year,
          'pages'           => $request->pages,
          'binding'         => $request->binding,
          'quantity'        => $request->quantity,
          'price'           => $request->price,
          'language_id'     => $request->language_id,
          'description'     => $request->description,
          'image'           => $imageName
        ]);

        $book->genres()->attach($request->genre);

        return back()->with('success', 'Book added successfully.');

=======
        Book::create($request->all());

        return back();
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }


    public function show($id)
    {
<<<<<<< HEAD
      $book = Book::with(['genres','author','publisher','language'])->findOrFail($id);
=======
      $book = Book::find($id);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
      return response()->json(['book' => $book]);
    }


    public function edit($id)
    {
<<<<<<< HEAD
        $book = Book::with('genres')->findOrFail($id);
=======
        $book = Book::find($id);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
        return response()->json(['book' => $book]);
    }


    public function update(Request $request, $id)
    {
<<<<<<< HEAD
      $request->validate([
          'title'           => 'required',
          'ISBN'            => 'required',
          'publisher_id'    => 'required',
          'author_id'       => 'required',
          'genre'           => 'required',
          'published_year'  => 'required',
          'pages'           => 'required',
          'binding'         => 'required',
          'quantity'        => 'required',
          'price'           => 'required',
          'language_id'     => 'required',
          'description'     => 'required',
          'image'           => 'image'
      ]);

      $book = Book::findOrFail($id);

      if ($request->hasFile('image')) {

        if(file_exists(public_path('images/') . $book->image)){
          unlink(public_path('images/') . $book->image);
        }

        $imageName = 'book-'.time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

      }else{
        $imageName = $book->image;
      }

      $book->title           = $request->title;
      $book->slug            = str_slug($request->title);
      $book->ISBN            = $request->ISBN;
      $book->subtitle        = $request->subtitle;
      $book->series_id       = $request->series_id;
      $book->publisher_id    = $request->publisher_id;
      $book->author_id       = $request->author_id;
      $book->edition         = $request->edition;
      $book->published_year  = $request->published_year;
      $book->pages           = $request->pages;
      $book->binding         = $request->binding;
      $book->quantity        = $request->quantity;
      $book->price           = $request->price;
      $book->language_id     = $request->language_id;
      $book->description     = $request->description;
      $book->image           = $imageName;
      $book->save();

      $book->genres()->sync($request->genre);

      return back()->with('success', 'Book updated successfully.');
=======
        //
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }


    public function destroy($id)
    {
<<<<<<< HEAD
      $book = Book::findOrFail($id);

      if(file_exists(public_path('images/') . $book->image)){
        unlink(public_path('images/') . $book->image);
      }

      $book->genres()->detach();
      $book->delete();

      return response()->json(['book' => 'deleted']);
=======
      $book = Book::find($id)->delete();
      return response()->json(['book' => $book]);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    }
}
