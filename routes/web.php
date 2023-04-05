<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

route::get('/' , [TodoController::class,'index']) ;//listing des taches
route::post('/add' , [TodoController::class,'store'])->name('add') ;// ajouter des taches
route::get('/upd' , [TodoController::class,'update'])->name('upd') ;//url de mise a jour de la tache
route::get('/del' , [TodoController::class,'delete'])->name('del') ;//suppression de la tache