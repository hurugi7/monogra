<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HaveCategoryController;
use App\Http\Controllers\HaveItemController;
use App\Http\Controllers\HaveSubCategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Contracts\Pipeline\Hub;
use Illuminate\Support\Facades\Auth;

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
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::controller(HaveCategoryController::class)->group(function () {
        Route::get('/have/categories', 'index')->name('have_category.index');
        Route::get('/have/categories/create', 'create')->name('have_category.create');
        Route::post('/have/categories/create', 'store')->name('have_category.store');
        Route::get('/have/categories/{category}/edit', 'edit')->name('have_category.edit');
        Route::put('/have/categories/{category}', 'update')->name('have_category.update');
        Route::delete('/have/categories/{category}', 'destroy')->name('have_category.destroy');
    });

    /*
    Route::controller(WantCategoryController::class)->group(function () {
        Route::get('/want/categories', 'index')->name('want_category.index');
        Route::get('/want/categories/crete', 'create')->name('want_category.create');
        Route::post('/want/categories/create', 'store')->name('want_category.store');
        Route::get('/want/categories/{category}/edit', 'edit')->name('want_category.edit');
        Route::put('/want/categories/{category}', 'update')->name('want_category.update');
        Route::delete('/want/categories/{category}', 'destroy')->name('want_category.destroy');
    });
    */


    Route::controller(HaveSubCategoryController::class)->group(function () {
        Route::get('/have/categories/{category}/sub_categories', 'index')->name('have_sub_category.index');
        Route::get('/have/categories/{category}/sub_categories/create', 'create')->name('have_sub_category.create');
        Route::post('/have/categories/{category}/sub_categories/create', 'store')->name('have_sub_category.store');
        Route::get('/have/categories/{category}/sub_categories/{sub_category}/edit', 'edit')->name('have_sub_category.edit');
        Route::put('/have/categories/{category}/sub_categories/{sub_category}', 'update')->name('have_sub_category.update');
        Route::delete('/have/categories/{category}/sub_categories/{sub_category}', 'destroy')->name('have_sub_category.destroy');
    });

    /*
    Route::controller(WantSubCategoryController::class)->group(function () {
        Route::get('/want/categories/{category}/sub_categories', 'index')->name('want_sub_category.index');
        Route::get('/want/categories/{category}/sub_categories/create', 'create')->name('want_sub_category.create');
        Route::post('/want/categories/{category}/sub_categories/create', 'store')->name('want_sub_category.store');
        Route::get('/want/categories/{category}/sub_categories/{sub_category}/edit', 'edit')->name('want_sub_category.edit');
        Route::put('/want/categories/{category}/sub_categories/{sub_category}', 'update')->name('want_sub_category.update');
        Route::delete('/want/categories/{category}/sub_categories/{sub_category}', 'destroy')->name('want_sub_category.destroy');
    });
    */

    Route::controller(HaveItemController::class)->group(function () {
        Route::get('have/categories/{category}/sub_categories/{sub_category}/items', 'index')->name('have_item.index');
    });
});

require __DIR__.'/auth.php';
