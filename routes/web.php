<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->name('admin.')->group(function() {
   Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
   Route::get('login',[AdminController::class,'login'])->name('login');
   Route::post('connecter',[AdminController::class,'connecter'])->name('connecter');
   Route::get('logout',[AdminController::class,'logout'])->name('logout');
   Route::get('register',[AdminController::class,'register'])->name('register');
   Route::post('enregistrer',[AdminController::class,'enregistrer'])->name('enregistrer');
});

Route::prefix('editor')->name('editor.')->group(function(){
    Route::get('dashboard',[EditorController::class,'dashboard'])->name('dashboard')->middleware('editor');
    Route::get('login',[EditorController::class,'login'])->name('login');
    Route::post('connecter',[EditorController::class,'connecter'])->name('connecter');
    Route::get('logout',[EditorController::class,'logout'])->name('logout');
    Route::get('register',[EditorController::class,'register'])->name('register');
    Route::post('enregistrer',[EditorController::class,'enregistrer'])->name('enregistrer');
});







Route::resource('products',ProductController::class);
Route::resource('categories',CategoryController::class);

Route::get('/',[HomeController::class,'home'])->name('Home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
