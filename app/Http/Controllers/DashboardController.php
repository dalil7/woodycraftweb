<?php

namespace App\Http\Controllers;

use App\Models\Categorie;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('dashboard', compact('categories'));
    }
}
