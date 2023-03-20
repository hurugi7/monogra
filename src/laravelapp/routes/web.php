<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HaveCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HaveItemController;
use App\Http\Controllers\ItemPhotoController;
use App\Http\Controllers\HaveSubCategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Models\SubCategory;
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

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::controller(UserController::class)->group(function () {
        Route::get('/user_profile/edit', 'edit')->name('user.edit');
        Route::put('/user_profile/update', 'update')->name('user.update');
    });

    Route::controller(HaveCategoryController::class)->group(function () {
        Route::get('/have/categories', 'index')->name('have_category.index');
        Route::get('/have/categories/create', 'create')->name('have_category.create');
        Route::post('/have/categories/create', 'store')->name('have_category.store');
            Route::group(['middleware' => 'can:view,category'], function() {
                Route::get('/have/categories/{category}/edit', 'edit')->name('have_category.edit');
                Route::put('/have/categories/{category}', 'update')->name('have_category.update');
                Route::delete('/have/categories/{category}', 'destroy')->name('have_category.destroy');
            });
        });

    Route::group(['middleware' => 'can:view,category'], function() {
        Route::controller(HaveSubCategoryController::class)->group(function () {
            Route::get('/have/categories/{category}/sub_categories', 'index')->name('have_sub_category.index');
            Route::get('/have/categories/{category}/sub_categories/create', 'create')->name('have_sub_category.create');
            Route::post('/have/categories/{category}/sub_categories/create', 'store')->name('have_sub_category.store');
            Route::get('/have/categories/{category}/sub_categories/{sub_category}/edit', 'edit')->name('have_sub_category.edit');
            Route::put('/have/categories/{category}/sub_categories/{sub_category}', 'update')->name('have_sub_category.update');
            Route::delete('/have/categories/{category}/sub_categories/{sub_category}', 'destroy')->name('have_sub_category.destroy');
        });

        Route::controller(HaveItemController::class)->group(function () {
            Route::get('have/categories/{category}/sub_categories/{sub_category}/items', 'index')->name('have_item.index');
            Route::get('have/categories/{category}/sub_categories/{sub_category}/items/create', 'create')->name('have_item.create');
            Route::post('have/categories/{category}/sub_categories/{sub_category}/items/create', 'store')->name('have_item.store');
            Route::get('have/categories/{category}/sub_categories/{sub_category}/items/{item}', 'show')->name('have_item.show');
            Route::get('have/categories/{category}/sub_categories/{sub_category}/items/{item}/edit', 'edit')->name('have_item.edit');
            Route::put('have/categories/{category}/sub_categories/{sub_category}/items/{item}', 'update')->name('have_item.update');
            Route::delete('have/categories/{category}/sub_categories/{sub_category}/items/{item}', 'destroy')->name('have_item.destroy');
        });

        Route::controller(ItemPhotoController::class)->group(function () {
            Route::get('have/categories/{category}/sub_categories/{sub_category}/items/{item}/item_photos', 'index')->name('item_photo.index');
            Route::delete('have/categories/{category}/sub_categories/{sub_category}/items/{item}/item_photos/{item_photo}/destroy', 'destroy')->name('item_photo.destroy');
        });
    });
    Route::get('/search', [SearchController::class, 'search'])->name('search');
});

require __DIR__.'/auth.php';
