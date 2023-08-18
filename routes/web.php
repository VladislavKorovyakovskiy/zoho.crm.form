<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Request;
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
    return view('create-deals');
});

Route::get('/contact', 'ApiController@contact');
Route::post('/add/deals', 'ApiController@createDeals');
Route::post('/', 'ApiController@createContact');

Route::get('/success', function () {
    return view('validation\success');
});
