<?php
use App\Discount;
use Livewire\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\OtroController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ChairController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\BanquetController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PortadaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AlimentosController;
use App\Http\Controllers\AnimacionController;
use App\Http\Controllers\inventoryController;
use App\Http\Controllers\BaseFloralController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\DecoracionController;
use App\Http\Controllers\floralbaseController;
use App\Http\Controllers\InterestedController;
use App\Http\Controllers\ManteleriaController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\EventoServicioController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\tableclothbaseController;
use App\Http\Controllers\CotizacionServicioController;

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

Route::get('/', [PortadaController::class,'index'])->name('portada.index');

Route::post('/info',[InterestedController::class,'store'])->name('interested.store');
Route::get('/reload-captcha', [InterestedController::class, 'reloadCaptcha'])->name('reloadCaptcha');

Auth::routes(['register'=>false]);

/**Calendario */
Route::get('/home', [HomeController::class,'index'])->middleware('can:home.index')->name('home.index');
//metodo de almacenamiento
Route::post('/home', [HomeController::class,'store'])->name('home.store');

/**Eventos */
/**Para ver el contrato */
/* Route::get('/eventos/contrato', function () {
    return view('/eventos/contrato');
}); */

Route::get('/eventos', [EventoController::class,'index'])->middleware('can:eventos.index')->name('eventos.index');
Route::post('/eventos', [EventoController::class,'store'])->middleware('can:eventos.store')->name('eventos.store');
Route::get('/eventos/create',[EventoController::class,'create'])->middleware('can:eventos.create')->name('eventos.create');
/* Route::post('/eventos/confirm','EventoController@confirm')->middleware('can:eventos.confirm')->name('eventos.confirm'); */
Route::get('/eventos/list',[EventoController::class,'list'])->middleware('can:eventos.list')    ->name('eventos.list');
Route::get('/eventos/{evento}/contrato',[EventoController::class,'contrato'])->middleware('can:eventos.contrato')->name('eventos.contrato');
Route::get('/eventos/{evento}/edit', [EventoController::class,'edit'])->middleware('can:eventos.edit')->name('eventos.edit');
Route::delete('/eventos/{evento}', [EventoController::class,'destroy'])->middleware('can:eventos.destroy')->name('eventos.destroy');
Route::get('/eventos/{evento}/pago',[EventoController::class,'pago'])->middleware('can:eventos.pago')->name('eventos.pago');
Route::get('/eventos/{evento}', [EventoController::class,'show'])->middleware('can:eventos.show')->name('eventos.show');
Route::put('/eventos/{evento}', [EventoController::class, 'layout'])->name('eventos.layout');

/* Clientes */
Route::get('/clientes',[ClienteController::class,'index'])->middleware('can:clientes.index')->name('clientes.index');
Route::get('/clientes/create',[ClienteController::class,'create'])->middleware('can:clientes.create')->name('clientes.create');
Route::post('/clientes', [ClienteController::class,'store'])->middleware('can:clientes.store')->name('clientes.store');
Route::get('/clientes/{cliente}/edit', [ClienteController::class,'edit'])->middleware('can:clientes.edit')->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClienteController::class,'update'])->middleware('can:clientes.update')->name('clientes.update');
Route::delete('clientes/{cliente}', [ClienteController::class,'destroy'])->middleware('can:clientes.destroy')->name('clientes.destroy');
/* Clientes Resource */
 /*Route::resource('/clientes', ClienteController::class)->except(['index', 'create', 'edit'])->names('clientes');
 *//**Usuarios */
Route::get('/usuarios', [UsuarioController::class,'index'])->middleware('can:usuarios.index')->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class,'create'])->middleware('can:usuarios.create')->name('usuarios.create');
Route::post('/usuarios',[UsuarioController::class,'store'])->middleware('can:usuarios.store')->name('usuarios.store');
Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->middleware('can:usuarios.edit')->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->middleware('can:usuarios.update')->name('usuarios.update');

/**Perfil */
Route::get('/perfils', [PerfilController::class,'index'])->middleware('can:perfils.index')->name('perfils.index');
Route::get('/perfils/edit/{perfil}',[PerfilController::class,'edit'])->middleware('can:perfils.edit')->name('perfils.edit');
Route::put('/perfils/{perfil}', [PerfilController::class,'update'])->middleware('can:perfils.update')->name('perfils.update');

/**Cotización */
Route::get('/cotizacion', [CotizacionController::class,'index'])->middleware('can:cotizacion.index')->name('cotizacion.index');
Route::get('/cotizacion/create', [CotizacionController::class,'create'])->middleware('can:cotizacion.create')->name('cotizacion.create');
Route::post('/cotizacion',[CotizacionController::class, 'store'])->middleware('can:cotizacion.store')->name('cotizacion.store');
Route::get('/cotizacion/{cotizacion}',[CotizacionController::class, 'show'])->middleware('can:cotizacion.show')->name('cotizacion.show');
Route::get('/cotizacion/{cotizacion}/trabajo',[CotizacionController::class,'cotizacion'])->middleware('can:cotizacion.trabajo')->name('cotizacion.trabajo');
Route::delete('/cotizacion/{cotizacion}',[CotizacionController::class,'destroy'])->middleware('can:cotizacion.destroy')->name('cotizacion.destroy');
/**Probamos la cotizacion */
Route::get('/cotizacion/cotizacion/{cotizacion}', [CotizacionController::class, 'cotizacion'])->name('cotizacion.cotizacion');

/* Cotización servicios */
/* Route::resource('cotizacionservicio',CotizacionServicioController::class)->names('cotizacionservicio');*/
 Route::delete('/cotizacionservicio/{servicio}/{cotizacion}',[CotizacionServicioController::class,'destroy'])->middleware('can:cotizacionservicio.destroy')->name('cotizacionservicio.destroy');
Route::get('/cotizacionservicio/{cotizacion}/create',[CotizacionServicioController::class,'create'])->middleware('can:cotizacionservicio.create')->name('cotizacionservicio.create');
Route::post('/cotizacionservicio',[CotizacionServicioController::class,'store'])->middleware('can:cotizacionservicio.store')->name('cotizacionservicio.store');

/**Pagos */
Route::get('/pagos',[PagoController::class,'index'])->middleware('can:pagos.index')->name('pagos.index');
Route::post('/pagos',[PagoController::class,'store'])->middleware('can:pagos.store')->name('pagos.store');

/**Cuentas */
Route::get('/cuentas', [CuentaController::class,'index'])->middleware('can:cuentas.index')->name('cuentas.index');
Route::post('/cuentas',[CuentaController::class,'store'])->middleware('can:cuentas.store')->name('cuentas.store');

/**Manteleria */
Route::get('/manteleria/{evento}',[ManteleriaController::class,'create'])->middleware('can:manteleria.create')->name('manteleria.create');
Route::post('/manteleria',[ManteleriaController::class,'store'])->middleware('can:manteleria.store')->name('manteleria.store');

/* Base floral */
route::get('/basefloral/{evento}',[BaseFloralController::class,'create'])->name('basefloral.create');

/**Servicios */
Route::get('/servicios',[ServicioController::class,'index'])->middleware('can:servicios.index')->name('servicios.index');
Route::get('/servicios/create',[ServicioController::class, 'create'])->middleware('can:servicios.create')->name('servicios.create');
/* Route::get('/servicios/alimentos/create',[ServicioController::class,'create'])->middleware('can:alimentos.create')->name('alimentos.create');
Route::get('/servicios/decoracion/create',[ServicioController::class,'create'])->middleware('can:decoracion.create')->name('decoracion.create');
Route::get('/servicios/animacion/create',[ServicioController::class,'create'])->middleware('can:animacion.create')->name('animacion.create');
Route::get('/servicios/otroservicio/create',[ServicioController::class,'create'])->middleware('can:otroservicio.create')->name('otroservicio.create'); */
Route::post('/servicio',[ServicioController::class,'store'])->middleware('can:servicios.store')->name('servicios.store');
route::get('/servicios/{servicio}/edit',[ServicioController::class,'edit'])->name('servicios.edit');
Route::put('/servicios/{servicio}',[ServicioController::class,'update'])->name('servicios.update');

/* Eventos servicios */
Route::post('/eventoservicios',[EventoServicioController::class,'store'])->middleware('can:eventoservicios.store')->name('eventoservicios.store');
Route::get('/eventoservicios/{evento}/create/',[EventoServicioController::class,'create'])->middleware('can:eventoservicios.create')->name('eventoservicios.create');
Route::delete('/eventoservicios/{servicio}/{evento}',[EventoServicioController::class,'destroy'])->middleware('can:eventoservicios.destroy')->name('eventoservicios.destroy');

/* Roles */
Route::get('/roles',[RoleController::class,'index'])->middleware('can:roles.index')->name('roles.index');
Route::get('/roles/create',[RoleController::class,'create'])->middleware('can:roles.create')->name('roles.create');
Route::get('roles/{Role}',[RoleController::class, 'show'])->middleware('can:roles.show')->name('roles.show');
Route::get('/roles/{Role}/edit', [RoleController::class, 'edit'])->middleware('can:roles.edit')->name('roles.edit');
Route::post('/roles',[RoleController::class, 'store'])->middleware('can:roles.store')->name('roles.store');
Route::put('/roles/{Role}',[RoleController::class, 'update'])->middleware('can:roles.update')->name('roles.update');
Route::delete('/roles/{Role}', [RoleController::class, 'destroy'])->middleware('can:roles.destroy')->name('roles.destroy');

/* Banquets */
Route::get('/banquetes/{evento}/formato', [BanquetController::class, 'formato'])->name('banquetes.formato');
Route::get('/banquetes/{evento}', [BanquetController::class, 'create'])->middleware('can:banquetes.create')->name('banquetes.create');

/* Inventory */
Route::get('/inventories/tablecloth',[inventoryController::class,'tablecloth'])->middleware('can:inventory.tablecloth')->name('inventory.tablecloth');
Route::get('/inventories/tableclothcreate',[inventoryController::class,'tableclothcreate'])->middleware('can:inventory.tableclothcreate')->name('inventory.tableclothcreate');
Route::get('/inventories/{tablecloth}/edit', [inventoryController::class,'tableclothedit'])->middleware('can:inventory.tableclothedit')->name('inventory.tableclothedit');
Route::post('/inventories/tableclothstore',[inventoryController::class,'tableclothstore'])->middleware('can:inventory.tableclothstore')->name('inventory.tableclothstore');
Route::put('/inventories/{tablecloth}',[inventoryController::class,'tableclothupdate'])->middleware('can:inventory.tableclothupdate')->name('inventory.tableclothupdate');
Route::get('/inventories/{tablecloth}',[inventoryController::class,'tableclothshow'])->middleware('can:inventory.tableclothshow')->name('inventory.tableclothshow');
/* Inventory others */
Route::get('others/', [inventoryController::class,'othersIndex'])->name('others.index');
Route::get('others/create', [inventoryController::class,'othersCreate'])->name('others.create');
Route::post('others', [inventoryController::class,'othersStore'])->name('others.store');
Route::get('others/{inventory}/edit', [inventoryController::class,'othersEdit'])->name('others.edit');
Route::put('others/{inventory}', [inventoryController::class,'othersUpdate'])->name('others.update');
Route::get('others/{inventory}', [inventoryController::class,'othersShow'])->name('others.show');
/* Tableclothbase */
route::get('tableclothbase/', [tableclothbaseController::class,'index'])->middleware('can:tableclothbase.index')->name('tableclothbase.index');
route::get('tableclothbase/create',[tableclothbaseController::class,'create'])->middleware('can:tableclothbase.create')->name('tableclothbase.create');
Route::get('tableclothbase/{tableclothbase}/edit',[tableclothbaseController::class,'edit'])->middleware('can:tableclothbase.edit')->name('tableclothbase.edit');
Route::post('tableclothbase', [tableclothbaseController::class, 'store'])->middleware('can:tableclothbase.store')->name('tableclothbase.store');
Route::put('tableclothbase/{tableclothbase}',[tableclothbaseController::class, 'update'])->middleware('can:tableclothbase.update')->name('tableclothbase.update');
Route::get('tableclothbase/{tableclothbase}', [tableclothbaseController::class, 'show'])->middleware('can:tableclothbase.show')->name('tableclothbase.show');
/* floralbases */
route::get('floralbase/', [floralbaseController::class,'index'])->middleware('can:floralbase.index')->name('floralbase.index');
route::get('floralbase/create',[floralbaseController::class,'create'])->middleware('can:floralbase.create')->name('floralbase.create');
Route::get('floralbase/{floralbase}/edit',[floralbaseController::class,'edit'])->middleware('can:floralbase.edit')->name('floralbase.edit');
Route::post('floralbase', [floralbaseController::class, 'store'])->middleware('can:floralbase.store')->name('floralbase.store');
Route::put('floralbase/{floralbase}',[floralbaseController::class, 'update'])->middleware('can:floralbase.update')->name('floralbase.update');
Route::get('floralbase/{floralbase}', [floralbaseController::class, 'show'])->middleware('can:floralbase.show')->name('floralbase.show');
/* Chair */
Route::resource('chairs', ChairController::class)->names('chairs');
/* Discounts */
Route::get('discount/{evento}',[DiscountController::class, 'create'])->name('discounts.create');
Route::post('discount/', [DiscountController::class, 'store'])->name('discounts.store');
Route::delete('discount/{discount}', [DiscountController::class,'destroy'])->name('discounts.destroy');

/* Reportes */
Route::get('reports',[reportController::class, 'index'])->middleware('can:reports.index')->name('reports.index');

/* Recommendations */
Route::get('/recommendations', [RecommendationController::class,'index'])->middleware('can:recommendations.index')->name('recommendations.index');

/* Encuesta */
Route::get('/encuesta', [SurveyController::class, 'index']);

/* Meets */
Route::get('/meets', [MeetController::class, 'index'])->middleware('can:meets.index')->name('meets.index');
Route::get('/meets/create', [MeetController::class, 'create'])->middleware('can:meets.create')->name('meets.create');
Route::post('/meets', [MeetController::class, 'store'])->middleware('can:meets.store')->name('meets.store');
Route::get('/meets/{meet}', [MeetController::class, 'show'])->middleware('can:meets.show')->name('meets.show');
Route::put('/meets/{meet}', [MeetController::class, 'update'])->middleware('can:meets.update')->name('meets.update');

/* Logactivity */
Route::get('/logactivity', [LogActivityController::class, 'index'])->middleware('can:logactivity.index')->name('logactivity.index');

/**Eliminar cache de servicio */
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');

    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
/* Storage link */
/* route::get('storage-link',function(){
    $exitCode = Artisan::call('storage:link');
    return 'DONE';
});
 */
