@extends('layouts.principal')
@section('content')

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Listado de Servicios</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Filtros </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="/clientes"class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
        {!! Form::open(['route'=>'consulta_reporte.store','method'=>'POST','class'=>' form-horizontal form-label-left']) !!}
         <input type="hidden" name= "_token" value="{{csrf_token()}}" id="token">
              <div class="form-group ">
                  {!!Form::label("telefono3_label",'Periodo de Tiempo',['class'=>'col-md-12 col-sm-12 col-xs-12'])!!}
                      {!!Form::label("telefono3_label",'Inicio',['class'=>'control-label col-md-1 col-sm-1 col-xs-4'])!!}
                      <div class="col-md-5 col-sm-5 col-xs-8">
                      {!!Form::date('inicio', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                      </div>
                      {!!Form::label("telefono3_label",'Fin',['class'=>'control-label col-md-1 col-sm-1 col-xs-4'])!!}
                      <div class="col-md-5 col-sm-5 col-xs-8">
                      {!!Form::date('fin', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                      </div>
              </div>
              <div class="form-group ">

                    {!!Form::label("representante_label",'Codigo Contratista',['class'=>'control-label col-md-1 col-sm-1 col-xs-4'])!!}
                  <div class="col-md-2 col-sm-2 col-xs-8">
                    {!!Form::select('contratista_reporte',$contratistas,null,['placeholder' => 'Seleccione un Valor...','class'=>'form-control', 'id'=>'contratista_reporte'])!!}
                  </div>
                    <div class="col-md-3 col-sm-3 col-xs-4">
                    {!!Form::text('nombre_contratista_reporte',null,['class'=>'form-control','disabled'=>'true','id'=>'nombre_contratista_reporte','placeholder'=>'Contratista'])!!}
                    </div>
                      {!!Form::label("telefono3_label",'Cliente',['class'=>'control-label col-md-1 col-sm-1 col-xs-4'])!!}
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        {!!Form::text('telefono_cliente_reporte',null,['class'=>'form-control','id'=>'telefono_cliente_reporte','placeholder'=>'Telefono Cliente'])!!}
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        {!!Form::text('descripcion',null,['class'=>'form-control','disabled'=>'true','id'=>'nombre_cliente_reporte','placeholder'=>'Cliente'])!!}
                      </div>

              </div>
                  <button type="submit" class="btn btn-success">Enviar</button>
  {!! Form::close() !!}
              </div>
              </div>

          <div class="x_panel">
            <div class="x_title">
              <h5> Servicios Realizados </h5>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="/clientes"class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th>
                        <input type="checkbox" id="check-all" class="flat">
                      </th>
                      <th class="column-title">Telefono Remitente </th>
                      <th class="column-title">Nombre Remitente</th>
                      <th class="column-title">Centro de Costo </th>
                      <th colspan = "2" class="column-title">Contratista </th>
                      <th class="column-title">Direccion Remitente </th>
                      <th class="column-title">Direccion Destinatario</th>
                      <th class="column-title">Fecha</th>
                      <th class="column-title">Tipo de Servicio</th>
                      <th class="column-title">Detalle del Servicio </th>
                      <th  class="column-title text-right">Valor del Servicio </th>

                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($servicios as $servicio)


                    <tr class="even pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <?php

                       ?>
                      <td class=" ">{{$servicio->telefono_remitente}} </td>
                      <td class=" ">{{$servicio->nombre_remitente}}</td>
                      <td class=" ">{{$servicio->centro_costo_remitente}}</td>
                      <td class=" ">{{$servicio->codigo_contratista}} </td>
                      <td class=" ">{{$servicio->nombre_contratista}} </td>
                      <td class=" ">{{$servicio->direccion_remitente}}</td>
                      <td class=" ">{{$servicio->direccion_destinatario}}</td>
                      <td class=" ">{{ $servicio->dia}}</td>
                      <td class=" ">{{$servicio->tipo_servicio_descripcion}}</td>
                      <td class=" ">{{$servicio->detalle_envio}}</td>
                      <td class="text-right ">{{$servicio->valor_servicio}}</td>




                    </tr>
                          @endforeach

                  </tbody>
                </table>
                {!!$servicios->render()!!}
              </div>

              </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

{!!Html::script('js/script.js')!!}
@stop
