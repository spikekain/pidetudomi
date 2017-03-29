<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::post('/enviar_servicio','ServiciosController@enviar_servicio');
Route::post('/enviar_servicio_espera2','ServiciosController@enviar_servicio_espera');
Route::post('/procesar_envio_espera','ServiciosController@procesar_servicio_espera');
Route::post('/estado_pagos_contratista/consulta','estado_pagos_controller@consulta');
Route::post('/informe_general/consulta','informe_general_controller@consulta');
Route::post('/actualizar_clientes','ClientesController@crear_cliente');
Route::post('/cartera/consulta','carteracontroller@consulta');
Route::post('/clientes/frecuente/guardar','frecuentes_controller@guardar');
Route::post('/liquidacion_contratista/consulta','liquidacion_contratista_controller@consulta');
Route::post('/guardar_servicios','ServiciosController@guardar');
Route::post('/clientes/frecuente/actualizar','frecuentes_controller@actualizar');
Route::post('/clientes/centrocostos/actualizar','CentrocostosController@actualizar');
Route::post('/analisis_servicios/consulta','ServiciosController@analisis_servicios_consulta');
Route::post('/analisis_clientes/consulta','ClientesController@analisis_servicios_consulta');
Route::post('/informeclientes/consulta','informecliente@consulta');
Route::post('/informeclientes/generar_cartera','informecliente@generar_cartera');
Route::get('/imprimir_tirilla/{id}','liquidacion_contratista_controller@imprimir_tirilla');
Route::get('/frecuente/eliminar/{id}','frecuentes_controller@eliminar');
Route::get('/frecuente/editar/{id}','frecuentes_controller@editar');
Route::get('/centrocosto/eliminar/{id}','CentrocostosController@eliminar');
Route::get('/centrocosto/editar/{id}','CentrocostosController@editar');
Route::get('/analisis_servicios','ServiciosController@analisis_servicios');
Route::get('/estado_pagos/detalle/{fecha_inicio}/{fecha_fin}/{id}','estado_pagos_controller@detalle');
Route::get('/','frontendController@index');
Route::get('/estado_pagos_contratista','estado_pagos_controller@index');
Route::get('/detalle_tirilla','liquidacion_contratista_controller@detalle_tirilla');
Route::get('/home','MainController@index');
Route::get('/clientes/frecuente/{id}','frecuentes_controller@crear');
Route::get('/prueba','MainController@prueba');
Route::get('/llamadas_entrantes','llamadas_entrantes@consulta');
Route::get('/limpiar_llamadas_entrantes','llamadas_entrantes@limpiar');
Route::get('/obtener_servicio_id/{id}','ServiciosController@obtener_servicio_id');
Route::get('/borrar_servicio_espera/{id}','ServiciosController@borrar_servicio_espera');
Route::get('/capturar_llamada/{id}','llamadas_entrantes@captura');
Route::get('/llenar_llamada/{numero}/{linea}/{empresa}','llamadas_entrantes@llenar');
Route::resource('empresa','EmpresaController');
Route::resource('/notas_contables','notas');
Route::resource('/reporte_empresa','reporte_empresacontroller');
Route::resource('/contratistas','ContratistaController');
Route::resource('/clientes','ClientesController');
Route::resource('/informe_general','informe_general_controller');
Route::get('buscar/{telefono}','ClientesController@buscar');
Route::get('traer_cliente','ClientesController@traer_cliente');
Route::get('buscar_centro_costo/{cliente}','CentrocostosController@buscar_centro_costo');
Route::get('buscar_frecuentes/{cliente}','frecuentes_controller@buscar_frecuentes');
Route::get('buscar_centro_costo_id/{id}','CentrocostosController@buscar_centro_costo_id');
Route::get('buscar_ccontratista_id/{id}','ContratistaController@buscar_ccontratista_id');
Route::get('lista_contratistas','ContratistaController@lista_contratistas');
Route::resource('centrocostos','CentrocostosController');
Route::get('centrocostos/crear/{id}','CentrocostosController@create');
Route::get('servicios_espera','ServiciosController@servicios_espera');
Route::resource('tipo_servicios','TipoServiciosController');
Route::resource('servicios','ServiciosController');
Route::resource('consulta_reporte','ConsultaReporte');

Route::resource('/liquidacion_contratista','liquidacion_contratista_controller');
Route::resource('prestamos','prestamos_controller');
Route::get('servicios_espera_tipo/{id}','ServiciosController@servicios_espera_tipo');
Route::resource('informeclientes','informecliente');
Route::get('/imprimir_servicios/{id}','ServiciosController@imprimir');
Route::get('/servicios_clientes/{id}','ServiciosController@imprimir');

Route::get('/analisis_clientes','ClientesController@analisis');

Route::get('/editar_servicios/{id}','ServiciosController@editar');
Route::get('/ultimo_servicio','ServiciosController@ultimo_servicio');
Route::get('/lista_impresion_servicios/{empresa}','ServiciosController@lista_impresion_servicios');
Route::get('/reimprimir/{id}','ServiciosController@reimprimir');
Route::get('cartera/cuenta_cobro/{id}','carteracontroller@cuenta_cobro');
Route::resource('cartera','carteracontroller');
Auth::routes();
