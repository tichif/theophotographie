<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        $page_name = "Accueil";
        return view('front.pages.index', compact('page_name'));
    }
}
