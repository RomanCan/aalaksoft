<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/','DatosEmpresaController@index');
//administrador
// Route::view('perfiladmin','administrador.perfil');
Route::view('perfil','administrador.perfil')->middleware('validar');
Route::view('productos_servicios','administrador.articulos')->middleware('validar');
Route::view('empleados','administrador.trabajadores')->middleware('validar');
Route::view('empresa','administrador.empresa')->middleware('validar');
Route::view('registro','administrador.registroventa')->middleware('validar');
//vendedores
Route::view('perfilvendedor','vendedores.perfil')->middleware('validar');
Route::view('ventas','vendedores.ventas')->middleware('validar');
Route::view('registros','vendedores.registros')->middleware('validar');
Route::view('cita','vendedores.citas')->middleware('validar');
//propietarios
Route::view('perfilpropietario','propietario.perfil')->middleware('validar');
Route::view('mimascota','propietario.perfilmascotas')->middleware('validar');
Route::view('historial','propietario.historial')->middleware('validar');
Route::view('citas','propietario.citas')->middleware('validar');
Route::view('login','login.login');
//final de zona de vistas


//zona de logeo y filtros
Route::get('filtroArticulo/{id}',[
    'as' => 'filtroArticulo',
    'uses' => 'ApiTipoController@filtroArticulo',
]);
Route::post('log','ApiAdministradorController@validar');
Route::get('logout','ApiAdministradorController@salir');


//zona de apis
Route::apiResource('apiVenta','ApiVentaController');
Route::apiResource('apiVentas','ApiVentasController');
Route::apiResource('apiDetalle','ApiDetalleVentaController');
Route::apiResource('apiEmpleado','ApiEmpleadoController');
Route::apiResource('apiEmpleadoDesactivado','ApiEmpleadoDesactivado');
Route::apiResource('apiEspecie','ApiEspecieController');
Route::apiResource('apiEmpresa','ApiEmpresaController');
Route::apiResource('apiArticulo','ApiArticuloController');
Route::apiResource('apiArticuloDesactivado','ApiArticuloDesactivado');
Route::apiResource('apiTipo','ApiTipoController');
Route::apiResource('logo','ApiLogoController');
Route::apiResource('apiMascota','ApiMascotaController');
Route::apiResource('apiPropietario','ApiPropietarioController');
Route::apiResource('apiFotoMascota','ApiFotoMascotaController');
Route::apiResource('apiUsuario','ApiUsersController')->middleware('validar');
Route::apiResource('apiCliente','ApiClienteController');
Route::apiResource('apiPropietario','ApiPropietarioController');
Route::apiResource('apiGenero','ApiGeneroController');
Route::apiResource('apiCita','ApiCitaController');
Route::apiResource('apiCitas','ApiCitasController');


// Route::get('ticket','ApiTicketController@ticket');
Route::get('ticket','ApiVentaController@ticket');
