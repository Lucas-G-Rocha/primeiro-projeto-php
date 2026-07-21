<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Aula;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function createProfessor(Request $request)
    {
        $professor = new Professor;

        $professor->name = $request->name;
        $professor->email = $request->email;
        $professor->age = $request->age;
        $professor->dicipline = $request->dicipline;
        $professor->classes = $request->classes;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $requestImage->move(public_path('image/professors'), $imageName);
            $professor->image = $imageName;
        }

        $professor->save();
        return redirect('/')->with('msg', 'Professor Cadastrado com sucesso!');
    }
    public function formProfessor()
    {

        return view('events.create');
    }

    public function getProfessors(Request $request)
    {
        if ($request->search) {
            $professorsData = Professor::where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $professorsData = Professor::all();
        }



        return view('welcome', ['professors' => $professorsData, 'search' => $request->search]);
    }

    public function showProfessor($id)
    {

        $professor = Professor::findOrFail($id);

        return view('events.show', ['professor' => $professor]);
    }

    // Aulas
    public function showAula()
    {
        $professors = Professor::all(['name', 'id', 'dicipline']);
        return view('aulas.showAula', compact('professors'));
    }

    public function createAula(Request $request)
    {

        $aula = new Aula();
        $aula->name = $request->name;
        $aula->professor_id = $request->professor_id;

        $isSuccess = $aula->save();

        if ($isSuccess) {
            return redirect('/')->with('msg', 'Aula criada com sucesso!');
        } else {
            return back()->withErrors([
                'saveAula' => 'Erro ao cadastrar aula'
            ])->withInput();
        }
    }

    public function getAulas()
    {
        $aulas = Aula::all();

        return view('aulas.getAulas', compact('aulas'));
    }

    public function deleteAula($id){
        $aula = Aula::findOrFail($id)->delete();

        if(!$aula){
            return back()->withErrors([
                'failDelete' => 'Ocorreu um erro ao deletar aula'
            ]);
        }else{
            return back()->with('msg','Aula deletada');
        }
    }

    public function editAula($id){

    }

    public function editarAula(Request $request){

    }
}
