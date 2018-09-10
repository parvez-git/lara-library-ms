<?php

namespace App\Http\Controllers;

use App\Issuedbook;
use App\Book;
use App\User;
use Illuminate\Http\Request;

class IssuedbooksController extends Controller
{

    public function index()
    {
        $books = Book::with('author')
                     ->withCount(['issuedbooks'=>function($query){$query->where('status','!=','returned');}])
                     ->get();

        $users = User::get();

        $issuedbooks = Issuedbook::latest()->with(['book','user'])->get();

        return view('issuedbooks.index', compact('issuedbooks','books','users'));
    }



    public function store(Request $request)
    {
        $request->validate([
          'book_id'     => 'required',
          'user_id'     => 'required',
          'issued_date' => 'required',
          'expiry_date' => 'required',
        ]);

        Issuedbook::create([
          'book_id'       => $request->book_id,
          'user_id'       => $request->user_id,
          'issued_date'   => $request->issued_date,
          'expiry_date'   => $request->expiry_date,
          'penalty_money' => $request->penalty_money,
          'status'        => $request->status,
        ]);

        return back()->with('success', 'Book issued successfully.');
    }


    public function show($id)
    {
        $issuedbook = Issuedbook::with(['book','user'])->findOrFail($id);
        return response()->json(['issuedbook'=>$issuedbook]);
    }


    public function edit($id)
    {
        $issuedbook = Issuedbook::findOrFail($id);
        return response()->json(['issuedbook'=>$issuedbook]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
          'user_id'     => 'required',
          'issued_date' => 'required',
          'expiry_date' => 'required',
        ]);

        $issuedbook = Issuedbook::findOrFail($id);

        $book_id = isset($request->book_id) ? $request->book_id : $issuedbook->book_id;

        $issuedbook->update([
          'book_id'       => $book_id,
          'user_id'       => $request->user_id,
          'issued_date'   => $request->issued_date,
          'expiry_date'   => $request->expiry_date,
          'return_date'   => $request->return_date,
          'penalty_money' => $request->penalty_money,
          'status'        => $request->status,
        ]);

        return back()->with('success', 'Book Issued updated successfully.');
    }


    public function destroy($id)
    {
      $issuedbook = Issuedbook::findOrFail($id)->delete();

      return response()->json(['issuedbook' => 'deleted']);
    }


    // JSON - AUTO UPDATE BOOK STATUS
    public function issuedbookStatusUpdate(Request $request)
    {
        $id = $request->input('id');

        $issuedbook = Issuedbook::where('id', $id)->where('status', 'borrowed')->update(['status' => 'late']);

        return response()->json([ 'msg' => $issuedbook ]);
    }


    // JSON - BOOKS AND USERS
    public function issuedbooksUsers(Request $request)
    {
        $book_id = $request->input('book_id');
        $user_id = $request->input('user_id');

        $issuedbooksusers = Issuedbook::latest()->with(['book','user'])
                                      ->when($book_id, function ($query, $book_id) {
                                          return $query->where('book_id', $book_id);
                                      })
                                      ->when($user_id, function ($query, $user_id) {
                                          return $query->where('user_id', $user_id);
                                      })
                                      ->get();

        return response()->json(['issuedbooksusers' => $issuedbooksusers]);
    }
}
