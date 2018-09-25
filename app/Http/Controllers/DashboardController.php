<?php

namespace App\Http\Controllers;

use App\Book;
use App\Issuedbook;
use App\Requestedbook;
use Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard()
    {
        $totalbooks     = Book::sum('quantity');
        $totissuedbooks = Issuedbook::count();
        $returnedbooks  = Issuedbook::where('status','returned')->count();
        $lostbooks      = Issuedbook::where('status','lost')->count();
        $latebooks      = Issuedbook::where('status','late')->count();

        $totrequestedbooks  = Requestedbook::count();
        $pendingbooks       = Requestedbook::where('status','pending')->count();
        $rejectedbooks      = Requestedbook::where('status','rejected')->count();

        $issuedbooks    = Issuedbook::latest()->take(10)->get();
        $requestedbooks = Requestedbook::latest()->take(10)->get();

        $userequestedbooks = Requestedbook::where('user_id',Auth::id())->count();
        $useracceptedbooks = Requestedbook::where('user_id',Auth::id())->where('status','accepted')->count();
        $userpendingbooks  = Requestedbook::where('user_id',Auth::id())->where('status','pending')->count();
        $userejectedbooks  = Requestedbook::where('user_id',Auth::id())->where('status','rejected')->count();
        $userissuedbooks   = Issuedbook::latest()->where('user_id',Auth::id())->get();

        return view('dashboard', compact(
            'totalbooks','totissuedbooks','returnedbooks','lostbooks','latebooks',
            'totrequestedbooks','pendingbooks','rejectedbooks',
            'issuedbooks','requestedbooks',
            'userequestedbooks','useracceptedbooks','userpendingbooks','userejectedbooks',
            'userissuedbooks'
        ));
    }


    public function nopermission()
    {
        return view('nopermission');
    }
}
