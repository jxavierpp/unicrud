@extends('layouts.main')

@section('content')
    <br>
    <div class="card">
        <div class="card-header title">
            <h4><strong>Crear Alumno</strong></h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    {!! Form::open(['route'=>['alumnos.store'], 'method'=>'POST']) !!}
                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        {!! Form::label('nombre', 'Nombre') !!}
                        {!! Form::text('nombre', null, ['class'=>'form-control input-lg', 'placeholder'=>'Introduce el nombre de la alumno', 'value'=>old('nombre')]) !!}

                        @if ($errors->has('nombre'))
                            <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
                        {!! Form::label('apellido_paterno', 'Apellido Paterno') !!}
                        {!! Form::text('apellido_paterno', null, ['class'=>'form-control input-lg', 'placeholder'=>'Introduce el apellido paterno', 'value'=>old('departamento')]) !!}
                    
                        @if ($errors->has('apellido_paterno'))
                            <span class="help-block">
                            <strong>{{ $errors->first('apellido_paterno') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
                        {!! Form::label('apellido_materno', 'Apellido Materno') !!}
                        {!! Form::text('apellido_materno', null, ['class'=>'form-control input-lg', 'placeholder'=>'Introduce el apellido materno', 'value'=>old('division')]) !!}
                        
                        @if ($errors->has('apellido_materno'))
                            <span class="help-block">
                            <strong>{{ $errors->first('apellido_materno') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', null, ['class'=>'form-control input-lg', 'placeholder'=>'Introduce el email', 'value'=>old('cupo')]) !!}

                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="text-right">
                        {!! Form::submit('Guardar', ['class'=>'btn btn-warning btn-block btn-lg']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
