<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

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
}
