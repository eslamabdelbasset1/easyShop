<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //All Category
    public function index()
    {
        return view('admin.category.index');
    }
    //Add Category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        // The blog post is valid...
    }
}
