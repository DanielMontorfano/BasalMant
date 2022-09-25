<?php


//namespace App\Http\Controllers;

use App\Http\Controllers\ContactanosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\EquipoRepuestoController;
use App\Http\Controllers\SearchRepuestosController;
use App\Http\Controllers\ImagenController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\DocumentoController;

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

Route::get('/', InicioController::class)->name('home');

Route::view('nosotros','nosotros')->name('nosotros');
Route::view('contactanos','contactanos')->name('contactanos');

Route::resource('equipos', EquipoController::class);
//Route::get('equipos/{equipo}/showphoto', [EquipoController::class, 'showphoto'])->name('equipos.showphoto');

Route::delete('/equipos/{equipo}/borrar', [EquipoController::class, 'destroy'])->name('equipos.destroy');
Route::resource('equipoRepuesto', EquipoRepuestoController::class);
Route::get('search/repuestos', [SearchRepuestosController::class,'repuestos'])->name('search.repuestos');
//************************************************************************** */
Route::resource('fotos', FotoController::class);
Route::get('fotos/{equipo}', [EquipoController::class, 'show'])->name('fotos.show');

//**************************************************************************** */
Route::resource('documentos', DocumentoController::class);
Route::get('documentos/{equipo}', [EquipoController::class, 'show'])->name('documentos.show');


//**************************************************************************** */

Route::resource('ordentrabajo', OrdenTrabajoController::class);
Route::get('ordentrabajo/createorden/{equipo}', [OrdenTrabajoController::class, 'createorden'])->name('ordentrabajo.createorden');

Route::get('ordentrabajo/show/{ordendetrabajo}', [OrdenTrabajoController::class, 'show'])->name('ordentrabajo.show');

Route::get('ordentrabajo/list/{equipo}', [OrdenTrabajoController::class, 'list'])->name('ordentrabajo.list');







//route::post('imagen/store', [ImagenController::class,'store'])->name('imagen.store');


//Route::get('/', function () {
  //  return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
