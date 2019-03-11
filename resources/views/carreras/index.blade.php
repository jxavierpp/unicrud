@extends('layouts.main')

@section('content')
    <br>
    <div class="card">
        <div class="card-header">
            <h4 style="position:absolute"><strong>Lista de Carreras</strong></h4>
            <a href="{{ URL::to('carreras/create') }}">
                <button type="button" class="btn btn-sm btn-primary pull-right">Añadir Carrera</button>
            </a>
        </div>
        <div class="card-body">
            @if(count($carreras))
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Departamento</th>
                        <th>Division</th>
                        <th>Cupo</th>
                        <th>Inscritos</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carreras as $carrera)
                        <tr>
                            <td>{{ $carrera->id }}</td>
                            <td>{{ $carrera->nombre }}</td>
                            <td>{{ $carrera->departamento }}</td>
                            <td>{{ $carrera->division }}</td>
                            <td>{{ $carrera->cupo }}</td>
                            <td>{{ $carrera->alumnos()->count() }}</td>
                            <td>
                                <div style="float: right">
                                    {!! Form::open(['route'=>['carreras.destroy', $carrera->id], 'method'=>'DELETE']) !!}
                                    <button name="submit" type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                    {!! Form::close() !!}
                                </div>
                                <a href="{{ route("carreras.edit", $carrera->id) }}" class="btn btn-sm btn-info pull-right" style="margin-right: 5px">Editar</span></a>
                                <a href="{{ route("alumnos.index",['carrera_id' => $carrera->id]) }}" class="btn btn-sm btn-info pull-right" style="margin-right: 5px">Alumnos</span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="alert alert-warning text-center">No hay carreras aun.</p>
            @endif
        </div>
    </div>
@endsection