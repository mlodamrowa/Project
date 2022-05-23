<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
Route::match(['get', 'post'], 'stworz', [PostController :: class, 'create'])
    ->name('create');
Route::get('ksiazki', [PostController :: class, 'view'])
    ->name('view');
Route::delete('/ksiazki/usun', [PostController :: class, 'delete'])
    ->name('delete');
Route::patch('edytuj', [PostController :: class, 'edit'])
    ->name('edit');

