@extends('layouts.main')

@section('content')
    <br>
    <div class="card">
        <div class="card-header">
            <h4 style="position:absolute"><strong>Lista de Alumnos de {{ $carrera->nombre }}</strong></h4>
            <a href="{{ URL::to('alumnos/create') }}">
                <button type="button" class="btn btn-sm btn-primary pull-right">Añadir Alumno</button>
            </a>
        </div>
        <div class="card-body">
            @if(count($alumnos))
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Email</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnos as $alumno)
                            <tr>
                                <td>{{ $alumno->id }}</td>
                                <td>{{ $alumno->nombre }}</td>
                                <td>{{ $alumno->apellido_paterno }}</td>
                                <td>{{ $alumno->apellido_materno }}</td>
                                <td>{{ $alumno->email }}</td>
                                <td>
                                    <div style="float: right">
                                        {!! Form::open(['route'=>['alumnos.destroy', $alumno->id], 'method'=>'DELETE']) !!}
                                        <button name="submit" type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                        {!! Form::close() !!}
                                    </div>
                                    <a href="{{ route("alumnos.edit", $alumno->id) }}" class="btn btn-sm btn-info pull-right" style="margin-right: 5px">Editar</span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="alert alert-warning text-center">No hay alumnos.</p>
            @endif
        </div>
    </div>
@endsection