<?php

namespace App\Http\Controllers\Front;

use App\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $page_name = 'Book Us';
        $categories = Category::all();
        return view('front.pages.book', compact('page_name', 'categories'));
    }

    public function category($id)
    {
        $category = Category::with('plans')->find($id);
        if ($category == null) {
            return back();
        }
        $page_name = $category->name;
        return view('front.pages.category', compact('page_name', 'category'));
    }
}
