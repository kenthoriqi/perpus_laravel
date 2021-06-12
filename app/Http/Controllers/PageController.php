<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('layout.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
