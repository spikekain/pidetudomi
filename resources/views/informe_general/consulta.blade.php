@extends('layouts.principal')
@section('content')
  <!-- page content -->


  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Informe General</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="">

    <form class="" action="/informe_general/consulta" method="post">
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
                      <h2>Resumen: <span> </span></h2>

                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="table table-bordered">

                          <tbody>
                            <tr>
                              <td><strong>Cantidad de Servicios</strong></td>
                              <td align="right">{!!$cantidad_total!!}</td>
                              <td><strong>Total Servicios</strong></td>
                              <td align="right">{!!number_format($total_general, 2, ',', '.')!!}</td>
                              <td><strong>Valor a Facturar</strong></td>
                              <td align="right">{!!number_format($total_credito, 2, ',', '.')!!}</td>
                            </tr>
                            <tr>
                              <td><strong>Cantidad Servicios Contado</strong></td>
                              <td align="right">{!!$cantidad_contado!!}</td>
                              <td><strong>Valor de Servicios a Contado</strong></td>
                              <td align="right">{!!number_format($total_contado, 2, ',', '.')!!}</td>
                              <td><strong>Total Utilidad Contratistas</strong></td>
                              <td align="right">{!!number_format($utilidad_contratista, 2, ',', '.')!!}</td>

                            </tr>
                            <tr>
                              <td><strong>Cantidad Servicios Credito</strong></td>
                              <td align="right">{!!$cantidad_credito!!}</td>
                              <td><strong> Valor de los Servicios a Credito </strong></td>
                              <td align="right">{!!number_format($total_credito, 2, ',', '.')!!}</td>
                              <td><strong> Total Utilidad Contratante </strong></td>
                              <td align="right">{!!number_format($utilidad_contratante, 2, ',', '.')!!}</td>
                            </tr>

                          </tbody>
                        </table>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">

                        <div class="btn-group">
                          <a class="btn btn-app" href= "/informe_general"  ><i class="glyphicon glyphicon-triangle-left"></i> Atras</a>

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
                      <th  class="column-title text-right">Utilidad Contratista </th>
                      <th  class="column-title text-right">Utilidad Contratante </th>

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
                      <td class=" ">{{$servicio->dia}}</td>
                      <td class=" ">{{$servicio->tipo_servicio_descripcion}}</td>
                      <td class=" ">{{$servicio->detalle_envio}}</td>
                      <td class="text-right ">{{$servicio->valor_servicio}}</td>
                      <td class="text-right ">{{($servicio->valor_servicio* $servicio->utilidad)/100}}</td>
                      <td class="text-right ">{{($servicio->valor_servicio*(100-$servicio->utilidad)/100)}}</td>
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
