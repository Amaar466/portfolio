<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BasicProjectController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//home page
Route::get('/', [UserController::class,'frontshow'])->name('show.index');
Route::get('/new/project',[BasicProjectController::class,'projectShow'])->name('front.project');
//User Route

Route::get('/get/user' , [UserController::class,'index'])->name('get.user');
Route::post('/user/store',[UserController::class,'store'])->name('user.store');
Route::get('/user', [UserController::class, 'listAllUsers'])->name('user.listAll');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('edit.user');
Route::post('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('delete.user');

//Project Route
Route::get('/get/project',[BasicProjectController::class,'index'])->name('basic_project.create');
Route::post('/basic_project/store', [BasicProjectController::class, 'store'])->name('basic_project.store');
Route::get('/basic_project', [BasicProjectController::class, 'show'])->name('basic_project.show');
Route::get('/basic_project/edit/{id}', [BasicProjectController::class, 'edit'])->name('basic_project.edit');
Route::post('/basic_projects/{id}', [BasicProjectController::class, 'update'])->name('basic_project.update');
Route::get('/project/delete/{id}', [BasicProjectController::class, 'delete'])->name('delete.project');
