<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AulaController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PersonaController;

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
    //return view('welcome');
    return redirect("/admin");
});

// RUTA CON NOMBRE
/*Route::get("/admin", function () {
    return view('admin.index');
})->name("administracion")->middleware("auth");*/

// RUTAS CON PREFIJO
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get("/", function () {
        return view('admin.index');
    })->name("administracion");

    // ASIGNACION DE MATERIAS

    Route::get("asignacion_materias", [MateriaController::class, "asignacion_materias"])->name("asignacion_materias");

    Route::resource("carrera", CarreraController::class);
    Route::resource("aula", AulaController::class);
    Route::resource("periodo", PeriodoController::class);
    Route::resource("materia", MateriaController::class);
    Route::resource("persona", PersonaController::class);
    Route::resource("usuario", UsuarioController::class);
});




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');