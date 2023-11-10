<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\NpiSearch;

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

/** 
 * NPI API
 * Gets results based on the Input query params like
 * NPI Number, First Name, Last Name, Organization Name, City, State, Postal Code
 */

Route::get('/npi', NpiSearch::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
