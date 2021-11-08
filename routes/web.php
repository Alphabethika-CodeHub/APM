<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

// Pages
Route::get('/about', [PageController::class, 'about']);
Route::get('/policy', [PageController::class, 'policy']);

// Passing Data Admin
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

// Data
Route::post('/store', [ComplaintController::class, 'store']);
Route::post('/store-anonim', [ComplaintController::class, 'storeAnonim']);
Route::delete('/delete/{complaint}', [ComplaintController::class, 'destroy']);

// Passing Data
Route::get('/pengaduan-lengkap', [ComplaintController::class, 'index']);
Route::get('/detail/{complaint}', [ComplaintController::class, 'show'])->name('complaint.show');

// Datatables
Route::get('/complaint-datatable', [ResponseController::class, 'getComplaint'])->name('complaint.list');
Route::get('/user-datatable', [ResponseController::class, 'getUserMinified'])->name('user.list');

Route::get('/home/complaints-detail', [ResponseController::class, 'getComplaintsDetail']);
Route::get('/home/users-details', [ResponseController::class, 'getUsersDetail']);
Route::delete('/delete-user/{user}', [ResponseController::class, 'destroyUser']);

Route::post('/home/create-employee', [ResponseController::class, 'createEmployee']);
Route::post('/home/create-public', [ResponseController::class, 'createPublic']);

Route::post('/create-response/{complaint}', [ResponseController::class, 'storeResponse']);
Route::delete('/delete-response/{response}', [ResponseController::class, 'destroyResponse']);
Route::patch('/update-response/{response}', [ResponseController::class, 'updateResponse']);

Route::patch('/update-status/{complaint}', [ComplaintController::class, 'updateStatus']);

// Route::get('/home/change-password', [ResponseController::class, 'about']); Cek Internet
// Route::get('/home/create-user', [ResponseController::class, 'store']); Ngambil Dari Register

