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
use App\Http\Controllers\AuthController;



Route::get('/', [EventController::class, 'getProfessors']);
Route::post('/events/created', [EventController::class, 'createProfessor'])->middleware('authUser');

Route::get('/events/create', [EventController::class, 'formProfessor'])->middleware('authUser');
Route::get('/professor/{id}', [EventController::class, 'showProfessor']);

// Authentication route
Route::get('/login', [AuthController::class, 'index']) -> name('login')->middleware('alreadLoggedIn');
Route::post('/api/login', [AuthController::class, 'login']) ->name('login.api')->middleware('alreadLoggedIn');
Route::post('/api/logout', [AuthController::class, 'logout']) ->name('logout.api');

// Aulas
Route::get('/createAula', [EventController::class, 'showAula'])->name('create.aula')->middleware('authUser');
Route::post('/createdAula', [EventController::class, 'createAula'])->name('create.aula.api')->middleware('authUser');
Route::get('/getAulas', [EventController::class, 'getAulas'])->name('aulas');

Route::delete('/deleteAula/{id}', [EventController::class, 'deleteAula'])->name('delete.aula')->middleware('authUser');
Route::get('editAula', [EventController::class, 'editAula'])->name('edit.aula')->middleware('authUser');
Route::put('editarAula', [EventController::class, 'editarAula'])->name('editar.aula')->middleware('authUser');