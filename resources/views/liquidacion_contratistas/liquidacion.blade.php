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
              <h2>Tirilla de Pago: {{$nombre_contratista. $tiempo}} </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="/liquidacion_contratista"class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table class="table table-bordered">
                <?php
                $total_pago_contratista= 0;
                $total_pago_contratista= ($utilidad*$total)/100;
                $total_pago_contratista= $total_contado -$total_pago_contratista;
                if($total_pago_contratista<0)
                {
                  $total_pago_contratista=0;
                }
                $total_pago_contratante= 0;
                $total_pago_contratante= ((100-$utilidad)*$total)/100;
                $total_pago_contratante=   $total_credito - $total_pago_contratante;
                if($total_pago_contratante<0)
                {
                  $total_pago_contratante=0;
                }


                 ?>
                   {!! Form::open(['route'=>'liquidacion_contratista.store','method'=>'POST','class'=>' form-horizontal form-label-left', 'files'=>true]) !!}
                  <tbody>
                    <tr>
                        <input type="hidden" name= "contratista" value="{!!$id_contratista!!}" id="contratista">
                          <input type="hidden" name= "fecha_inicio" value="{!!$fecha_inicio!!}" id="fecha_inicio">
                            <input type="hidden" name= "fecha_fin" value="{!!$fecha_fin!!}" id="fecha_fin">
                      <td><strong>Cantidad de Servicios</strong></td>
                      <td align="right"><input name="cantidad_servicios_liquidacion" readonly value= "{!!($cantidad_contado+ $cantidad_credito)!!}" id= "cantidad_servicios_liquidacion" type="text" class="form-control" placeholder="0"></td>
                      <td><strong>Total Servicios</strong></td>
                      <td align="right"><input name="total_servicios_liquidacion" readonly value= "{!!($total)!!}" id= "total_servicios_liquidacion" type="text" class="form-control" placeholder="0"></td>
                      <td><strong>Utilidad Contratista</strong></td>
                      <td align="right"><input name="monto_total_utilidad_liquidacion" readonly value= "{!!($utilidad*$total)/100!!}" id= "monto_total_utilidad_liquidacion" type="text" class="form-control" placeholder="0"></td>
                    </tr>
                    <tr>
                      <td><strong>Cantidad Servicios Contado</strong></td>
                      <td align="right"><input name="cantidad_contado_liquidacion" readonly value= "{!!($cantidad_contado)!!}" id= "cantidad_contado_liquidacion" type="text" class="form-control" placeholder="0"></td>
                      <td><strong>Valor de Servicios a Contado</strong></td>
                      <td align="right"><input name="total_contado_liquidacion" readonly value= "{!!($total_contado)!!}" id= "total_contado_liquidacion" type="text" class="form-control" placeholder="0"></td>
                      <td><strong>Utilidad Contratante</strong></td>
                      <td align="right"><input name="monto_total_utilidad_contratante_liquidacion" readonly value= "{!!(100-$utilidad)*$total/100!!}" id= "monto_total_utilidad_contratante_liquidacion" type="text" class="form-control" placeholder="0"></td>
                    </tr>
                    <tr>
                      <td><strong>Cantidad Servicios Credito</strong></td>
                      <td align="right"><input name="cantidad_credito_liquidacion" readonly value= "{!!($cantidad_credito)!!}" id= "cantidad_credito_liquidacion" type="text" class="form-control" placeholder="0"></td>
                      <td><strong> Valor de los Servicios a Credito </strong></td>
                      <td align="right"><input name="total_credito_liquidacion" readonly value= "{!!($total_credito)!!}" id= "total_credito_liquidacion" type="text" class="form-control" placeholder="0"></td>
                      <td><strong>Utilidad Contratista - Retencion</strong></td>
                      <td align="right" width='10%'><input name="retencion_contratista" readonly value= "0" id= "total_contratante_liquidacion" type="text" class="form-control" placeholder="0"></td>


                    </tr>
                    <tr>
                      <td><strong>Porcentaje Contratista</strong></td>
                      <td align="right"><input name="porcentaje_contratista_liquidacion" value= "{!!($utilidad)!!}" id= "porcentaje_contratista_liquidacion" type="text" class="form-control" placeholder="0"></td>
                      <td><strong> Porcentaje Contratante </strong></td>
                      <td align="right"><input name="porcentaje_contratante_liquidacion" readonly value= "{!!(100-$utilidad)!!}" id= "porcentaje_contratante_liquidacion" type="text" class="form-control" placeholder="0"></td>
                      <td><strong>Total a Pagar Contratante</strong></td>
                      <td align="right" width='10%'><input name="total_pago_contratante" readonly value= "{!!($total_pago_contratante)!!}" id= "total_pago_contratante" type="text" class="form-control" placeholder="0"></td>

                    </tr>

                    <tr>
                        <td> <strong>Porcentaje de Retencion</strong> </td>
                          <td align="right" width='10%'>{!!Form::text('porcentaje_retencion_liquidacion',null,['class'=>'form-control','id'=>'porcentaje_retencion_liquidacion','placeholder'=>'0', "style"=>"text-align: right"])!!}</td>
                          <td><strong>Monto retencion</strong></td>
                          <td align="right" width='10%'> <input name="monto_retencion_liquidacion" disabled value= "" id= "monto_retencion_liquidacion" type="text" class="form-control" placeholder="0"></td>
                          <td><strong>Total a Pagar Contratista </strong></td>
                          <td align="right"><input  name="total_pago_contratista" readonly value= "{!!($total_pago_contratista)!!}" type="text"   id= "total_pago_contratista" class="form-control" placeholder="0"></td>

                    </tr>

                    <tr>
                      <td colspan="6" style=" background-color: #0EBEBA ;text-align:center;" > <strong style = "color:#FFF"> Descuentos Adicionales</strong></td>
                    </tr>

                    <tr>
                      <td><strong>Prestamos</strong></td>
                      <td colspan= "3"align="right"><div class="input-group demo2">
                        <input type="text" class="form-control" readonly  value= "{!!($total_prestamo)!!}"  id="total_prestamos_pendientes_contratista" >
                        <span class="input-group-addon"><a class=""  data-toggle="modal" data-target="#myModal" href= "#" ><i class="fa fa-building"></i>  Detalle Prestamos</a></span>
                    </div> </td>
                      <td ><strong> Abono a Prestamo </strong></td>
                      <td align="left" colspan=""><input name="abono_prestamo_liquidacion"  value= "{!!0!!}" id= "abono_prestamo_liquidacion" type="text" class="form-control" placeholder="0"></td>
                    </tr>
                    <tr>
                      <td colspan="4"> </td>
                      <td><strong>Total Base</strong></td>
                      <td align="right" width='10%'><input name="total_base_contratista" readonly value= "{!!(0)!!}" id= "total_base_contratista" type="text" class="form-control" placeholder="0"></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                      <td><strong>Ahorro</strong></td>
                      <td align="right" width='10%'><input name="abono_contratista_liquidacion" value= "{!!($abono)!!}" id= "abono_contratista_liquidacion" type="text" class="form-control" placeholder="0"></td>
                    </tr>

                    <tr>
                      <td colspan="4"></td>
                      <td><strong>Alquiler de Equipo</strong></td>
                      <td align="right"><input name="alquiler_equipos_liquidacion" value= "{!!($alquiler)!!}" id= "alquiler_equipos_liquidacion" type="text" class="form-control" placeholder="0"></td>
                    </tr>
                    <?php
                    $total_liquidacion= $total_pago_contratista;
                    $total_liquidacion = $total_liquidacion - $abono - $alquiler;
                    if ($total_pago_contratante > 0){
                    $total_liquidacion = $total_pago_contratante - ( $abono + $alquiler );
                    }else{
                    $total_liquidacion = $total_pago_contratista + ( $abono + $alquiler );
                    }

                     ?>
                     <tr>
                       <td colspan="4"></td>
                       <td><strong>Seguro </strong></td>
                       <td align="right"><input name="seguro_liquidacion" readonly value= "{!!($seguro)!!}" id= "seguro_liquidacion" type="text" class="form-control" placeholder="0"></td>
                     </tr>

                    <tr>
                      <td colspan="4"></td>
                      <td><strong>Total liquidacion </strong></td>
                      <td align="right"><input name="total_liquidacion" readonly value= "{!!($total_liquidacion)!!}" id= "total_liquidacion" type="text" class="form-control" placeholder="0"></td>
                    </tr>



                  </tbody>
                </table>

                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                <div class="btn-group">
                  <a class="btn btn-app" href= "/liquidacion_contratista" ><i class="glyphicon glyphicon-triangle-left"></i> Atras</a>
                 <button type="submit" class="btn btn-app" href= "#" ><i class="glyphicon glyphicon-ok"></i> Procesar</button>
              </div>
            </form>
            </div>
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
                      <th  class="column-title text-right"></th>
                      <th style = "width: 100px;" class="bulk-actions" colspan="7">
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
                        <td class=" last" style=" width: 100px;"><a href="/editar_servicios/{{$servicio->id}}"><input  tooltip= "editar" style = "max-height:25px" type="image"  src="/images/edit.png"   data-toggle="modal"  id="editar_envio_espera" > </input></a>
                          <a href="/reimprimir/{{$servicio->id}}"><input  tooltip= "Imprimir" style = "max-height:25px" type="image"  src="/images/print.png"   data-toggle="modal"  id="editar_envio_espera" > </input></a>




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
    @include('detalle_prestamo')
{!!Html::script('js/script.js')!!}
@stop
