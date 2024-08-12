<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categories::with('categories_children')->whereNull('parent_id')->get();
        return view('home', compact('categories'));
    }
}
