<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Tous les albums";
        $data = Album::all();
        return view('admin.pages.albums.list', compact('page_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Créer un album";
        return view('admin.pages.albums.create', compact('page_name'));
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
            'description' => 'required|min:5|max:191',
        ], [
            'name.required' => "Le nom de l'album est obligatoire.",
            'name.min' => "Le nom de l'album doit avoir au moins 5 caractères.",
            'description.required' => "La description de l'album est obligatoire.",
            'description.min' => "La description de l'album doit avoir au moins 5 caractères.",
        ]);

        $album = new Album;
        $album->name = $request->name;
        $album->description = $request->description;
        $album->save();

        return redirect()->action('Admin\AlbumsController@index')->with('toast_success', "Création de l'alnum réussie.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        if ($album == null) {
            return back();
        }

        $page_name = "Modifier l'album";
        return view('admin.pages.albums.edit', compact('page_name', 'album'));
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
        $album = Album::find($id);
        if ($album == null) {
            return back();
        }

        $this->validate($request, [
            'name' => 'required|min:5|max:191',
            'description' => 'required|min:5|max:191',
        ], [
            'name.required' => "Le nom de l'album est obligatoire.",
            'name.min' => "Le nom de l'album doit avoir au moins 5 caractères.",
            'description.required' => "La description de l'album est obligatoire.",
            'description.min' => "La description de l'album doit avoir au moins 5 caractères.",
        ]);

        $album->name = $request->name;
        $album->description = $request->description;
        $album->save();

        return redirect()->action('Admin\AlbumsController@index')->with('toast_success', "Modification de l'alnum réussie.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        if ($album == null) {
            return back();
        }

        $this->authorize("delete", $album);

        $album->delete();
        return redirect()->action('Admin\AlbumsController@index')->with('toast_success', "Modification de l'alnum réussie.");
    }
}
