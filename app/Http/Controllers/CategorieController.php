<?php
namespace App\Http\Controllers;

use App\Models\Categorie;

class CategorieController extends Controller
{
   public function index()
{
    $categories = \App\Models\Categorie::all();
    return view('dashboard', compact('categories'));
}

}
