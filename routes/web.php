<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/redirects', [HomeController::class, 'redirects']);

Route::get('/users', [AdminController::class, 'user']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);

Route::get('/foodsmenu', [AdminController::class, 'foodsmenu']);
Route::post('/uploadfood', [AdminController::class, 'upload']);
Route::get('/deletefood/{id}', [AdminController::class, 'deletefood']);
Route::get('/updatefoods/{id}', [AdminController::class, 'updatefoods']);
Route::post('/updatefood/{id}', [AdminController::class, 'updatefoodies']);

Route::post('/reservation', [HomeController::class, 'reservation']);
Route::get('/reservations', [AdminController::class, 'reservations']);

Route::get('/chef', [AdminController::class, 'chef']);
Route::post('/chefses', [AdminController::class, 'inputChef']);
Route::get('/showchef', [AdminController::class, 'chefmenu']);
Route::get('/deletechef/{id}', [AdminController::class, 'deletechef']);
Route::get('/updatechefs/{id}', [AdminController::class, 'updatechefs']);
Route::post('/updatechef/{id}', [AdminController::class, 'updatechef']);

// CaRT Routing
Route::post('/addcart/{id}', [HomeController::class, 'addcart']);
Route::get('/showcart/{id}', [HomeController::class, 'showcart']);
Route::get('/removecart/{id}', [HomeController::class, 'removecart']);
Route::post('/savecart', [HomeController::class, 'savecart']);

Route::get('/orders', [AdminController::class, 'orders']);
Route::get('/searchorders', [AdminController::class, 'searchorders']);
Route::post('/ordered/{id}', [AdminController::class, 'ordered']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::put();