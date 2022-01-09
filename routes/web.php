<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DefaultController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\ProfileController;

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
//Default routelar
Route::get('/',[DefaultController::class,'index'])->name('frontend.home');
Route::get('/empty',[DefaultController::class,'emptypage']);
Route::get('/scotty',[DefaultController::class,'scotty'])->name('scotty')->middleware('islogin');

Route::get('login',[DefaultController::class,'login'])->name('login');
Route::get('loginAttempt',[DefaultController::class,'loginAttempt'])->name('loginattempt');
Route::get('logout',[DefaultController::class,'logout'])->name('logout');
Route::get('register',[DefaultController::class,'register'])->name('register');
Route::post('register/process',[DefaultController::class,'registerInsert'])->name('registerInsert');

//Post işlemleri
Route::post('post/insert',[PostController::class,'insert'])->name('postInsert')->middleware('islogin');
Route::get('{category}/{slug}/{uuid}',[PostController::class,'details'])->name('post.detail');
Route::post('comment/insert',[CommentController::class,'store'])->name('commentInsert')->middleware('islogin');


//Profil İşlemleri
Route::get('/profile',[ProfileController::class,'index'])->name('profile')->middleware('islogin');
Route::post('/profile/update',[ProfileController::class,'update'])->name('profile.update')->middleware('islogin');

Route::get('/category/{category}',[PostController::class,'categories'])->name('category.post');
