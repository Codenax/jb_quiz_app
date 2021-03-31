<?php

use App\Http\Controllers\QuizeController;
use Illuminate\Support\Facades\Request;
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
})->name('/');


Route::resource('quiz', QuizeController::class);
Route::any('start-quiz', [QuizeController::class, 'startQuiz']);
Route::any('submit-ans', [QuizeController::class, 'submitAns']);
Route::any('session-flash', [QuizeController::class, 'removeSession']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
