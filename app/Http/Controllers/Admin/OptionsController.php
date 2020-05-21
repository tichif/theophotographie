<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;
use App\Option;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Plan::with('Options')->find($id);

        if ($data == null) {
            return back();
        }

        $page_name = $data->name;
        return view('admin.pages.options.list', compact('page_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $page_name = "Création d'une option";
        return view('admin.pages.options.create', compact('page_name', 'id'));
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
            'id' => 'required'
        ], [
            'name.required' => "Tu dois mettre l'option",
            'name.min' => "L'option doit contenir au moins 5 caractères."
        ]);

        $plan = Plan::find($request->id);
        if ($plan == null) {
            return back();
        }

        $plan->options()->create([
            'name' => $request->name
        ]);


        return redirect()->route('option-list', $request->id)->with('toast_success', "Création de l'option réussie.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $option = Option::find($id);
        if ($option == null) {
            return back();
        }
        $page_name = "Editrer une option";

        return view('admin.pages.options.edit', compact('page_name', 'option'));
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
        ], [
            'name.required' => "Tu dois mettre l'option",
            'name.min' => "L'option doit contenir au moins 5 caractères."
        ]);

        $option = Option::find($id);
        if ($option == null) {
            return back();
        }

        $option->name = $request->name;
        $option->save();

        return redirect()->route('option-list', $option->plan_id)->with('toast_success', "Modification de l'option réussie.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = Option::find($id);
        if ($option == null) {
            return back();
        }

        $option->delete();
        return redirect()->route('option-list', $option->plan_id)->with('toast_success', "Suppression de l'option réussie.");
    }
}
