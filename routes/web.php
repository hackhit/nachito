<?php

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



Route::bind('producto',function($id){
	 return App\Torta::where('id',$id)->first();
	});	




Route::get('/', function () {
    return view('paginaInicio');
})->name('inicio');

 // Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/registroTrabajador', 'RegistroTrabajadorController@mostrarFormulario')->name('registrarTrabajador');

Route::post('/registroTrabajador', 'RegistroTrabajadorController@insertarTrabajador')->name('registrarTrabajador');

Route::get('/registroCliente', 'RegistroClienteController@mostrarFormulario')->name('registrarCliente');


Route::post('/registroCliente', 'RegistroClienteController@insertarCliente')->name('registrarCliente');


Route::get('/accesoCliente', 'AccesoController@formAccesoCliente')->name('accesoCliente');


Route::post('/accesoCliente', 'AccesoController@accesoCliente')->name('accesoCliente');

Route::get('cerrar', 'AccesoController@cerrarSesion')->name('cerrarSesion');


Route::get('/hacerPedido','PedidosController@redirect')->name('ingresarPedido');
Route::post('/hacerPedido','PedidosController@ingresarPedido')->name('ingresarPedido');


Route::get('/verPedidos','PedidosController@verPedidos')->name('verPedidos');

Route::post('/elimarPedido','PedidosController@eliminarPedido')->name('eliminarPedido');
Route::post('/verPedidos','PedidosController@cancelarPedido')->name('cancelarPedido');

Route::get('/formularioPedido','PedidosController@formPedido')->name('formPedido');

Route::get('/accesoTrabajador', 'AccesoController@formAccesoTrabajador')->name('accesoTrabajador');

Route::post('/accesoTrabajador', 'AccesoController@accesoTrabajador')->name('accesoTrabajador');



Route::get('/verClientes','RegistroClienteController@verClientes')->name('verClientes');


Route::get('/verPedidosTrabajador','PedidosController@verPedidosTrabajador')->name('verPedidosTrabajador');



Route::post('/prepararPedido', 'PedidosController@prepararPedido')->name('prepararPedido');

Route::post('/completarPedido', 'PedidosController@completarPedido')->name('completarPedido');

Route::post('/entregarPedido', 'PedidosController@entregarPedido')->name('entregarPedido');


Route::get('/verReporte','ReportePdfController@reporte')->name('Reportes');


Route::post('/mejorCliente','ReportePdfController@mejorCliente')->name('mejorCliente');

Route::post('/mejorTrabajador','ReportePdfController@mejorTrabajador')->name('mejorTrabajador');


Route::post('/tortaMasVendida','ReportePdfController@tortaMasVendida')->name('tortaMasVendida');

Route::get('/catalogo','CatalogoController@mostrarCatalogo')->name('catalogo');
Route::get('catalogo/{id?}', 'CatalogoController@mostrar')->name('torta-detalle');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/inicioSesion','AccesoController@formInicioSesion')->name('iniciarSesion');
	
Route::get('/materiPrimaTorta','IngresoMateriaPrima@verFormularioMateria')->name('materiaPrima');
Route::post('/materiPrimaTorta','IngresoMateriaPrima@ingresoNuevaMateriaPrima')->name('materiaPrima');	

Route::get('/ingresoMateriaPrima','IngresoMateriaPrima@verFormularioMateria')->name('materiaPrima');
Route::post('/ingresoMateriaPrima','IngresoMateriaPrima@ingresoNuevaMateriaPrima')->name('materiaPrima');

Route::get('/ingresoNuevaTorta','IngresoMateriaPrima@nuevaTortaForm')->name('nuevaTorta');
Route::post('/ingresoNuevaTorta','IngresoMateriaPrima@nuevaTorta')->name('nuevaTorta');


Route::get('/precios','PreciosController@verFormPrecios')->name('precios');
Route::post('/precios','PreciosController@ingresoPrecios')->name('precios');

Route::get('/insumosTortas','IngresoMateriaPrima@formIngresoInsumoTorta')->name('insumosTortas');
Route::post('/insumosTortas','IngresoMateriaPrima@ingresoInsumoTorta')->name('insumosTortas');

Route::get('Bloqueada','AccesoController@paginaBloqueadaTrabajador')->name('paginaBloqueada');

Route::get('actualizarPerfil','ActualizarPerfilesController@formActualizarPerfil')->name('actualizarPerfil');
Route::post('actualizarPerfil','ActualizarPerfilesController@actualizarPerfil')->name('actualizarPerfil');

Route::post('eliminarCliente','RegistroClienteController@eliminarCliente')->name('eliminarCliente');
Route::post('quitarCastigo','RegistroClienteController@quitarCastigo')->name('quitarCastigo');

Route::get('/stock','StockController@verFormStock')->name('stock');

Route::post('/stock','StockController@sumarMateriaPrima')->name('stock');


Route::get('/verEntradas','StockController@verEntradas')->name('entradas');
Route::get('/verSalidas','StockController@verSalidas')->name('salidas');


Route::get('/verEntradas','StockController@verEntradas')->name('entradas');
Route::get('/verSalidas','StockController@verSalidas')->name('salidas');


Route::get('/crearRespaldo','RespaldoController@verFormRepaldo')->name('crearRespaldo');
Route::post('/crearRespaldo','RespaldoController@crearRespaldo')->name('crearRespaldo');

Route::get('/restaurar','RespaldoController@verFormRepaldo')->name('restaurar');
Route::post('/restaurar','RespaldoController@restaurar')->name('restaurar');

Route::get('/borrarRespaldo','RespaldoController@verFormRepaldo')->name('borrarRespaldo');
Route::post('/borrarRespaldo','RespaldoController@eliminarRespaldo')->name('borrarRespaldo');



