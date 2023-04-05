<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TodoController extends Controller
{
    //
    public function index() {
        $todos = todo::all() ;
        return view ('accueil' , compact('todos')) ;

    }
    //methode pour enregistrer ou ajouter mes donnees en base
    public function store(request $request):RedirectResponse {
        
        $todo = new Todo ;
        $todo->task = $request->task ;
        $todo->status = 'n' ;
        $todo->save();

        return redirect('/');

}

//méthode pour valider une tache à partir de on id
public function update (){
    
}

public function delete() {

    dd('ici') ;
}
}
