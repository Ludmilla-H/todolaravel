<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfilController;


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

route::get('/ecommerce' ,function(){
    return view ('ecommerce');

}); //mon site e-commerce


route::get('/' , [TodoController::class,'index']) ;//listing des tâches
route::get('/{sort}' , [TodoController::class,'index'])->name('sort') ;//mettre dans l'ordre croissant ou décroissant
route::get('/trier/{sort}/{tri}' , [TodoController::class,'index'])->name('tri') ;//trier les tâches entre faites et pas faites

route::post('/add' , [TodoController::class,'create'])->name('add') ;// ajouter des taches
route::get('/upd/{id}' , [TodoController::class,'update'])->name('upd') ;//url de mise a jour de la tâche
route::get('/del/{id}' , [TodoController::class,'delete'])->name('del') ;//suppression de la tâche





