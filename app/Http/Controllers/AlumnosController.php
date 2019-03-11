<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Carrera;
use Illuminate\Http\Request;
use Session;


class AlumnosController extends Controller
{
    public function index(Request $request)
    {   
        if(Session()->get('carrera_id') != null){
            if($request->carrera_id != null){
                if(Session()->get('carrera_id') != $request->carrera_id){
                    Session()->put('carrera_id', $request->carrera_id);
                    
    
                }
                $carrera_id = session()->get('carrera_id');
            }
            else{
                $carrera_id = session()->get('carrera_id');
            }
        }
        else {
            Session()->put('carrera_id', $request->carrera_id);
            $carrera_id = $request->carrera_id;
            // dd($carrera);
        }
        $carrera = Carrera::find($carrera_id);

        $alumnos = Alumno::where('carrera_id',$carrera_id)->orderBy('created_at', 'desc')->get();
        return view('alumnos.index', compact('alumnos','carrera'));
    }
    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $carrera_id = session()->get('carrera_id');
        // dd($carrera);
        // $carrera = Carrera::find($request->id);

        $this->validate($request, array(
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'email' => 'required',
        ));

        $alumno = new Alumno();
        $alumno->nombre = $request->nombre;
        $alumno->apellido_paterno = $request->apellido_paterno;
        $alumno->apellido_materno = $request->apellido_materno;
        $alumno->email = $request->email;
        $alumno->carrera_id = $carrera_id;

        if ($alumno->save()) {
            Session::flash('success', 'alumno actualizada con exito.');
        }
        // session()->put('carrera_id', $alumno->carrera_id);
        return redirect()->route('alumnos.index');
    }

    public function show(Alumno $alumnos)
    {
        // sin uso
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        // dd($alumno);
        $this->validate($request, array(
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'email' => 'required',
        ));

        $alumno = Alumno::find($alumno->id);
        $alumno->nombre = $request->nombre;
        $alumno->apellido_paterno = $request->apellido_paterno;
        $alumno->apellido_materno = $request->apellido_materno;
        $alumno->email = $request->email;

        if ($alumno->save()) {
            Session::flash('success', 'alumno actualizada con exito.');
        }
        return redirect()->route('alumnos.index');
    }

    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        if ($alumno->delete()) {
            Session::flash('success', 'alumno eliminada con exito.');
        }
        return redirect()->route('alumnos.index');
    }
}
