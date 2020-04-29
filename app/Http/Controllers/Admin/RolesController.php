<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Tous les roles";
        $data = Role::all();
        return view('admin.pages.roles.list', compact('page_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Création d'un role";
        $permission = Permission::pluck('name', 'id');
        return view('admin.pages.roles.create', compact('page_name', 'permission'));
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
            'name' => 'required',
            'permission' => 'required|array',
            'permission.*' => 'required|string'
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'permission.required' => 'Tu dois choisir au moins une permission.',
            'permission.*.required' => 'Tu dois choisir au moins une permission.'
        ]);

        $role = new Role;
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();
        foreach ($request->permission as $value) {
            $role->attachPermission($value);
        }

        return redirect()->action('Admin\RolesController@index')->with('toast_success', 'Création du role réussie.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Modification d'un role";
        $role = Role::find($id);

        if ($role == null) {
            return redirect()->action('Admin\RolesController@index');
        }

        $permission = Permission::pluck('name', 'id');
        $selectedPermission = DB::table('permission_role')->where('permission_role.role_id', $id)
            ->pluck('permission_id')->toArray();
        return view('admin.pages.roles.edit', compact('page_name', 'role', 'permission', 'selectedPermission'));
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
            'name' => 'required',
            'permission' => 'required|array',
            'permission.*' => 'required'
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'permission.required' => 'Tu dois choisir au moins une permission.',
            'permission.*.required' => 'Tu dois choisir au moins une permission.'
        ]);

        $role = Role::find($id);

        if ($role == null) {
            return redirect()->action('Admin\RolesController@index');
        }

        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();
        //you must delete the permissions for update the table
        DB::table('permission_role')->where('role_id', $id)->delete();
        foreach ($request->permission as $value) {
            $role->attachPermission($value);
        }

        return redirect()->action('Admin\RolesController@index')->with('toast_success', 'Modification du role réussie.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        return redirect()->action('Admin\RolesController@index')->with('toast_success', 'Suppresion du role réussie.');
    }
}
