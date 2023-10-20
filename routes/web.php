<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
// Import Controller
use App\Http\Controllers\NewsController;
use App\Models\News;



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
    $jumlahnews = News::count();
    $jumlahcategory = News::count();
    return view('welcome', compact('jumlahnews', 'jumlahcategory'));
})->middleware('auth');

// Membuat route
Route::get('/news', [NewsController::class, 'index'])->name('news')->middleware('auth');

Route::get('/addnews', [NewsController::class, 'addnews'])->name('addnews');

Route::post('/insertdata', [NewsController::class, 'insertdata'])->name('insertdata');

Route::get('/showdata/{id}', [NewsController::class, 'showdata'])->name('showdata');

Route::post('/updatedata/{id}', [NewsController::class, 'updatedata'])->name('updatedata');

Route::get('/deletedata/{id}', [NewsController::class, 'deletedata'])->name('deletedata');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginuser', [LoginController::class, 'loginuser'])->name('loginuser');


Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




