<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Plan;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Category::with('Plans')->find($id);
        if ($data == null) {
            return redirect()->route('plan-list', $id);
        }

        $page_name = $data->name;

        return view('admin.pages.plans.list', compact('page_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $page_name = "Création d'un plan.";

        return view('admin.pages.plans.create', compact('page_name', 'id'));
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
            'price' => 'required|numeric',
            'id' => 'required',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.min' => 'Le nom doit contenir au moins 5 caractères.',
            'price.required' => 'Le prix est obligatoire.',
            'price.numeric' => 'Format incorrect.'
        ]);

        $price = (int) ($request->price);
        if ($price < 0  || $price > 1000000) {
            return back()->with('toast_error', 'Montant Incorrect');
        }

        $category = Category::find($request->id);
        if ($category == null) {
            return back();
        }

        $category->plans()->create([
            'name' => $request->name,
            'price' => $price
        ]);

        return redirect()->route('plan-list', $request->id)->with('toast_success', 'Création du plan réussie.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Editer un plan";

        $plan = Plan::find($id);

        if ($plan == null) {
            return back();
        }

        return view('admin.pages.plans.edit', compact('page_name', 'plan'));
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
            'price' => 'required|numeric',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.min' => 'Le nom doit contenir au moins 5 caractères.',
            'price.required' => 'Le prix est obligatoire.',
            'price.numeric' => 'Format incorrect.'
        ]);

        $price = (int) ($request->price);
        if ($price < 0  || $price > 1000000) {
            return back()->with('toast_error', 'Montant Incorrect');
        }

        $plan = Plan::find($id);

        if ($plan == null) {
            return back();
        }

        $plan->name = $request->name;
        $plan->price = $price;
        $plan->save();

        return redirect()->route('plan-list', $plan->category_id)->with('toast_success', 'Modification du plan réussie.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::find($id);

        if ($plan == null) {
            return back();
        }

        $this->authorize("delete", $plan);

        $plan->delete();
        return redirect()->route('plan-list', $plan->category_id)->with('toast_success', 'Suppression du plan réussie.');
    }
}
