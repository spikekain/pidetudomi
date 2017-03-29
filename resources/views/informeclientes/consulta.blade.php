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
      <div class="">

<form class="" action="/informeclientes/generar_cartera" method="post">
    <input type="hidden" value="{{$cantidad_total}}" name = "cantidad_total" id="cantidad_total">
    <input type="hidden" value="{{$total_general}}" name = "total_general" id="total_general">
    <input type="hidden" value="{{$cantidad_contado}}" name = "cantidad_contado" id="cantidad_contado">
    <input type="hidden" value="{{$total_contado}}"  name = "total_contado" id="total_contado">
    <input type="hidden" value="{{$cantidad_credito}}"  name = "cantidad_credito" id="cantidad_credito">
    <input type="hidden" value="{{$total_credito}}" name="total_credito" id="total_credito">
    <input type="hidden" value="{{$nombre_cliente}}" name="telefono_remitente" id="telefono_remitente">
    <input type="hidden" value="{{$fecha_inicio}}" name="fecha_inicio" id="fecha_inicio">
    <input type="hidden" value="{{$fecha_fin}}" name="fecha_fin" id="fecha_fin">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
        <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Resumen: <span> Ventas del Cliente:{!!$nombre_cliente!!}</span></h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="table table-bordered">
                          <tbody>
                            <tr>
                              <td><strong>Cantidad de Servicios</strong></td>
                              <td align="right">{!!$cantidad_total!!}</td>
                              <td><strong>Total Servicios</strong></td>
                              <td align="right">{!!$total_general!!}</td>
                              <td><strong>Valor a Facturar</strong></td>
                              <td align="right">{!!$total_credito!!}</td>
                            </tr>
                            <tr>
                              <td><strong>Cantidad Servicios Contado</strong></td>
                              <td align="right">{!!$cantidad_contado!!}</td>
                              <td><strong>Valor de Servicios a Contado</strong></td>
                              <td align="right">{!!$total_contado!!}</td>
                              <td> <strong>Porcentaje de Retencion</strong> </td>
                              <td align="right" width='10%'>{!!Form::text('porcentaje_retencion',null,['class'=>'form-control','id'=>'porcentaje_retencion','placeholder'=>'0', "style"=>"text-align: right"])!!}</td>
                            </tr>
                            <tr>
                              <td><strong>Cantidad Servicios Credito</strong></td>
                              <td align="right">{!!$cantidad_credito!!}</td>
                              <td><strong> Valor de los Servicios a Credito </strong></td>
                              <td align="right">{!!$total_credito!!}</td>
                              <td><strong>Total de la Deuda</strong></td>
                              <td align="right" width='10%'> <input name="total_deuda" value= "{!!$total_credito!!}" id= "total_deuda" type="text" class="form-control" placeholder="0"></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                        <div class="btn-group">
                          <a class="btn btn-app" href= "/informeclientes" ><i class="glyphicon glyphicon-triangle-left"></i> Atras</a>
                          <button type="submit" class="btn btn-app" href= "#" id="generar_cartera" ><i class="fa fa-money"></i> Generar Cartera</button>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        </form>
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
                      <td class=" ">{{$servicio->fecha}}</td>
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
