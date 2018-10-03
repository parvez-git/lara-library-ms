<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Genre;
use App\Publisher;
use App\Language;
use App\Country;
use App\Series;
use App\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $perpage = ($setting) ? (int)$setting['per_page'] : 18;

        $books = Book::latest()->select('title','slug','image','published_year')->paginate($perpage);

        return view('index', compact('books'));
    }

    public function show($slug)
    {
        $book = Book::where('slug', $slug)->first();

        return view('frontend.show', compact('book'));
    }


    public function authors()
    {
        $setting = Setting::first();
        $perpage = ($setting) ? (int)$setting['per_page'] : 18;

        $type = request('type');
        $id   = request('id');

        if( isset($type) && isset($id) && $type = 'country'){
            $authors = Author::latest()->with('country')->where('country_id',$id)->paginate($perpage);
        } else {
            $authors = Author::latest()->with('country')->paginate($perpage);
        }

        return view('frontend.authors', compact('authors'));
    }

    public function authorsShow($slug)
    {
        $author      = Author::where('slug', $slug)->first();
        $authorbooks = Book::latest()->where('author_id', $author->id)->get();

        return view('frontend.single-author', compact('author','authorbooks'));
    }


    public function archive($slug)
    {
        $type = request('type');

        switch ($type) {
            case 'genres':
                $title = Genre::with('books')->where('slug',$slug)->first()->name .' '.$type;
                $book  = Genre::with('books')->where('slug',$slug)->get();
                $books = $book[0]['books'];
                break;

            case 'publisher':
                $title = Publisher::where('slug',$slug)->first()->name .' '.$type;
                $book  = Publisher::where('slug',$slug)->first();
                $books = Book::where('publisher_id',$book->id)->get();
                break;

            case 'language':
                $title = Language::where('slug',$slug)->first()->name .' '.$type;
                $book  = Language::where('slug',$slug)->first();
                $books = Book::where('language_id',$book->id)->get();
                break;

            case 'series':
                $title = Series::where('slug',$slug)->first()->name .' '.$type;
                $book  = Series::where('slug',$slug)->first();
                $books = Book::where('series_id',$book->id)->get();
                break;

            default:
                $books = [];
                $title = 'Not Found';
                break;
        }

        return view('frontend.archive', compact('books','title'));
    }


    public function search()
    {
        $booktitle   = request('book');
        $publisherid = (int)request('publisherid');
        $authorid    = (int)request('authorid');
        $yearfrom    = (int)request('yearfrom');
        $yearto      = (int)request('yearto');
        $genreid     = (int)request('genreid');

        $books = Book::orderBy('title','ASC')
                    ->when($booktitle, function ($query, $booktitle) {
                        return $query->where('title', 'like', '%'.$booktitle.'%');
                    })
                    ->when($publisherid, function ($query, $publisherid) {
                        return $query->where('publisher_id', '=', $publisherid);
                    })
                    ->when($authorid, function ($query, $authorid) {
                        return $query->where('author_id', '=', $authorid);
                    })
                    ->when($yearfrom, function ($query, $yearfrom) {
                        return $query->whereYear('published_year', '>=', $yearfrom);
                    })
                    ->when($yearto, function ($query, $yearto) {
                        return $query->whereYear('published_year', '<=', $yearto);
                    })
                    ->OrWhereHas('genres', function($query) {
                        return $query->where('genre_id', '=', request('genreid'));
                    })
                    ->paginate(10);

        return view('frontend.search', compact('books'));
    }
}
