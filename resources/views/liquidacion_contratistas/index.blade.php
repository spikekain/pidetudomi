@extends('layouts.principal')
@section('content')

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Liquidación Contratistas</h3>
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
       <form class="form-horizontal" action="/liquidacion_contratista/consulta" method="post">
        <div class="form-group ">

                    {!!Form::label("representante_label",'Codigo Contratista',['class'=>'control-label col-md-1 col-sm-1 col-xs-4'])!!}
                  <div class="col-md-2 col-sm-2 col-xs-8">
                    {!!Form::select('contratista_reporte',$contratistas,null,['placeholder' => 'Seleccione un Valor...','class'=>'form-control', 'id'=>'contratista_reporte'])!!}
                  </div>
                    <div class="col-md-8 col-sm-8 col-xs-10">
                    {!!Form::text('nombre_contratista_reporte',null,['class'=>'form-control','disabled'=>'true','id'=>'nombre_contratista_reporte','placeholder'=>'Contratista'])!!}
                    </div>
              </div>
         <input type="hidden" name= "_token" value="{{csrf_token()}}" id="token">
              <div class="form-group ">

                      {!!Form::label("telefono3_label",'Inicio',['class'=>'control-label col-md-1 col-sm-1 col-xs-4'])!!}
                      <div class="col-md-4 col-sm-4 col-xs-8">
                      {!!Form::date('inicio', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                      </div>
                      <div class="col-md-1 col-sm-1 col-xs-4">
                          <p class="text-center"><button type="submit" class="btn btn-primary">Procesar</button></p>
                      </div>
                      {!!Form::label("telefono3_label",'Fin',['class'=>'control-label col-md-1 col-sm-1 col-xs-4'])!!}
                      <div class="col-md-4 col-sm-4 col-xs-8">
                      {!!Form::date('fin', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                      </div>
              </div>

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
                      <td class=" ">{{ $servicio->fecha}}</td>
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
