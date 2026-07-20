<?php

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
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'getProfessors']);
Route::post('/events/created', [EventController::class, 'createProfessor']);
Route::get('/events/create', [EventController::class, 'formProfessor']);
Route::get('/professor/{id}', [EventController::class, 'showProfessor']);

Route::get('/hello/{name}', function ($name) {

    return view('hello', ['name' => $name]);
}); 

Route::get('/hello', function () {
    $nome = request('nome');
    return view('hello', ['name' => $nome]);
});  