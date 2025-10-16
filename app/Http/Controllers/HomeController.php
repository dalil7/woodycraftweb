<?php

namespace App\Http\Controllers;

use App\Models\Puzzle;
use App\Models\Categorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categorie::all();

        $categorieId = $request->query('categorie');
        if ($categorieId) {
            $puzzles = Puzzle::where('id_categorie', $categorieId)->get();
        } else {
            $puzzles = Puzzle::all();
        }

        return view('home', compact('puzzles', 'categories', 'categorieId'));
    }
}
