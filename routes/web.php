<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\schoolcontroller;
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

Route::get('/addschool', [schoolcontroller::class, 'addschool']);
Route::get('/view_school', [schoolcontroller::class, 'view_school']);
Route::get('/get-cities', [schoolcontroller::class, 'getCitiesByProvince']);

Route::post('/items/store', [schoolcontroller::class, 'store']);


Route::get('/get_data', [schoolcontroller::class, 'get_data']);

Route::get('school/singleschool', [schoolcontroller::class, 'singleschool']);