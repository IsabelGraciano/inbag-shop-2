<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index($language)
    {
        return view('home.index');
    }

}