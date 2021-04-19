<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;

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
