<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('dashboard', compact('users'));
    })->name('dashboard');
});

Route::get('/category', function () {
    $categories = Category::all();
    return view('category', compact('categories'));
})->name('category');

Route::get('/form', function () {
    // $categories = Category::all();
    return view('form');
})->name('form');

Route::get('/editForm', function () {
    // $categories = Category::all();
    return view('editForm');
})->name('editForm');


Route::post('/CategoryController/addcat', [CategoryController::class, 'AddCat']);
Route::get('/CategoryController/edit{id}', [CategoryController::class, 'EditCat']);
Route::post('/CategoryController/update{id}', [CategoryController::class, 'UpdateCat']);
