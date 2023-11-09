<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index()
    {
        return view("category");
    }

    public function add(Request $request): RedirectResponse
    {
        // Validate the request...

        $Category = new Category;

        $Category->category_name = $request->name;
        $Category->user_id = $request->id;

        $Category->save();

        return redirect('/category');
    }
}
