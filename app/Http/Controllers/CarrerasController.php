<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;
use Session;

class CarrerasController extends Controller
{
    public function index()
    {
        $carreras = Carrera::orderBy('created_at', 'desc')->get();
        // dd(sizeof($carreras));
        return view('carreras.index', compact('carreras'));
    }
    public function create()
    {
        return view('carreras.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'nombre' => 'required',
            'departamento' => 'required',
            'division' => 'required',
            'cupo' => 'required',
        ));

        $carrera = new Carrera();
        $carrera->nombre = $request->nombre;
        $carrera->departamento = $request->departamento;
        $carrera->division = $request->division;
        $carrera->cupo = $request->cupo;

        if ($carrera->save()) {
            Session::flash('success', 'Carrera actualizada con exito.');
        }
        return redirect()->route('carreras.index');
    }

    public function show(Carrera $carreras)
    {
        // sin uso
    }

    public function edit(Carrera $carrera)
    {
        return view('carreras.edit', compact('carrera'));
    }

    public function update(Request $request, Carrera $carrera)
    {
        // dd($request);
        $this->validate($request, array(
            'nombre' => 'required',
            'departamento' => 'required',
            'division' => 'required',
            'cupo' => 'required',
        ));

        $carrera = Carrera::find($carrera->id);
        $carrera->nombre = $request->nombre;
        $carrera->departamento = $request->departamento;
        $carrera->division = $request->division;
        $carrera->cupo = $request->cupo;

        if ($carrera->save()) {
            Session::flash('success', 'Carrera actualizada con exito.');
        }
        return redirect()->route('carreras.index');
    }

    public function destroy($id)
    {
        $carrera = Carrera::find($id);
        if ($carrera->delete()) {
            Session::flash('success', 'Carrera eliminada con exito.');
        }
        return redirect()->route('carreras.index');
    }
}