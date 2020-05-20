<?php

namespace App\Http\Controllers\Admin;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "A propos";
        $data = About::all();
        return view('admin.pages.about.list', compact('page_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "A propos";
        return view('admin.pages.about.create', compact('page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'type' => 'required',
            'image' => 'required|image|max:1999',
            'text' => 'required|min:10'
        ], [
            'name.required' => 'Tu dois mettre le nom.',
            'type.required' => 'Tu dois choisir un type.',
            'image.required' => 'Tu dois mettre une image.',
            'text.required' => 'Tu dois mettre un texte.',
            'name.min' => 'Le nom doit avoir au moins 3 charactères.',
            'image.image' => 'Format incorrect. Formats supportés: git, jpeg, jpg, png.',
            'image.max' => "L'image ne doit pas dépasser 2MB",
            'text.min' => 'Le text doit avoir au moins 10 charactères.'
        ]);

        $about = new About();
        $about->name = $request->name;
        $about->type = $request->type;
        $about->text = $request->text;
        $about->image = '';
        $about->thumb = '';

        // Traitement des images
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $thumb_img = 'thumb_' . time() . '.' . $extension;
        $cover_img = 'image_' . time() . '.' . $extension;


        $this->resize($file, $thumb_img);
        $path = $file->storeAs('public/photos', $cover_img);

        $about->image = $cover_img;
        $about->thumb = $thumb_img;
        $about->save();

        return redirect()->action('Admin\AboutController@index')->with('toast_success', 'Création réussie.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = 'Editer';

        $about = About::find($id);
        if ($about == null) {
            return redirect()->action('Admin\AboutController@index');
        }

        return view('admin.pages.about.edit', compact('page_name', 'about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'type' => 'required',
            'image' => 'image|max:1999',
            'text' => 'required|min:10'
        ], [
            'name.required' => 'Tu dois mettre le nom.',
            'type.required' => 'Tu dois choisir un type.',
            'text.required' => 'Tu dois mettre un texte.',
            'name.min' => 'Le nom doit avoir au moins 3 charactères.',
            'image.image' => 'Format incorrect. Formats supportés: git, jpeg, jpg, png.',
            'image.max' => "L'image ne doit pas dépasser 2MB",
            'text.min' => 'Le text doit avoir au moins 10 charactères.'
        ]);

        $about = About::find($id);

        if ($about == null) {
            return redirect()->action('Admin\AboutController@index');
        }

        if ($request->has('image')) {
            Storage::delete('public/photos/' . $about->image);
            Storage::delete('public/thumbnails/' . $about->thumb);

            // Traitement des images
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $thumb_img = 'thumb_' . time() . '.' . $extension;
            $cover_img = 'image_' . time() . '.' . $extension;


            $this->resize($file, $thumb_img);
            $path = $file->storeAs('public/photos', $cover_img);
            $about->image = $cover_img;
            $about->thumb = $thumb_img;
            $about->save();
        }

        $about->name = $request->name;
        $about->type = $request->type;
        $about->text = $request->text;
        $about->save();

        return redirect()->action('Admin\AboutController@index')->with('toast_success', 'Modification réussie.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        if ($about == null) {
            return redirect()->action('Admin\AboutController@index');
        }
        $about->delete();
        Storage::delete('public/photos/' . $about->image);
        Storage::delete('public/thumbnails/' . $about->thumb);
        return redirect()->action('Admin\AboutController@index')->with('toast_success', 'Suppression réussie.');
    }

    public function resize($file, $thumb_img)
    {
        ini_set('memory_limit', '256M');
        Image::make($file)->resize(122, 122)->save(storage_path('app/public/thumbnails/' . $thumb_img));
    }
}
