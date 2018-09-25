<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController.php extends Controller
{
    public function index()
    {
        return view('home');
    }
}
