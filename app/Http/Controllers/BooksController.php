<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Book;
use App\Author;
use App\Language;
use App\Series;
use App\Publisher;
use App\Genre;
use App\Setting;

class BooksController extends Controller
{

    public function index()
    {
        $setting     = Setting::first();
        $itemperpage = ($setting) ? (int)$setting['per_page'] : 10;

        $books = Book::latest()->with(['genres','author','publisher','language'])
                               ->withCount(['issuedbooks' => function($query) { $query->where('status', '!=', 'returned'); }])
                               ->paginate($itemperpage);

        $authors    = Author::latest()->get();
        $languages  = Language::latest()->get();
        $allseries  = Series::latest()->get();
        $publishers = Publisher::latest()->get();
        $genres     = Genre::latest()->get();

        return view('books.index', compact('books','authors','languages','allseries','publishers','genres'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|unique:books',
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
    }


    public function show($id)
    {
      $book = Book::with(['genres','author','publisher','language'])->findOrFail($id);
      return response()->json(['book' => $book]);
    }


    public function edit($id)
    {
        $book = Book::with('genres')->findOrFail($id);
        return response()->json(['book' => $book]);
    }


    public function update(Request $request, $id)
    {
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
    }


    public function destroy($id)
    {
      $book = Book::findOrFail($id);

      if(file_exists(public_path('images/') . $book->image)){
        unlink(public_path('images/') . $book->image);
      }

      $book->genres()->detach();
      $book->delete();

      return response()->json(['book' => 'deleted']);
    }
}
