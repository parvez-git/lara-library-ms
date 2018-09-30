<?php

namespace App\Http\Controllers;

use App\Requestedbook;
use App\Issuedbook;
use App\Setting;
use App\Book;
use App\User;
use Auth;
use Illuminate\Http\Request;

class RequestedbookController extends Controller
{

    public function index()
    {
        $setting     = Setting::first();
        $itemperpage = ($setting) ? (int)$setting['per_page'] : 10;

        $books = Book::with('author')->orderBy('title', 'asc')->get();
        $users = User::get();

        if(Auth::user()->role_id == 3){
          $requestedbooks = Requestedbook::latest()->with(['book','issuedbook','user'])->where('user_id',Auth::id())->paginate($itemperpage);
        }else{
          $requestedbooks = Requestedbook::latest()->with(['book','issuedbook','user'])->paginate($itemperpage);
        }

        return view('requestedbooks.index', compact('requestedbooks','books','users'));
    }


    public function store(Request $request)
    {
        if (Auth::user()->role_id == 3) {
          $user_id = Auth::id();
        }else{
          $user_id = $request->user_id;
        }

        $request->validate([
          'book_id'     => 'required',
          'user_id'     => 'numeric'
        ]);

        Requestedbook::create([
          'book_id'       => $request->book_id,
          'user_id'       => $user_id
        ]);

        return back()->with('success', 'Book requested successfully.');
    }


    public function show(Requestedbook $requestedbook)
    {
        $requestedbook = Requestedbook::with('book')->findOrFail($requestedbook->id);

        return response()->json(['requestedbook' => $requestedbook]);
    }


    public function edit(Requestedbook $requestedbook)
    {
        $requestedbook = Requestedbook::with('book')->findOrFail($requestedbook->id);

        return response()->json(['requestedbook' => $requestedbook]);
    }


    public function update(Request $request, Requestedbook $requestedbook)
    {
        $request->validate([
          'book_id' => 'required',
          'user_id' => 'required',
          'status'  => 'required'
        ]);

        $today       = date("Y-m-d");
        $expiry_date = Date('Y-m-d', strtotime("+3 days"));

        $requestedbook = Requestedbook::findOrFail($requestedbook->id);

        $book_id = $request->book_id;
        $user_id = $request->user_id;

        $requestedbook->update([
          'book_id'     => $book_id,
          'user_id'     => $user_id,
          'status'      => $request->status,
          'action_date' => $today
        ]);

        if($request->status == 'accepted'){
          Issuedbook::updateOrCreate(
            [
              'book_id'       => $book_id,
              'user_id'       => $user_id,
            ],
            [
              'issued_date'   => $today,
              'expiry_date'   => $expiry_date,
            ]
          );
        }else{
          Issuedbook::where('book_id', $book_id)->where('user_id', $user_id)->delete();
        }

        return back()->with('success', 'Requested Book updated successfully.');
    }


    public function destroy(Requestedbook $requestedbook)
    {
        $requestedbook = Requestedbook::findOrFail($requestedbook->id)->delete();

        return response()->json(['requestedbook' => 'deleted']);
    }
}
