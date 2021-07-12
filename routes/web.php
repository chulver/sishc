<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultamedicaController;
use App\Http\Controllers\SignosvitalesController;
use App\Http\Controllers\HistoriaclinicaController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\InyectableController;

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

Route::get('/home', function () {
    return view('home.index');
})->middleware('auth');

/**Datable**/
Route::get('datatable/pacientes', [DatatableController::class, 'paciente'])->name('datatable.paciente');
Route::get('datatable/historias', [DatatableController::class, 'historias'])->name('datatable.historias');
/***********/

/**Inyectables**/
Route::get('inyectables',[InyectableController::class, 'index'])->name('inyectables.index');
Route::get('inyectables/registrar',[InyectableController::class, 'registrar'])->name('inyectables.registrar');
/***********/

/**Roles**/
Route::resource('servicios', ServicioController::class)->names('servicios');
/***********/

/**Roles**/
Route::resource('roles', RoleController::class)->names('roles');
/***********/

/**User**/
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');
/***********/

/**PDF**/
Route::get('pdf/{consulta}',[PDFController::class, 'PDFHistoriaclinica'])->name('generarPDF');
/***********/

/**Pacientes**/
Route::resource('pacientes', PacienteController::class)->only(['index','create','store','edit','update','show'])->names('pacientes');
/***********/

/**Ventas**/
Route::get('consultas',[ConsultamedicaController::class, 'index'])->name('consultas.index');
Route::get('consultas/create',[ConsultamedicaController::class, 'create'])->name('consultas.create');
Route::post('consultas',[ConsultamedicaController::class, 'store'])->name('consultas.store');
Route::get('consultas/{consulta}/edit',[ConsultamedicaController::class, 'edit'])->name('consultas.edit');
Route::put('consultas/{consulta}',[ConsultamedicaController::class, 'update'])->name('consultas.update');
Route::get('consultas/{consulta}/show',[ConsultamedicaController::class, 'show'])->name('consultas.show');
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
Route::get('historiaclinica/{historia}/edit',[HistoriaclinicaController::class, 'edit'])->name('historiaclinica.edit');
Route::put('historiaclinica/{completada}',[HistoriaclinicaController::class, 'update'])->name('historiaclinica.update');
Route::get('historiaclinica/completadas',[HistoriaclinicaController::class, 'completadas'])->name('historiaclinica.completadas');
Route::get('historiaclinica/{codigo}/historiasclinicas',[HistoriaclinicaController::class, 'historiasclinicas'])->name('historiaclinica.historiasclinicas');
//Route::get('pdf/{consulta}',[HistoriaclinicaController::class, 'PDFHistoriaclinica'])->name('generarPDF');
/***********/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');
