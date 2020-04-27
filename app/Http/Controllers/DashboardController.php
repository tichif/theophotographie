<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $page_name = 'Accueil';
        return view('admin.pages.home',compact('page_name'));
    }
}
