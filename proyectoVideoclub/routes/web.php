<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'getHome'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('logout', function (){
        echo "Logout usuario";
    });

    Route::get('catalog', [CatalogController::class, 'getIndex'])->name('index');

    Route::get('catalog/show/{id}', [CatalogController::class, 'getShow'])->where('id', '[0-9]+')->name('show');
    Route::put('/catalog/show/{id}', [CatalogController::class, 'putRent'])->name('putRent');

    Route::get('catalog/create', [CatalogController::class, 'getCreate'])->name('create');
    Route::post('catalog/create', [CatalogController::class, 'postCreate'])->name('postCreate');

    Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit'])->name('edit');
    Route::put('catalog/edit/{id}', [CatalogController::class, 'putEdit'])->name('putEdit');


    Route::get('catalog/delete/{id}', [CatalogController::class, 'getDelete'])->name('delete');
    Route::delete('catalog/delete/{id}',[CatalogController::class, 'delete'])->name('confirmed');

});

require __DIR__.'/auth.php';
