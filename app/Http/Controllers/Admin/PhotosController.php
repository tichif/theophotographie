<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;
use App\Photo;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Toutes les photos";
        $data = Photo::all();
        return view('admin.pages.photos.list', compact('page_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Ajouter une photo";
        $album = Album::pluck('name', 'id');
        return view('admin.pages.photos.create', compact('page_name', 'album'));
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
            'name' => 'required|min:5|max:191',
            'type' => 'required',
            'album' => 'required',
            'image' => 'required|image|max:1999',
            'red' => 'required'
        ], [
            'name.required' => "Le nom de l'image est obligatoire.",
            'name.min' => "Le nom nom de l'image doit avoir au moins 5 caractères.",
            "type" => "Tu dois choisir le type de l'image",
            "album" => "Tu dois choisir le type d'album.",
            'image.image' => 'Format incorrect. Formats supportés: git, jpeg, jpg, png.',
            'image.max' => "L'image ne doit pas dépasser 2MB",
            'image.required' => 'Tu dois mettre une image.',
        ]);

        $photo = new Photo;

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $thumb_img = 'thumb_' . time() . '.' . $extension;
        $cover_img = 'image_' . time() . '.' . $extension;

        $data = [
            'file' => $file,
            'thumb' => $thumb_img,
            'image' => $cover_img,
            'red' => $request->red,
            'type' => $request->type
        ];

        $this->resize($data);

        $photo->name = $request->name;
        $photo->size = $file->getClientSize();
        $photo->type = $request->type;
        $photo->image = $cover_img;
        $photo->thumb = $thumb_img;
        $photo->save();
        foreach ($request->album as $value) {
            $photo->albums()->attach([
                $value
            ]);
        }

        return redirect()->action('Admin\PhotosController@index')->with('toast_success', 'Photo ajoutée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        if ($photo == null) {
            return back();
        }

        $page_name = $photo->name;
        return view('admin.pages.photos.show', compact('page_name', 'photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::find($id);
        if ($photo == null) {
            return back();
        }

        $album = Album::pluck('name', 'id');
        $selectedAlbum = DB::table('album_photo')->where('album_photo.photo_id', $id)
            ->pluck('album_id')
            ->toArray();
        $page_name = "Modification d'une photo";
        return view('admin.pages.photos.edit', compact('page_name', 'photo', 'album', 'selectedAlbum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);
        if ($photo == null) {
            return back();
        }

        $this->validate($request, [
            'name' => 'required|min:5|max:191',
            'type' => 'required',
            'album' => 'required',
            'image' => 'image|max:1999',
            'red' => 'required'
        ], [
            'name.required' => "Le nom de l'image est obligatoire.",
            'name.min' => "Le nom nom de l'image doit avoir au moins 5 caractères.",
            "type" => "Tu dois choisir le type de l'image",
            "album" => "Tu dois choisir le type d'album.",
            'image.image' => 'Format incorrect. Formats supportés: git, jpeg, jpg, png.',
            'image.max' => "L'image ne doit pas dépasser 2MB",
        ]);

        if ($request->has('image')) {
            // delete old images
            Storage::delete('public/photos/' . $photo->image);
            Storage::delete('public/thumbnails/' . $photo->thumb);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $thumb_img = 'thumb_' . time() . '.' . $extension;
            $cover_img = 'image_' . time() . '.' . $extension;

            $data = [
                'file' => $file,
                'thumb' => $thumb_img,
                'image' => $cover_img,
                'red' => $request->red,
                'type' => $request->type
            ];

            $this->resize($data);
            $photo->image = $cover_img;
            $photo->thumb = $thumb_img;
            $photo->size = $file->getClientSize();
            $photo->save();
        }

        $photo->name = $request->name;
        $photo->type = $request->type;
        $photo->save();

        // delete old relations
        DB::table('album_photo')->where('album_photo.photo_id', $id)->delete();
        foreach ($request->album as $value) {
            $photo->albums()->attach([
                $value
            ]);
        }
        return redirect()->action('Admin\PhotosController@index')->with('toast_success', 'Modification de la photo réussie.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        if ($photo == null) {
            return back();
        }

        // delete old images
        Storage::delete('public/photos/' . $photo->image);
        Storage::delete('public/thumbnails/' . $photo->thumb);

        // delete old relations
        DB::table('album_photo')->where('album_photo.photo_id', $id)->delete();
        $photo->delete();
        return redirect()->action('Admin\PhotosController@index')->with('toast_success', 'Suppression de la photo réussie.');
    }

    public function resize($data)
    {
        ini_set('memory_limit', '256M');
        Image::make($data['file'])->resize(122, 122)->save(storage_path('app/public/thumbnails/' . $data['thumb']));

        if ($data['red'] == 'oui') {

            // portrait
            if ($data['type'] == 'portrait') {
                Image::make($data['file'])->resize(800, 1200)->save(storage_path('app/public/photos/' . $data['image']));
            }
            // landscape
            else if ($data['type'] == 'landscape') {
                Image::make($data['file'])->resize(1050, 725)->save(storage_path('app/public/photos/' . $data['image']));
            }
        } else if ($data['red'] == 'non') {
            $path = $data['file']->storeAs('public/photos', $data['image']);
        }
    }
}
