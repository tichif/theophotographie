<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Tous les comptes";
        $data = User::all();
        return view('admin.pages.accounts.list', compact('page_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Créer un compte";
        $roles = Role::pluck('name', 'id');
        return view('admin.pages.accounts.create', compact('page_name', 'roles'));
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|array',
            'role.*' => 'required|string',
            'password2' => 'same:password'
        ], [
            'name.required' => 'Tu dois mettre un nom.',
            'email.required' => 'Tu dois mettre un email.',
            'email.email' => 'Email incorrect.',
            'email.unique' => 'Ce email existe déja.',
            'password.required' => 'Tu dois mettre un mot de passe.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 charactères.',
            'password2.same' => 'Les mots de passe ne correspondent pas.',
            'role.required' => 'Tu dois choisir un role pour le compte.',
            'role.*.required' => 'Tu dois choisir un role pour le compte.'
        ]);


        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->type = 1;
        $user->save();
        foreach ($request->role as $value) {
            $user->attachRole($value);
        }

        return redirect()->action('Admin\AccountsController@index')->with('toast_success', 'Création du compte réussie');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $page_name = "Modification du compte";
        $user = User::find($id);

        if ($user == null) {
            return redirect()->action('Admin\AccountsController@index');
        }


        $role = Role::pluck('name', 'id');
        $selectedRole = DB::table('role_user')->where('user_id', $id)
            ->pluck('role_id')->toArray();

        return view('admin.pages.accounts.edit', compact('page_name', 'user', 'role', 'selectedRole'));
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
            'password' => 'required|min:6',
            'role' => 'required|array',
            'role.*' => 'required|string',
            'password2' => 'same:password'
        ], [
            'name.required' => 'Tu dois mettre un nom.',
            'password.required' => 'Tu dois mettre un mot de passe.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 charactères.',
            'password2.same' => 'Les mots de passe ne correspondent pas.',
            'role.required' => 'Tu dois choisir un role pour le compte.',
            'role.*.required' => 'Tu dois choisir un role pour le compte.'
        ]);


        $user = User::find($id);

        if ($user == null) {
            return redirect()->action('Admin\AccountsController@index');
        }


        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        DB::table('role_user')->where('user_id', $id)->delete();
        foreach ($request->role as $value) {
            $user->attachRole($value);
        }

        return redirect()->action('Admin\AccountsController@index')->with('toast_success', 'Modification du compte réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (auth()->user()->id == $id) {
            return redirect()->action('Admin\AccountsController@index');
        }

        $user = User::find($id);
        if ($user == null) {
            return redirect()->action('Admin\AccountsController@index');
        }

        $user->delete();
        DB::table('role_user')->where('user_id', $id)->delete();

        return redirect()->action('Admin\AccountsController@index')->with('toast_success', 'Suppression du compte réussie');
    }

    public function getMySettings()
    {
        $page_name = "Modifier le mot de passe";

        return view('admin.pages.accounts.password', compact('page_name'));
    }

    public function putMySettings(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'password2' => 'same:password'
        ], [
            'password.required' => 'Tu dois mettre un mot de passe.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 charactères.',
            'password2.same' => 'Les mots de passe ne correspondent pas.',
        ]);

        $user = User::find(auth()->id());
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return back()->with('toast_success', 'Modification du mot de passe réussie.');
    }
}
