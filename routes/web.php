<?php

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

Route::any('/locker','MainControllers@locker') ;
Route::any('/Deposit','MainControllers@Deposit') ;
Route::any('/withdraw','MainControllers@withdraw') ;
Route::any('/withdraw_ok','MainControllers@withdraw_ok') ;
//{status}/{locker}
//'MainControllers@Status'