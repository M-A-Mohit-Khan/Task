<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\QuestionController;
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

//Route::get("/",[HomeController::class,'index']);

//Route::get("/",[HomeController::class,'index']);
Route::get("/",[LoginController::class,'index']);
Route::post("/user/login",[LoginController::class,'userLogin']);
Route::get("/insert-question",[QuestionController::class,'index']);
Route::post("/submit-question",[QuestionController::class,'submitQuestion']);
Route::get("/show-question",[QuestionController::class,'showQuestion']);