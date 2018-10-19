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
use App\Post;
use App\Setting;

class HomeController extends Controller
{
    private $homeperpage;
    private $blogperpage;
    private $sidebarpage;

    public function __construct() {

        $setting = Setting::firstOrFail();

        $homeperpage = ($setting) ? (int)$setting['home_per_page'] : 18;
        $blogperpage = ($setting) ? (int)$setting['blog_per_page'] : 10;
        $sidebarpage = ($setting) ? (int)$setting['withsidebar_per_page'] : 12;

        $this->homeperpage = $homeperpage;
        $this->blogperpage = $blogperpage;
        $this->sidebarpage = $sidebarpage;
    }

    public function index()
    {
        $page = $this->homeperpage;

        $books = Book::latest()->select('title','slug','image','published_year')->paginate($page);

        return view('index', compact('books'));
    }

    public function show($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();

        return view('frontend.show', compact('book'));
    }


    public function blog()
    {
        $page = $this->blogperpage;

        $posts = Post::latest()->with(['user','categories'])
                                ->where('status', 1)
                                ->whereDate('published_on', '>=', date('yyyy-mm-dd') )
                                ->paginate($page);

        return view('frontend.blog', compact('posts'));
    }


    public function authors()
    {
        $page = $this->homeperpage;

        $type = request('type');
        $id   = request('id');

        if( isset($type) && isset($id) && $type = 'country'){
            $authors = Author::latest()->with('country')->where('country_id',$id)->paginate($page);
        } else {
            $authors = Author::latest()->with('country')->paginate($page);
        }

        return view('frontend.authors', compact('authors'));
    }

    public function authorsShow($slug)
    {
        $author      = Author::where('slug', $slug)->firstOrFail();
        $authorbooks = Book::latest()->where('author_id', $author->id)->get();

        return view('frontend.single-author', compact('author','authorbooks'));
    }


    public function archive($slug)
    {
        $page = $this->sidebarpage;

        $type = request('type');

        switch ($type) {
            case 'genres':
                $title = Genre::with('books')->where('slug',$slug)->firstOrFail()->name .' '.$type;
                $books = Book::whereHas('genres', function($query) { return $query->where('slug', '=', request('slug')); })->paginate($page);
                $books->withPath($slug.'?type=genres');
                break;

            case 'publisher':
                $title = Publisher::where('slug',$slug)->firstOrFail()->name .' '.$type;
                $book  = Publisher::where('slug',$slug)->firstOrFail();
                $books = Book::where('publisher_id',$book->id)->paginate($page);
                $books->withPath($slug.'?type=publisher');
                break;

            case 'language':
                $title = Language::where('slug',$slug)->firstOrFail()->name .' '.$type;
                $book  = Language::where('slug',$slug)->firstOrFail();
                $books = Book::where('language_id',$book->id)->paginate($page);
                $books->withPath($slug.'?type=language');
                break;

            case 'series':
                $title = Series::where('slug',$slug)->firstOrFail()->name .' '.$type;
                $book  = Series::where('slug',$slug)->firstOrFail();
                $books = Book::where('series_id',$book->id)->paginate($page);
                $books->withPath($slug.'?type=series');
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
        $page = $this->sidebarpage;

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
                    ->paginate($page);

        return view('frontend.search', compact('books'));
    }
}
