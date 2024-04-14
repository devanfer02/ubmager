<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pageTitle = "UB Mager";

        return view('home', compact('pageTitle'));
    }
}
