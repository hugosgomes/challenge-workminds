<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('estado.index');
});

Route::resource('estado', 'EstadosController');
Route::resource('estado.cidade', 'CidadesController');
