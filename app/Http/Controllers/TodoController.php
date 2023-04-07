<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;



class TodoController extends Controller
{
    //
    public function index($sort='desc', $tri='') {
        //Todo::factory()->count(10)->create();
    
        
        //Autre méthode, équivalence de 'if (si, sinon)
        //$order = ($sort == 'desc')?'desc':'asc' ;
        //$todos = Todo::orderBy('created_at' ,$order)->paginate(10) ;  

        //Tâche trier dans l'ordre entre réaliser et non réalisés (filtrage)
        switch ($tri) {
            case 'active':
            $todos = Todo::where('status' , 'n') ;
            break;
    
            case 'inactive' :
            $todos = Todo::where('status' , 'o') ;  
            break ;

            default:
            $todos = Todo::where('status' , 'n')->orWhere('status' ,'o') ;
            break;
        }
        if($sort == 'desc') {
            $todos = $todos->orderBy('created_at' ,'desc')->paginate(10) ;  

        } else {

            $todos = $todos->orderBy('created_at' ,'asc')->paginate(10) ;   
        }

        //$todos = Todo::where('status' , 'n')->orderBy('created_at' ,'asc')->paginate(10) ;
                    

        return view ('accueil' , compact('todos')) ;

    }
    //methode pour enregistrer ou ajouter mes donnees en base
    public function create(request $request):RedirectResponse {
    
    //Contrôler les éléments ajouter dans un formulaire    
    $request->validate([
    'task'=>'required|min:15'
]);

        $todo = new Todo ;
        $todo->task = $request->task ;
        $todo->status = 'n' ;
        $todo->save();

        return redirect('/');


}

//méthode pour valider une tache à partir de on id
public function update ($id){

        $todo = Todo::find($id) ; //rechercche de la tache a modifier
        $todo->status = 'o' ;//affectation de la modification
        $todo->save() ;//enregistrement de la modification

        return redirect ('/') ;//redirection
}

public function delete($id) {

        $todo = Todo::find($id) ;//recherche de la tache a effacer
        $todo->delete() ;//supression de la tache

    return redirect ('/') ;//redirection

}
}
