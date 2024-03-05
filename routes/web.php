<?php


//namespace App\Http\Controllers;

use App\Http\Controllers\ContactanosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\EquipoRepuestoController; 
use App\Http\Controllers\EquipoplanController; 
use App\Http\Controllers\EquipoEquipoController;
use App\Http\Controllers\SearchRepuestosController;
use App\Http\Controllers\ImagenController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\RepuestoController;

use App\Http\Controllers\ProtocoloController; 
use App\Http\Controllers\PrototareaController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanprotoController;
use App\Http\Controllers\SearchTareasController;
use App\Http\Controllers\SearchProtocolosController; 
use App\Http\Controllers\SearchPlansController; 
use App\Http\Controllers\EquipoplansejecutController; //LO agrgue para ver servicios
use App\Http\Controllers\SearchLubricController; 
use App\Http\Controllers\SearchEquipoController;
use App\Http\Controllers\TareashController;
use App\Http\Controllers\imprimirController;
use App\Http\Controllers\HistorialController;

use App\Http\Controllers\LubricacionController;
use App\Http\Controllers\EquipoLubricacionController;

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

//Route::get('/', InicioController::class)->name('welcome');



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),  'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::view('home','home')->name('home');
 //*********************Desde Aqui ************************************************ */ 
 //Route::view('nosotros','nosotros')->name('nosotros');
 Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');
 Route::view('contactanos','contactanos')->name('contactanos');
 
 Route::resource('equipos', EquipoController::class);
 Route::get('equipos/{equipo}/clonar', [EquipoController::class, 'clonar'])->name('equipos.clonar');
 Route::get('equipos/{equipo}/equipoTareasShow', [EquipoController::class, 'equipoTareasShow'])->name('equipos.showtareas');

 Route::resource('equipoTareash', TareashController::class);
 Route::get('menu_seguimientos/', [EquipoplansejecutController::class,'index'])->name('menu_seguimientos.index');
 Route::get('seguimientos/pendientes/', [EquipoplansejecutController::class,'pendientes'])->name('seguimientos.pendientes');
 Route::get('seguimientos/sinPlan/', [EquipoplansejecutController::class,'sinPlan'])->name('seguimientos.sinPlan');
 



 Route::delete('/equipos/{equipo}/borrar', [EquipoController::class, 'destroy'])->name('equipos.destroy');
 Route::resource('equipoRepuesto', EquipoRepuestoController::class);
 Route::get('search/repuestos', [SearchRepuestosController::class,'repuestos'])->name('search.repuestos');
 Route::resource('equipoPlan', EquipoplanController::class);
 Route::resource('equipoEquipo', EquipoEquipoController::class);
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
 Route::get('ordentrabajo/showCerrar/{ordendetrabajo}', [OrdenTrabajoController::class, 'showCerrar'])->name('ordentrabajo.showCerrar');
 Route::get('ordentrabajo/list/{equipo}', [OrdenTrabajoController::class, 'list'])->name('ordentrabajo.list');
 
 //**************************************************************************** */
 Route::resource('tareas', TareaController::class);
 Route::get('/tareas/{tareas}/borrar', [TareaController::class, 'destroy'])->name('tareas.destroy');
 //Route::get('tarea/{tarea}/edit', [TareaController::class, 'edit'])->name('tarea.edit');
 //**************************************************************************** */
/**************************************************************************** */
Route::resource('repuestos', RepuestoController::class); 
Route::get('/catchId', [RepuestoController::class, 'catchId'])->name('repuestos.catchId');

//Route::get('/tareas/{tareas}/borrar', [TareaController::class, 'destroy'])->name('tareas.destroy');
//Route::get('tarea/{tarea}/edit', [TareaController::class, 'edit'])->name('tarea.edit');
//**************************************************************************** */




 Route::get('/historialTodos/{equipo}', [HistorialController::class,'historialTodos'])->name('historialTodos');
 Route::get('/historialPreventivo/{equipo}', [HistorialController::class,'historialPreventivo'])->name('historialPreventivo');
 Route::get('/historialCorrectivo/{equipo}', [HistorialController::class,'historialCorrectivo'])->name('historialCorrectivo');
 Route::get('/historialPreventivoEjecut/{equipo}', [HistorialController::class,'historialPreventivoEjecut'])->name('historialPreventivoEjecut');
 Route::post('/equipoplansejecut/{equipo}/editarPendiente', [HistorialController::class,'edit'])->name('equipoplansejecut.edit');
 Route::put('/equipoplansejecut/{equipo}/updatePendiente', [HistorialController::class,'update'])->name('equipoplansejecut.update');
 Route::get('/formularioShow/{formulario}/Show', [HistorialController::class, 'formularioShow'])->name('formularioShow');
 
 //**************************************************************************** */
 Route::resource('protocolos', ProtocoloController::class);
 Route::resource('prototarea', PrototareaController::class);
 
 //**************************************************************************** */
 Route::resource('plans', PlanController::class);
 Route::resource('planproto', PlanprotoController::class);
 Route::get('plans/{plans}/copiar', [PlanController::class, 'copiar'])->name('plans.copiar');

 //**************************************************************************** */
 
 
 
 Route::get('search/tareas', [SearchTareasController::class,'tareas'])->name('search.tareas'); //esta ruta permite hacer las busqudas asicrónicas AJAX
 Route::get('search/protocolos', [SearchProtocolosController::class,'protocolos'])->name('search.protocolos'); //esta ruta permite hacer las busqudas asicrónicas AJAX
 Route::get('search/plans', [SearchPlansController::class,'plans'])->name('search.plans'); //NO Olvidar poner use!!!! esta ruta permite hacer las busqudas asicrónicas AJAX
 //Route::get('search/lubricaciones', [SearchLubricController::class,'lubricaciones'])->name('search.lubricaciones');
 Route::get('search/lubricaciones', [SearchLubricController::class, 'lubricaciones'])->name('search.lubricaciones');

 Route::get('search/equipos', [SearchEquipoController::class,'equipos'])->name('search.equipos'); //NO Olvidar poner use!!!! esta ruta permite hacer las busqudas asicrónicas AJAX
 
 
 //****************************LUBRICACIONES*********************** */
 Route::resource('lubricacion', LubricacionController::class);
 



 Route::resource('equipoLubricacion', EquipoLubricacionController::class);
 Route::get('cargaDiaria', [EquipoLubricacionController::class,'cargaDiaria'])->name('cargaDiaria');
 Route::get('codigoAequipo/{codigo}', [EquipoLubricacionController::class,'codigoAequipo'])->name('codigoAequipo');
 

 
 
 
 
 //****************************IMPRIMIR*********************** */
 Route::get('/imprimir', [imprimirController::class,'imprimir'])->name('imprimir');
 Route::get('/imprimirEquipo/{equipo}', [imprimirController::class,'imprimirEquipo'])->name('imprimirEquipo');
 Route::get('/imprimirOrden/{orden}', [imprimirController::class,'imprimirOrden'])->name('imprimirOrden');
 Route::get('/imprimirPlan/{plan}', [imprimirController::class,'imprimirPlan'])->name('imprimirPlan');
 Route::get('/imprimirListado/{titulo}', [imprimirController::class,'imprimirListado'])->name('imprimirListado');
 Route::get('/imprimirFormulario/{titulo}', [imprimirController::class,'imprimirListado'])->name('imprimirListado');
 Route::get('/imprimirFormulario/{formulario}/Imprimir', [imprimirController::class, 'imprimirFormulario'])->name('imprimirFormulario');
 Route::get('/imprimirLubric/{codigo}', [imprimirController::class,'imprimirLubric'])->name('imprimirLubric');
 //route::post('imagen/store', [ImagenController::class,'store'])->name('imagen.store');
 
 

 //*********************Hasta Aqui ************************************************ */
 

});
