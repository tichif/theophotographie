<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Toutes les permissions";
        $data = Permission::all();

        return view('admin.pages.permissions.list', compact('page_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Création d'une permission";
        return view('admin.pages.permissions.create', compact('data', 'page_name'));
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
            'name' => 'required'
        ], [
            'name.required' => 'Le nom est obligatoire',
        ]);

        $permission = new Permission;
        $permission->name = $request->input('name');
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();
        return redirect()->action('Admin\PermissionsController@index')->with('toast_success', 'Création de la permission réussie.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Modification de la permission";
        $permission = Permission::find($id);
        if ($permission == null) {
            return redirect()->action('Admin\PermissionsController@index');
        }


        return view('admin.pages.permissions.edit', compact('page_name', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);

        if ($permission == null) {
            return redirect()->action('Admin\PermissionsController@index');
        }


        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Le nom est obligatoire',
        ]);

        $permission->name = $request->input('name');
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();
        return redirect()->action('Admin\PermissionsController@index')->with('toast_success', 'Modification de la permission réussie.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);

        if ($permission == null) {
            return redirect()->action('Admin\PermissionsController@index');
        }

        $permission->delete();
        return redirect()->action('Admin\PermissionsController@index')->with('toast_success', 'Suppression de la permission réussie.');
    }
}
