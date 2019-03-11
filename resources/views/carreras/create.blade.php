@extends('layouts.main')

@section('content')
    <br>
    <div class="card">
        <div class="card-header title">
            <h4><strong>Crear Carrera</strong></h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['route'=>['carreras.store'], 'method'=>'POST']) !!}
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null, ['class'=>'form-control input-lg', 'placeholder'=>'Introduce el nombre de la carrera', 'value'=>old('nombre')]) !!}

                            @if ($errors->has('nombre'))
                                <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('departamento') ? ' has-error' : '' }}">
                            {!! Form::label('departamento', 'Departamento') !!}
                            {!! Form::text('departamento', null, ['class'=>'form-control input-lg', 'placeholder'=>'Introduce el nombre del departamento', 'value'=>old('departamento')]) !!}
                        
                            @if ($errors->has('departamento'))
                                <span class="help-block">
                                <strong>{{ $errors->first('departamento') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('division') ? ' has-error' : '' }}">
                            {!! Form::label('divison', 'Divison') !!}
                            {!! Form::text('division', null, ['class'=>'form-control input-lg', 'placeholder'=>'Introduce el nombre de la division', 'value'=>old('division')]) !!}
                            
                            @if ($errors->has('division'))
                                <span class="help-block">
                                <strong>{{ $errors->first('division') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('cupo') ? ' has-error' : '' }}">
                            {!! Form::label('cupo', 'Cupo') !!}
                            {!! Form::number('cupo', null, ['class'=>'form-control input-lg', 'placeholder'=>'Introduce el numero de cupo maximo', 'value'=>old('cupo')]) !!}

                            @if ($errors->has('cupo'))
                                <span class="help-block">
                                <strong>{{ $errors->first('cupo') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="text-right">
                            {!! Form::submit('Guardar', ['class'=>'btn btn-warning btn-block btn-md']) !!}
                            
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
