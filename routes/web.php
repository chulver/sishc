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
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\TabController;

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

/**Ventas**/
Route::get('tabs',[TabController::class, 'index'])->name('tabs.index');
Route::get('tabs/tabla',[TabController::class, 'tabla'])->name('tabs.tabla');
Route::get('tabs/frm',[TabController::class, 'frm'])->name('tabs.frm');
/***********/

/**Ventas**/
Route::get('ventas',[VentaController::class, 'index'])->name('ventas.index');
Route::get('ventas/create',[VentaController::class, 'create'])->name('ventas.create');
Route::post('ventas',[VentaController::class, 'store'])->name('ventas.store');
Route::get('ventas/{consulta}/edit',[VentaController::class, 'edit'])->name('ventas.edit');
Route::put('ventas/{consulta}',[VentaController::class, 'update'])->name('ventas.update');
Route::get('ventas/{consulta}/show',[VentaController::class, 'show'])->name('ventas.show');
Route::get('ventas/fichas',[VentaController::class, 'fichas'])->name('ventas.fichas');
Route::delete('ventas/{consulta}',[VentaController::class, 'destroy'])->name('ventas.destroy');
Route::get('ventas/tabla',[VentaController::class, 'tabla'])->name('ventas.tabla');
Route::get('ventas/pacientes',[VentaController::class, 'pacientes'])->name('ventas.pacientes');
Route::get('ventas/servicios',[VentaController::class, 'servicios'])->name('ventas.servicios');
Route::get('ventas/medicos',[VentaController::class, 'medicos'])->name('ventas.medicos');
Route::get('ventas/turno',[VentaController::class, 'turno'])->name('ventas.turno');
/***********/

/**Services**/
Route::get('services',[ServiceController::class, 'index'])->name('services.index');
Route::get('services/tabla',[ServiceController::class, 'tabla'])->name('services.tabla');
Route::post('services',[ServiceController::class, 'store'])->name('services.store');
Route::get('services/{service}/edit',[ServiceController::class, 'edit'])->name('services.edit');
Route::put('services/{service}',[ServiceController::class, 'update'])->name('services.update');
Route::get('services/{service}/show',[ServiceController::class, 'show'])->name('services.show');
Route::delete('services/{service}',[ServiceController::class, 'destroy'])->name('services.destroy');
/***********/

/**Clientes**/
Route::get('clientes',[ClienteController::class, 'index'])->name('clientes.index');
Route::post('clientes',[ClienteController::class, 'store'])->name('clientes.store');
Route::get('clientes/{cliente}/edit',[ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/{cliente}',[ClienteController::class, 'update'])->name('clientes.update');
Route::get('clientes/{cliente}/show',[ClienteController::class, 'show'])->name('clientes.show');
Route::get('clientes/datatable',[ClienteController::class, 'datatable'])->name('clientes.datatable');
//Route::resource('clientes', ClienteController::class)->only(['index','create','store','edit','update','show'])->names('clientes');
/***********/

/**Datable**/
Route::get('datatable/pacientes', [DatatableController::class, 'paciente'])->name('datatable.paciente');
Route::get('datatable/historias', [DatatableController::class, 'historias'])->name('datatable.historias');
/***********/

/**Inyectables**/
Route::get('inyectables',[InyectableController::class, 'index'])->name('inyectables.index');
Route::get('inyectables/historial',[InyectableController::class, 'historial'])->name('inyectables.historial');
Route::get('inyectables/{paciente}/registrar',[InyectableController::class, 'registrar'])->name('inyectables.registrar');
Route::post('inyectables',[InyectableController::class, 'store'])->name('inyectables.store');
Route::get('inyectables/{inyectable}/show',[InyectableController::class, 'show'])->name('inyectables.show');
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
