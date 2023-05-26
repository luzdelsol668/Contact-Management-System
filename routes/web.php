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

// Access to the index page
Route::get('/', "App\Http\Controllers\ContactController@index")->name('home_page');
Route::get('login', "App\Http\Controllers\ContactController@login")->name('login');
Route::post('login', "App\Http\Controllers\ContactController@login")->name('login');
Route::get('logout', "App\Http\Controllers\ContactController@logout")->name('logout');


Route::middleware(['auth'])->group(function () {
    // Routes requiring authentication

    Route::get('add-new-contact', "App\Http\Controllers\ContactController@create")->name('add_new_contact');
    Route::post('store-new-contact', "App\Http\Controllers\ContactController@store")->name('save_new_contact');
    Route::get('contact/{id}/show', "App\Http\Controllers\ContactController@show")->name('show_contact');
    Route::get('contact/{id}/edit', "App\Http\Controllers\ContactController@edit")->name('edit_contact');
    Route::post('contact/{id}/edit', "App\Http\Controllers\ContactController@update")->name('update_contact');
    Route::get('contact/{id}/delete', "App\Http\Controllers\ContactController@destroy")->name('delete_contact');


});

