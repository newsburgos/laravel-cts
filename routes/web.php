<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ejemplo regresando texto
Route::get('/texto', function () {
    return '<h1>esto es un texto de prueba</h1>';
});

//ejemplo2 array
Route::get('/arreglo', function () {
    $arreglo = [
        'id' => '1',
        'Descripcion' => 'Producto 1'
    ];
    return $arreglo;
});

//ejemplo3 parametros
Route::get('/nombre/{nombre}', function ($nombre) {
    return '<h1>El nombre es: ' . $nombre . '</h1>';
});

//ejemplo4 parametros por default
Route::get('/cliente/{cliente?}', function ($cliente = 'Cliente general') {
    return '<h1>El Cliente es: ' . $cliente . '</h1>';
});


//ejemplo5 
Route::get('/ruta1', function () {
    return '<h1>esto es un la vista de la ruta 1</h1>';
})->name('rutaNro1');

Route::get('/ruta2', function () {
    //return '<h1>esto es un la vista de la ruta 2</h1>';
    return redirect()->route('rutaNro1');
});

//ejemplo6

Route::get('/usuario/{usuario}', function ($usuario) {
    return '<h1>El usuario es: ' . $usuario . '</h1>';
})->where('usuario', '[A-Za-z]+');






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
