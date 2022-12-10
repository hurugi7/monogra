<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(HaveCategoryController::class)->group(function () {
    Route::get('/have/category/{category}, index')->name('have_category.index');
    Route::get('/have/category/{category}, create')->name('have_category.create');
    Route::post('/have/category/{category}, store')->name('have_category.store');
    Route::get('/have/category/{category}, show')->name('have_category.show');
    Route::get('/have/category/{category}, edit')->name('have_category.edit');
    Route::put('/have/category/{category}, update')->name('have_category.update');
    Route::delete('/have/category/{category}, destroy')->name('have_category.destroy');
});

Route::controller(WantCategoryController::class)->group(function () {
    Route::get('/want/category/{category}, index')->name('want_category.index');
    Route::get('/want/category/{category}, create')->name('want_category.create');
    Route::post('/want/category/{category}, store')->name('want_category.store');
    Route::get('/want/category/{category}, show')->name('want_category.show');
    Route::get('/want/category/{category}, edit')->name('want_category.edit');
    Route::put('/want/category/{category}, update')->name('want_category.update');
    Route::delete('/want/category/{category}, destroy')->name('want_category.destroy');
});


Route::controller(HaveSubCategoryController::class)->group(function () {
    Route::get('/have/category/{category}/sub_category/{sub_category}, index')->name('have_sub_category.index');
    Route::get('/have/category/{category}/sub_category/{sub_category}, create')->name('have_sub_category.create');
    Route::post('/have/category/{category}/sub_category/{sub_category}, store')->name('have_sub_category.store');
    Route::get('/have/category/{category}/sub_category/{sub_category}, show')->name('have_sub_category.show');
    Route::get('/have/category/{category}/sub_category/{sub_category}, edit')->name('have_sub_category.edit');
    Route::put('/have/category/{category}/sub_category/{sub_category}, update')->name('have_sub_category.update');
    Route::delete('/have/category/{category}/sub_category/{sub_category}, destroy')->name('have_sub_category.destroy');
});

Route::controller(WantSubCategoryController::class)->group(function () {
    Route::get('/want/category/{category}/sub_category/{sub_category}, index')->name('want_sub_category.index');
    Route::get('/want/category/{category}/sub_category/{sub_category}, create')->name('want_sub_category.create');
    Route::post('/want/category/{category}/sub_category/{sub_category}, store')->name('want_sub_category.store');
    Route::get('/want/category/{category}/sub_category/{sub_category}, show')->name('want_sub_category.show');
    Route::get('/want/category/{category}/sub_category/{sub_category}, edit')->name('want_sub_category.edit');
    Route::put('/want/category/{category}/sub_category/{sub_category}, update')->name('want_sub_category.update');
    Route::delete('/want/category/{category}/sub_category/{sub_category}, destroy')->name('want_sub_category.destroy');
});

require __DIR__.'/auth.php';
