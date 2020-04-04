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
// Prueba
// Route::view('prueba','prueba');



Route::get('/','DatosEmpresaController@index');
//administrador
Route::view('perfiladmin','administrador.perfil');
Route::view('productos_servicios','administrador.articulos');
Route::view('empleados','administrador.trabajadores');
Route::view('empresa','administrador.empresa');
//vendedores
Route::view('perfilvendedor','vendedores.perfil');
Route::view('ventas','vendedores.ventas');
Route::view('registros','vendedores.registros');
//propietarios
Route::view('perfilpropietario','propietario.perfil');
Route::view('mimascota','propietario.perfilmascotas');
Route::view('historial','propietario.historial');
Route::view('citas','propietario.citas');
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
Route::apiResource('apiDetalle','ApiDetalleVentaController');
Route::apiResource('apiEmpleado','ApiEmpleadoController');
Route::apiResource('apiEmpleadoDesactivado','ApiEmpleadoDesactivado');
Route::apiResource('apiEspecie','ApiEspecieController');
Route::apiResource('apiEmpresa','ApiEmpresaController');
Route::apiResource('apiArticulo','ApiArticuloController');
Route::apiResource('apiTipo','ApiTipoController');
Route::apiResource('logo','ApiLogoController');
Route::apiResource('apiMascota','ApiMascotaController');
Route::apiResource('apiPropietario','ApiPropietarioController');
Route::apiResource('apiFotoMascota','ApiFotoMascotaController');
Route::apiResource('apiUsuario','ApiUsersController');
Route::apiResource('apiCliente','ApiClienteController');
Route::apiResource('apiPropietario','ApiPropietarioController');
Route::apiResource('apiGenero','ApiGeneroController');
Route::apiResource('apiCita','ApiCitaController');


Route::get('ticket','ApiTicketController@ticket');
