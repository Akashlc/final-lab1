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

    public function AddCat(Request $request): RedirectResponse
    {
        // Validate the request...

        $Category = new Category;

        $Category->category_name = $request->name;
        $Category->user_id = $request->id;

        $Category->save();

        return redirect('/category');
    }

    public function EditCat($id)
    {
        $update = Category::find($id);
        return view('editForm', compact('update'));
    }

    public function UpdateCat(Request $request, $id): RedirectResponse
    {
        // Validate the request...
        $updatedCategory = Category::find($id);

        // if (!$updatedCategory) {
        //     // Handle the case where the category with the given ID is not found.
        //     return redirect('/category');
        // }

        $updatedCategory->category_name = $request->input('name');
        $updatedCategory->user_id = $request->input('id');

        $updatedCategory->save();

        return redirect('/category');
    }
}
