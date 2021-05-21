<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultamedicaController;
use App\Http\Controllers\SignosvitalesController;
use App\Http\Controllers\HistoriaclinicaController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;


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
    return view('auth.login');
    //return view('welcome');
});

/**Paciente**/
Route::resource('roles', RoleController::class)->names('roles');
/***********/

/**Paciente**/
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');
/***********/

/**Paciente**/
Route::get('pdf/{consulta}',[PDFController::class, 'PDFHistoriaclinica'])->name('generarPDF');
/***********/

/**Ventas**/
Route::get('consultas',[ConsultamedicaController::class, 'index'])->name('consultas.index');
Route::get('consultas/create',[ConsultamedicaController::class, 'create'])->name('consultas.create');
Route::post('consultas',[ConsultamedicaController::class, 'store'])->name('consultas.store');
Route::get('consultas/{consulta}/edit',[ConsultamedicaController::class, 'edit'])->name('consultas.edit');
Route::put('consultas/{consulta}',[ConsultamedicaController::class, 'update'])->name('consultas.update');
Route::get('consultas/fichas',[ConsultamedicaController::class, 'fichas'])->name('consultas.fichas');
Route::delete('consultas/{consulta}',[ConsultamedicaController::class, 'destroy'])->name('consultas.destroy');
/***********/

/**Signos vitales**/
Route::get('signosvitales',[SignosvitalesController::class, 'index'])->name('signosvitales.index');
Route::get('signosvitales/{consulta}/create',[SignosvitalesController::class, 'create'])->name('signosvitales.create');
Route::post('signosvitales',[SignosvitalesController::class, 'store'])->name('signosvitales.store');
Route::get('signosvitales/completadas',[SignosvitalesController::class, 'completadas'])->name('signosvitales.completadas');
Route::get('signosvitales/{signosvitales}/edit',[SignosvitalesController::class, 'edit'])->name('signosvitales.edit');
Route::put('signosvitales/{signosvitales}',[SignosvitalesController::class, 'update'])->name('signosvitales.update');
Route::get('signosvitales/{signosvitales}/show',[SignosvitalesController::class, 'show'])->name('signosvitales.show');
/***********/

/**Historia clinica**/
Route::get('historiaclinica',[HistoriaclinicaController::class, 'index'])->name('historiaclinica.index');
Route::get('historiaclinica/{consulta}/create',[HistoriaclinicaController::class, 'create'])->name('historiaclinica.create');
Route::post('historiaclinica',[HistoriaclinicaController::class, 'store'])->name('historiaclinica.store');
Route::get('historiaclinica/completadas',[HistoriaclinicaController::class, 'completadas'])->name('historiaclinica.completadas');
Route::get('historiaclinica/{historia}/edit',[HistoriaclinicaController::class, 'edit'])->name('historiaclinica.edit');
Route::put('historiaclinica/{completada}',[HistoriaclinicaController::class, 'update'])->name('historiaclinica.update');
//Route::get('pdf/{consulta}',[HistoriaclinicaController::class, 'PDFHistoriaclinica'])->name('generarPDF');
/***********/

/**Paciente**/
Route::get('pacientes',[PacienteController::class, 'index'])->name('pacientes.index');
Route::get('pacientes/create',[PacienteController::class, 'create'])->name('pacientes.create');
Route::post('pacientes',[PacienteController::class, 'store'])->name('pacientes.store');
Route::get('pacientes/{paciente}/show',[PacienteController::class, 'show'])->name('pacientes.show');
Route::get('pacientes/{paciente}/edit',[PacienteController::class, 'edit'])->name('pacientes.edit');
Route::put('pacientes/{paciente}',[PacienteController::class, 'update'])->name('pacientes.update');
/***********/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');
