@extends('layouts.principal')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Servicios</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-bars"></i> Editar un Servicio</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="/liquidacion_contratista" class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                </li>
              </ul>
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
                  Usuario Actualizado
                </div>
              @endif
            @include('alerts.request')
            <div class="col-md-6">

             <form class="form-horizontal" action="/guardar_servicios" method="post">
              {!!Form::label("representante_label",'Remitente',['class'=>'control-label'])!!}
                  <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                      <div class="input-group">
                        <input type="hidden" name= "_token" value="{{csrf_token()}}" id="token">
                        <input type="text" placeholder="Telefono" value="{{$servicios->telefono_remitente}}" id="telefono_remitente" class="form-control">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-primary">+</button></span>
                      </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control" id="nombre_remitente" value="{{$servicios->nombre_remitente}}" placeholder="Cliente">
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <select class="form-control" id='centro_costos_remitente'>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="nit_remitente" value="{{$servicios->nit_remitente}}" placeholder="NIT">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" id="contacto_remitente" value="{{$servicios->contacto_remitente}}" placeholder="Contacto">
                      </div>
                  </div>
                  <div class="row">
                    <script src="http://api.mygeoposition.com/api/geopicker/api.js" type="text/javascript"></script>
               <script type="text/javascript">
                   function lookupGeoData4() {
                       myGeoPositionGeoPicker({
                           returnFieldMap            : {'direccion_remitente' : '<ADDRESS>',
                                                        'cordenadas_remitente': '<LAT>,<LNG>'
                         },
                           langCode                : 'es',
                           startAddress            : 'Bucaramanga, Santander, Colombia'
                       });
                   }
               </script>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                       <div class="input-group demo2">
                         <input type="text" class="form-control"  id="direccion_remitente"  value="{{$servicios->direccion_remitente}}" placeholder="Dirección">
                        <input type="hidden" name="cordenadas_remitente" id="cordenadas_remitente">
                         <span class="input-group-addon"><a class="" onclick="lookupGeoData4();" href= "#" ><i class="fa fa-building"></i>  Capturar Dirección</a></span>
                     </div>

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control" id="barrio_remitente" value="{{$servicios->barrio_remitente}}" placeholder="Barrio">
                    </div>
                  </div>






            </div>


            <div class="col-md-6">

                {!!Form::label("representante_label",'Destinatario',['class'=>'control-label'])!!}
                <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                    <div class="input-group">
                      <input type="text" placeholder="Telefono"  id="telefono_destinatario" value="{{$servicios->telefono_destinatario}}" class="form-control">
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-primary">+</button></span>
                    </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control" id="nombre_destinatario"  value="{{$servicios->nombre_destinatario}}" placeholder="Destinatario">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control" id="centro_costos_destinatario" value="{{$servicios->centro_costos_destinatario}}" placeholder="Centro Costos ">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control" id="nit_destinatario" value="{{$servicios->nit_destinatario}}" placeholder="NIT ">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <script src="http://api.mygeoposition.com/api/geopicker/api.js" type="text/javascript"></script>
               <script type="text/javascript">
                   function lookupGeoData5() {
                       myGeoPositionGeoPicker({
                           returnFieldMap            : {'direccion_destinatario' : '<ADDRESS>',
                                                        'cordenadas_destinatario': '<LAT>,<LNG>'
                         },
                           langCode                : 'es',
                           startAddress            : 'Bucaramanga, Santander, Colombia'
                       });
                   }
               </script>
               <div class="input-group demo2">
                <input type="text" class="form-control" id="direccion_destinatario"  value="{{$servicios->direccion_destinatario}}" placeholder="Dirección">
                <input type="hidden" name="cordenadas_remitente" id="cordenadas_destinatario">
                 <span class="input-group-addon"><a class="" onclick="lookupGeoData5();" href= "#" ><i class="fa fa-building"></i>  Capturar Dirección</a></span>
             </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control" id="barrio_destinatario"  value="{{$servicios->barrio_destinatario}}"  placeholder="Barrio">
                  </div>
                </div>
            </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
            <?php
            $cantidad =0;
            ?>
            @foreach ($tipo_servicios as $tipo_servicio)
              <?php
              $descripcion = $tipo_servicio->descripcion;
              $cantidad =$cantidad+1;
              if($servicios->tipo_servicio==$tipo_servicio->id){


              ?>
              {!!link_to('#', $title = $descripcion, $attributes = ["id"=>"envio_servicio".$tipo_servicio->id,"class"=>"btn btn-primary", "value"=>$tipo_servicio->id], $secure = null)!!}
              <? }else{

              ?>


                {!!link_to('#', $title = $descripcion, $attributes = ["id"=>"envio_servicio".$tipo_servicio->id,"class"=>"btn btn-default", "value"=>$tipo_servicio->id], $secure = null)!!}
                <?php }
                ?>
            @endforeach
                  <div class="ln_solid"></div>
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
              <input type="text" class="form-control" data-toggle="tooltip" title="Largo del Paquete" name= "largo_paquete" value="{{$servicios->largo_paquete}}" id="largo_paquete" placeholder="Largo ">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
              <input type="text" class="form-control" data-toggle="tooltip" title="Ancho del Paquete" name= "ancho_paquete" value="{{$servicios->ancho_paquete}}" id="ancho_paquete" placeholder="Ancho ">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
              <input type="text" class="form-control" data-toggle="tooltip" title="Alto del Paquete" name= "alto_paquete" value="{{$servicios->alto_paquete}}"  id="alto_paquete" placeholder="Alto ">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
              {!!Form::number('name', 'value',['id'=>'peso_paquete','class'=>'form-control','data-toggle'=>'tooltip','title'=>'Peso Paquete','placeholder'=>'Peso'])!!}
              </div>
              <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
              <input type="text" class="form-control" id="valor_paquete"  data-toggle="tooltip"  name= "valor_paquete" value="{{$servicios->valor_paquete}}"  title="Valor Asegurado" placeholder="Valor Asegurado ">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
              <input type="text" class="form-control" id="seguro_paquete" data-toggle="tooltip"   name= "seguro_paquete" value="{{$servicios->seguro_paquete}}" title="Seguro del Paquete"  placeholder="Seguro Paquete">
              </div>
            </div>

            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                {!!Form::label("representante_label",'Codigo Contratista',['class'=>'control-label'])!!}
              </div>
              <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                  {!!Form::select('contratista',$contratistas,$servicios->contratista,['placeholder' => 'Seleccione un Valor...','class'=>'form-control', 'id'=>'contratista'])!!}
              </div>
              <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control" id="nombre_contratista" placeholder="" disabled="true">
              </div>
            </div>
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                {!!Form::label("representante_label",'Valor Servicio',['class'=>'control-label'])!!}
              </div>
              <div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
                <div class="input-group demo2">
                <input type="text" class="form-control" id="valor_servicio" name= "valor_servicio" value="{{$servicios->valor_servicio}}" placeholder="Valor del Servicio ">
                 <script type="text/javascript"
            src="http://maps.google.com/maps/api/js?sensor=false&language=es&libraries=geometry"></script>
            <script type="text/javascript">

            function calcular() {
            var pos_A = $('#cordenadas_remitente').val();
            var pos_B = $('#cordenadas_destinatario').val();
            console.log('Posicion A :'+ pos_A);
            console.log('Posicion B :'+ pos_B);
            console.log('obteniendo con Google :'+
            google.maps.geometry.spherical.computeDistanceBetween (pos_A, pos_B));
            };
            </script>
                  <span class="input-group-addon"><a class="" onclick="calcular();" href= "#" ><i class="fa fa-dollar"></i>  Calcular</a></span>
              </div>


              </div>
            </div>
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                {!!Form::label("representante_label",'Detalles del Paquete',['class'=>'control-label'])!!}
              </div>
              <div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control" id="detalle_envio" name= "detalle_envio" value="{{$servicios->detalle_envio}}"  placeholder="Detalles del Paquete ">
              </div>
            </div>

              <input type="hidden" name= "cantidad_servicios" value="{{$cantidad}}" id="cantidad_servicios">
            </div>
            <input type="hidden" name= "tipo_servicio" value="{{$servicios->tipo_servicio}}" id="tipo_servicio">
            <input type="hidden" name= "id_servicio" value="{{$servicios->id}}" id="id_servicio">

            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">

              <div class="col-md-4 col-sm-12 col-xs-12">
              <label class="radio-inline"><input type="radio" class="flat" <?php if($servicios->forma_pago==1)
              { echo "checked";} ?>   id="forma_pago1" value="1" name="forma_pago"><strong>Contado</strong></label>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
              <label class="radio-inline"><input type="radio" class="flat" id="forma_pago2" <?php if($servicios->forma_pago==2)
              { echo "checked";} ?>  value = "2" name="forma_pago"><strong>Credito</strong></label>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 text-right">




            <button type="submit" class="btn btn-app" href= "#"  ><i class="fa fa-check"></i> Procesar</button>


            </div>
            </p>

            </div>
            </div>
            {!! Form::close() !!}
            </div>
            </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
