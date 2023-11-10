<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\NpiSearch;
use App\Livewire\NpiSearchForm;
use App\Livewire\SearchResults;

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

/** 
 * NPI API
 * Gets results based on the Input query params like
 * NPI Number, First Name, Last Name, Organization Name, City, State, Postal Code
 */


Route::get('/', NpiSearch::class)->name('search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
