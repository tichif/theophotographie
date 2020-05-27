<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;
use App\Photo;

class GallerieController extends Controller
{
    public function index()
    {
        $page_name = "Toutes les photos";
        $albums = Album::all();
        $photos = Photo::all();

        return view('front.pages.gallerie', compact('page_name', 'albums', 'photos'));
    }

    public function album($id)
    {
        $albums = Album::all();
        $album = Album::with('photos')->find($id);
        if ($album == null) {
            return back();
        }

        $page_name = $album->name;
        // dd($album->photos);
        return view('front.pages.photo', compact('page_name', 'album', 'albums'));
    }
}
