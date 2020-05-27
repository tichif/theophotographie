<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;

class AboutController extends Controller
{
    public function __invoke()
    {
        $page_name = 'A propos';
        $enterprise = About::where('type', 'enterprise')->first();
        $teams = About::where('type', 'team')->get();
        return view('front.pages.about', compact('page_name', 'enterprise', 'teams'));
    }
}
