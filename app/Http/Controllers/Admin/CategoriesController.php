<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Toutes les categories";
        $data = Category::all();
        return view('admin.pages.categories.list', compact('page_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Créer une catégorie";
        return view('admin.pages.categories.create', compact('page_name'));
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
            'name' => 'required|min:5',
            'description' => 'required|min:5',
        ], [
            'name.required' => 'Tu dois mettre un nom.',
            'name.min' => 'Le nom doit avoir au moins 5 charactères.',
            'description.required' => 'Tu dois mettre une description.',
            'description.min' => 'La description doit avoir au moins 5 charactères.'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->action('Admin\CategoriesController@index')->with('toast_success', 'Création de la catégorie réussie.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Editer une categorie";
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->action('Admin\CategoriesController@index');
        }

        return view('admin.pages.categories.edit', compact('page_name', 'category'));
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
        $this->validate($request, [
            'name' => 'required|min:5',
            'description' => 'required|min:5',
        ], [
            'name.required' => 'Tu dois mettre un nom.',
            'name.min' => 'Le nom doit avoir au moins 5 charactères.',
            'description.required' => 'Tu dois mettre une description.',
            'description.min' => 'La description doit avoir au moins 5 charactères.'
        ]);

        $category = Category::find($id);

        if ($category == null) {
            return redirect()->action('Admin\CategoriesController@index');
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->action('Admin\CategoriesController@index')->with('toast_success', 'Modification de la catégorie réussie.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category == null) {
            return redirect()->action('Admin\CategoriesController@index');
        }

        $category->delete();
        return redirect()->action('Admin\CategoriesController@index')->with('toast_success', 'Suppression de la catégorie réussie.');
    }
}
