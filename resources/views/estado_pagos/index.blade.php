@extends('layouts.principal')
@section('content')
  <!-- page content -->


  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Estado de Pagos</h3>
        </div>
      </div>
      <div class="clearfix"></div>



      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Búsqueda</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">



                                       <form class="form-horizontal" action="/estado_pagos_contratista/consulta" method="post">


                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                      {!!Form::label("telefono3_label",'Fecha de Inicio',['class'=>'control-label co2-md-2 col-sm-2 col-xs-4'])!!}
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        {!!Form::date('fecha_inicio', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                      </div>
                      {!!Form::label("telefono3_label",'Fecha de Finalización',['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])!!}
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        {!!Form::date('fecha_fin', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                        <div class="btn-group">
                          <a type ="reset" class="btn btn-app" href= "/informeclientes" ><i class="glyphicon glyphicon-refresh"></i> Limpiar</a>
                         <button type="submit" class="btn btn-app" href= "#"  ><i class="fa fa-search"></i> Buscar</button>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">
                    <br>

                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <br>


                </div>
              </div>
      </div>

      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <div class="container">

            </div>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">




              <?php $mensaje=Session::get('mensaje')?>
              @if ($mensaje=='store')
                <div class="alert alert-success " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Contratista Registrado
                </div>
              @endif
              @if ($mensaje=='update')
                <div class="alert alert-success " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Contratista Actualizado
                </div>
              @endif
              @if ($mensaje=='destroy')
                <div class="alert alert-danger " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Contratista Eliminado
                </div>
              @endif

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th>
                        <input type="checkbox" id="check-all" class="flat">
                      </th>
                      <th class="column-title">Empleado</th>
                      <th class="column-title text-right">S. Credito</th>
                      <th class="column-title text-right">S. Contado</th>
                      <th class="column-title text-right">Credito</th>
                      <th class="column-title text-right">Contado</th>
                      <th class="column-title text-right">Total Ventas</th>
                      <th class="column-title text-right">Ganancia Contratista</th>
                      <th  class="column-title text-right">Seguro</th>
                      <th  class="column-title text-right">Alquiler</th>
                      <th  class="column-title text-right">Ganancia Contratante </th>
                      <th  class="column-title text-right">Ahorro</th>
                      <th  class="column-title text-right">Retención</th>


                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($collection as $dato)


                    <tr class="even pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td class=" ">{{$dato->nombre}} </td>
                      <td class=" text-right">{{$dato->cantidad_contado}} </td>
                      <td class="text-right ">{{$dato->cantidad_credito}} </td>
                      <td class="text-right ">{{$dato->suma_contado}} </td>
                      <td class="text-right ">{{$dato->suma_credito}} </td>
                      <td class=" text-right">{{$dato->suma_total}} </td>
                      <td class="text-right ">{{$dato->utilidad_contratista}} </td>
                      <td class="text-right ">{{0}} </td>
                      <td class="text-right ">{{$dato->alquiler}} </td>
                      <td class="text-right ">{{$dato->utilidad_empresa}} </td>
                      <td class=" text-right">{{$dato->ahorro}} </td>
                      <td class="text-right ">{{$dato->monto_retencion}} </td>



                    </tr>
                          @endforeach


                  </tbody>
                </table>

              </div>



            </div>
          </div>
        </div>
      </div>
    </div>

  </div>



@endsection
