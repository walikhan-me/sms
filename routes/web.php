<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\schoolcontroller;
use App\Http\Controllers\fee_management;
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

Route::get('student_managment/addstudent', [schoolcontroller::class, 'addstudent']);
Route::post('add_student_db',[schoolcontroller::class,'add_student_db']);

Route::get('student_managment/active_student_list', [schoolcontroller::class, 'active_student_list']);
Route::get('/edit_student/{id}',[schoolcontroller::class,'edit_student']);
Route::post('/edit_active_student',[schoolcontroller::class,'edit_active_student']);
Route::get('/inactive_student/{id}',[schoolcontroller::class,'inactive_student']);
Route::get('/student_managment/inactive_student_list',[schoolcontroller::class,'inactive_student_list']);
Route::post('/inactive_student_',[schoolcontroller::class,'inactive_student_']);


/////FEE MANAGEMENT////



Route::get('/fee_management/fees/create_fee',[fee_management::class,'create_fee'])->name('create_fee');

Route::post('/submitfee',[fee_management::class,'submitfee']);
Route::get('/fee_management/fees/view_fee',[fee_management::class,'view_fee']);
// fee_management/fee_voucher/single_fee_voucher
Route::get('fee_management/fee_voucher/single_fee_voucher',[fee_management::class,'single_fee_voucher']);

Route::post('/create_single_voucher',[fee_management::class,'create_single_voucher']);
// generate single fee voucher
Route::get('/fee_management/fee_voucher/generate_voucher',[fee_management::class,'generate_voucher'])->name('generate_voucher');