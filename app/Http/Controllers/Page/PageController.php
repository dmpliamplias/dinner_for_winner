<?php

namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        return $this->home();
    }

    public function home()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
