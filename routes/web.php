<?php

use App\Http\Controllers\FatoorahController;
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

route::get('/pay','FatoorahController@payOrder');
// route::get('/callBack',FatoorahController::class,'callBack');
// route::get('/error',FatoorahController::class,'error');

