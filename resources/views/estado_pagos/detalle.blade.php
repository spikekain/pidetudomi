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
                    <h2>Consolidado : <span> {{$nombre_contratista}} </span></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">

                         {!! Form::open(['route'=>'liquidacion_contratista.store','method'=>'POST','class'=>' form-horizontal form-label-left', 'files'=>true]) !!}
                        <tbody>
                          <tr>
                              <input type="hidden" name= "contratista" value="{!!0!!}" id="contratista">
                                <input type="hidden" name= "fecha_inicio" value="{!!0!!}" id="fecha_inicio">
                                  <input type="hidden" name= "fecha_fin" value="{!!0!!}" id="fecha_fin">
                            <td><strong>Cantidad de Servicios</strong></td>
                            <td align="right"><input name="cantidad_servicios_liquidacion" readonly value= "{!!($cantidad_servicio)!!}" id= "cantidad_servicios_liquidacion" type="text" class="form-control" placeholder="0"></td>
                            <td><strong>Total Servicios</strong></td>
                            <td align="right"><input name="total_servicios_liquidacion" readonly value= "{!!($total_servicio)!!}" id= "total_servicios_liquidacion" type="text" class="form-control" placeholder="0"></td>
                            <td><strong>Utilidad Contratista</strong></td>
                            <td align="right"><input name="monto_total_utilidad_liquidacion" readonly value= "{!!$utilidad_contratista!!}" id= "monto_total_utilidad_liquidacion" type="text" class="form-control" placeholder="0"></td>
                          </tr>
                          <tr>
                            <td><strong>Cantidad Servicios Contado</strong></td>
                            <td align="right"><input name="cantidad_contado_liquidacion" readonly value= "{!!$cantidad_contado!!}" id= "cantidad_contado_liquidacion" type="text" class="form-control" placeholder="0"></td>
                            <td><strong>Valor de Servicios a Contado</strong></td>
                            <td align="right"><input name="total_contado_liquidacion" readonly value= "{!!$total_contado!!}" id= "total_contado_liquidacion" type="text" class="form-control" placeholder="0"></td>
                            <td><strong>Utilidad Contratante</strong></td>
                            <td align="right"><input name="monto_total_utilidad_contratante_liquidacion" readonly value= "{!!$utilidad_contratante!!}" id= "monto_total_utilidad_contratante_liquidacion" type="text" class="form-control" placeholder="0"></td>
                          </tr>
                          <tr>
                            <td><strong>Cantidad Servicios Credito</strong></td>
                            <td align="right"><input name="cantidad_credito_liquidacion" readonly value= "{!!($cantidad_credito)!!}" id= "cantidad_credito_liquidacion" type="text" class="form-control" placeholder="0"></td>
                            <td><strong> Valor de los Servicios a Credito </strong></td>
                            <td align="right"><input name="total_credito_liquidacion" readonly value= "{!!($total_credito)!!}" id= "total_credito_liquidacion" type="text" class="form-control" placeholder="0"></td>
                            <td><strong>Retención</strong></td>
                            <td align="right" width='10%'><input name="retencion_contratista" readonly value= "{{$total_retencion}}" id= "total_contratante_liquidacion" type="text" class="form-control" placeholder="0"></td>
                          </tr>
                          <tr>
                            <td colspan="6" style=" background-color: #0EBEBA ;text-align:center;" > <strong style = "color:#FFF"> Descuentos Adicionales</strong></td>
                          </tr>
                          <tr>
                              <td colspan="4"></td>
                            <td><strong>Ahorro</strong></td>
                            <td align="right" width='10%'><input name="abono_contratista_liquidacion" readonly value= "{!!($total_ahorro)!!}" id= "abono_contratista_liquidacion" type="text" class="form-control" placeholder="0"></td>
                          </tr>
                          <tr>
                            <td colspan="4"></td>
                            <td><strong>Alquiler de Equipo</strong></td>
                            <td align="right"><input name="alquiler_equipos_liquidacion"  readonly value= "{!!($total_alquiler)!!}" id= "alquiler_equipos_liquidacion" type="text" class="form-control" placeholder="0"></td>
                          </tr>

                           <tr>
                             <td colspan="4"></td>
                             <td><strong>Seguro </strong></td>
                             <td align="right"><input name="seguro_liquidacion" readonly value= "{!!(0)!!}" id= "seguro_liquidacion" type="text" class="form-control" placeholder="0"></td>
                           </tr>
                        </tbody>
                      </table>
                      <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                        <div class="btn-group">
                          <a type ="reset" class="btn btn-app" href= "/estado_pagos_contratista"  ><i class="glyphicon glyphicon-triangle-left"></i> Atras</a>

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
                      <th class="column-title">Fecha</th>
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
                        <th  class="column-title text-right"></th>
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($collection as $dato)


                    <tr class="even pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                    <td class=" text-right">{{$dato->dia}} </td>
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
