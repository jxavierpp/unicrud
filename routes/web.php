<?php

Route::get('/', "CarrerasController@index")->name('home');


Route::resource('carreras', 'CarrerasController');

Route::resource('alumnos', 'AlumnosController');
