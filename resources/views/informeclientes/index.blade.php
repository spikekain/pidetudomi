@extends('layouts.principal')
@section('content')
  <!-- page content -->


  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Informe de Clientes</h3>
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


                    <br />
                                       <form class="form-horizontal" action="/informeclientes/consulta" method="post">
                                           <div class="col-md-12 col-sm-12 col-xs-12 ">

                                         <div class="form-group">
                                           <label class="control-label col-md-1 col-sm-1 col-xs-2">Cliente</label>
                                           <div class="col-md-2 col-sm-2 col-xs-2">
                                             <input name="telefono_cliente_reporte" id= "telefono_cliente_reporte" type="text" class="form-control" placeholder="Telefono Cliente">
                                           </div>
                                           <div class="col-md-5 col-sm-5 col-xs-5">
                                             <input type="text" name="nombre_cliente_reporte" id="nombre_cliente_reporte" disabled class="form-control" placeholder="Default Input">
                                           </div>
                                           <div class="col-md-4 col-sm-4 col-xs-4">
                                             <select class="form-control" name="centro_costos_remitente" id='centro_costos_remitente'>
                                             </select>
                                           </div>
                                         </div>
                                       </div>



                    <div class="col-md-12 col-sm-12 col-xs-12 ">

                      {!!Form::label("telefono3_label",'Fecha de Inicio',['class'=>'control-label col-md-1 col-sm-1 col-xs-4'])!!}
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        {!!Form::date('fecha_inicio', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                      </div>
                      {!!Form::label("telefono3_label",'Fecha de Finalización',['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])!!}
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        {!!Form::date('fecha_fin', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <div class = "panel panel-default">
                          <div class = "panel-body">

                            <label class="radio-inline"><input type="radio" value = "Todo" checked name="optradio"><strong>Todo</strong></label>
                            <label class="radio-inline"><input type="radio" value = "Contado" name="optradio"><strong>Contado</strong></label>
                            <label class="radio-inline"><input type="radio" value = "Credito" name="optradio"><strong>Credito</strong></label>
                          </div>
                          </div>
                    </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">
                    <div class = "panel panel-default">
                      <div class = "panel-body">
                    <?php
                    $cantidad =0;
                    ?>
                    {!!link_to('#', $title = "Todos", $attributes = ["id"=>"envio_servicio0","class" =>"btn btn-primary", "value"=>"0", $secure = null])!!}
                    @foreach ($tipo_servicios as $tipo_servicio)
                    <?php
                    $descripcion = $tipo_servicio->descripcion;
                    $cantidad =$cantidad+1;
                    ?>

                    {!!link_to('#', $title = $descripcion, $attributes = ["id"=>"envio_servicio".$tipo_servicio->id,"class"=>"btn btn-default", "value"=>$tipo_servicio->id], $secure = null)!!}
                    @endforeach
                    </div>
                  </div>
                  </div>
                    <input type="hidden" value="{{$cantidad}}" id="cantidad_servicios">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <input type="hidden" value="{{0}}" id="tipo_servicio" name="tipo_servicio">
                    <br>

                      <div class="col-md-6 col-sm-6 col-xs-6 text-right">

                      <div class="btn-group">
                        <a type ="reset" class="btn btn-app" href= "/informeclientes"><i class="glyphicon glyphicon-refresh"></i> Limpiar</a>
                       <button type="submit" class="btn btn-app" href= "#" ><i class="fa fa-search"></i> Buscar</button>
                    </div>
                  </div>
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



@endsection
