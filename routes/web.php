<?php

use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\Arduino;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\OperacionController;
use App\Http\Controllers\UsuariosController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// RUTAS ADMINISTRACION
// vista principal
Route::get('/Administracion', [AdministracionController::class, 'index'])->middleware(['auth'])->name('index-administracion');
// vista personal
Route::get('/Administracion/Crear_personal', [AdministracionController::class, 'indexAP'])->middleware(['auth'])->name('index-administracionP');
// vista residente
Route::get('/Administracion/Crear_residente', [AdministracionController::class, 'indexAR'])->middleware(['auth'])->name('index-administracionR');
//CRUD servicio del personal
Route::post('/Administracion/Crear_personal/servicio', [AdministracionController::class, 'crearSP'])->middleware(['auth'])->name('craer-servicio');
Route::delete('/Administracion/Crear_personal/servicio{id}', [AdministracionController::class, 'eliminarSP'])->middleware(['auth'])->name('eliminar-servicio');
//crear personal
Route::post('/Administracion/Crear_personal/Creando', [AdministracionController::class, 'createP'])->name('crear-administracionP');
//CRUD tipo de residente
Route::post('/Administracion/Crear_residente/tipo', [AdministracionController::class, 'crearTR'])->middleware(['auth'])->name('craer-tipo');
Route::delete('/Administracion/Crear_residente/tipo{id}', [AdministracionController::class, 'eliminarTR'])->middleware(['auth'])->name('eliminar-tipo');
// crear residente
Route::post('/Administracion/Crear_residente/Creando', [AdministracionController::class, 'createR'])->middleware(['auth'])->name('crear-administracionR');

//RUTAS BUSQUEDA
// vista principal
Route::get('/Busqueda', [BusquedaController::class, 'index'])->name('index-busqueda');
// vista personal
Route::get('/Busqueda/Personal', [BusquedaController::class, 'indexP'])->middleware(['auth'])->name('index-busquedaP');
//  vista residnete
Route::get('/Busqueda/Residente', [BusquedaController::class, 'indexR'])->middleware(['auth'])->name('index-busquedaR');
//  vista visitante
Route::get('/Busqueda/Visitantes', [BusquedaController::class, 'indexV'])->middleware(['auth'])->name('index-busquedaV');
// vista coresidente
Route::get('/Busqueda/Residentes/Coresidente/{id}', [BusquedaController::class, 'indexCR'])->middleware(['auth'])->name('index-coresidente');
// editar personal
Route::put('/Administracion/Buscar_personal/Detallado/{id}', [BusquedaController::class, 'updateP'])->middleware(['auth'])->name('update-personal');
// eliminar personal
Route::delete('/Administracion/Buscar_personal/Eliminar/{id}', [BusquedaController::class, 'deleteP'])->middleware(['auth'])->name('eliminar-personal');
// editar residente
Route::put('/Administracion/Buscar_residente/Detallado/{id}', [BusquedaController::class, 'updateR'])->middleware(['auth'])->name('update-residente');
// eliminar residente
Route::delete('/Administracion/Buscar_residente/Eliminar/{id}', [BusquedaController::class, 'deleteR'])->middleware(['auth'])->name('eliminar-residente');
// crear coresidente
Route::post('/Busqueda/Residentes/Coresidente', [BusquedaController::class, 'createCR'])->middleware(['auth'])->name('crear-coresidente');
// eliminar coresidente
Route::delete('/Administracion/Buscar_residente/Coresidente/Eliminar/{id}', [BusquedaController::class, 'deleteCR'])->middleware(['auth'])->name('eliminar-coresidente');
//  editar visitantes
Route::put('/Administracion/Buscar_visitantes/Detallado/{id}', [BusquedaController::class, 'updateV'])->middleware(['auth'])->name('update-visitantes');


//RUTAS OPERACION
// vista principal
Route::get('/Operacion', [OperacionController::class, 'index'])->middleware(['auth'])->name('index-visitante');
// crear visitante
Route::post('/Operacion/Nueva_Visita', [OperacionController::class, 'createV'])->middleware(['auth'])->name('crear-visitante');
// cambair estatus de visita
Route::put('/Operacion/Actualizar_estatus/{id}', [OperacionController::class, 'estatus'])->middleware(['auth'])->name('estatusV');

// RUTAS CONFIGURACION 
Route::get('/Configuracion', [ConfiguracionController::class, 'index'])->middleware(['auth'])->name('index-configuracion');
Route::put('/Configuracion/Ip/{id}', [ConfiguracionController::class, 'update'])->middleware(['auth'])->name('modificar-cam');

//ARDUINO
Route::put('/Configuracion/Arduino', [Arduino::class, 'update'])->middleware(['auth'])->name('estatus-arduino');

//USUARIOS
Route::get('/Usuarios', [UsuariosController::class, 'index'])->name('index-usuarios');
Route::get('/Usuarios/Registrar', [RegisteredUserController::class, 'create'])->name('index-register');
Route::post('/Usuarios/Registrar/usuario', [RegisteredUserController::class, 'store'])->name('register');
Route::delete('/Usuarios/Registrar/usuario/Eliminar/{id}', [UsuariosController::class, 'deleteU'])->middleware(['auth'])->name('eliminar-usuario');
