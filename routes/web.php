<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GharanaController;
use App\Http\Controllers\GharanaController1;

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
    return view('search');
});
// Route::get('/nalywala', [GharanaController::class,'search'])->name('search');
// Route::post('gharana', [GharanaController::class,'index'])->name('gharana');
// Route::post('cnic', [GharanaController::class,'cnic'])->name('cnic');
// Route::post('multi-cnic', [GharanaController::class,'multi_cnic'])->name('multi-cnic');



Route::get('/', [GharanaController1::class,'search'])->name('search1');
// Route::post('gharana1', [GharanaController1::class,'index'])->name('gharana1');
Route::post('cnic1', [GharanaController1::class,'cnic'])->name('cnic1');
Route::post('cnic1-block', [GharanaController1::class,'cnicBlock'])->name('cnic-block');
Route::post('multi-cnic1', [GharanaController1::class,'multi_cnic'])->name('multi-cnic1');



Route::get('/get-data', [GharanaController1::class,'getData'])->name('get-data');
 