<?php

use Illuminate\Support\Facades\DB;
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

Route::get('/tambahtransaksi', function () {
    return view('tambahtransaksi');
});
Route::get('/', function(){
    $user = DB::table('users')->get();
    return view('datanasabah')->with('user',$user);
});
Route::get('/liatpoint', function(){
    $user = DB::table('users')->get();
    return view('liatpoint')->with('user',$user);
});
Route::get('/tambahnasabah', "usersController@create");
Route::post('/postnasabah', "usersController@postnasabah");

Route::post('/posttransaksi', "transaksiController@posttransaksi");
Route::get('/caritransaksi', "transaksiController@gettransaksi");



