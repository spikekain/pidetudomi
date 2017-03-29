@extends('layouts.principal')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="row">
<div class="col-md-10 col-xs-12">
<div class="row">
  <div class="x_panel">
    <div class="x_title" style=" text-align:center;">

      <h4> <div class="col-md-2 col-xs-2 col-md-offset-4"><small>  Servicios en Espera:</small></div> <a href="#espera"><div id="color_espera" style=" text-align:center; background-color: #3366FF; color:#FFF;" class="col-md-3 col-xs-3"> <strong id = "total_servicios_espera">0</strong>
        </div> </a></h4>
      <div class="clearfix"></div>
    </div>
    <div  id="mensaje-success"  class="alert alert-success alert-dismissible" role="alert" style="display:none">
      <strong id="mensaje_label"></strong>
    </div>
    @if (count($errors)>0)
      <div class="alert alert-danger " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Datos Incompletos

          @foreach ($errors->all() as $error)
              <ul>
            {!!$error!!}
            </ul>
          @endforeach

      </div>
    @endif
  <div class="col-md-6">
    {!! Form::open(['method'=>'POST','id'=>'frminformacion', 'class'=>'form-horizontal form-label-left', 'files'=>true, "id"=>'frminformacion']) !!}
    {!!Form::label("representante_label",'Remitente',['class'=>'control-label'])!!}
        <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
            <div class="input-group">
              <input type="hidden" name= "_token" value="{{csrf_token()}}" id="token">
              <input type="text" placeholder="Telefono"  id="telefono_remitente" class="form-control input-sm">
              <span class="input-group-btn">
              <button type="button" id ="actualizar_cliente" class="btn btn-primary">Actualizar</button></span>
            </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
          <input type="text" class="form-control input-sm" id="nombre_remitente" placeholder="Cliente">
          </div>
        </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <select class="form-control input-sm" id='centro_costos_remitente' name="centro_costos_remitente">
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control input-sm" id="nit_remitente" placeholder="NIT">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control input-sm" id="contacto_remitente" placeholder="Contacto">
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
               <textarea class="form-control input-sm"  id="direccion_remitente" placeholder="Dirección"></textarea>
              <input type="hidden" name="cordenadas_remitente" id="cordenadas_remitente">
              <input type="hidden" value={{$name_user}} name="operario_nombre" id="operario_nombre">


          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
          <input type="text" class="form-control input-sm" id="barrio_remitente" placeholder="Barrio">
          </div>
        </div>
  </div>
  <div class="col-md-6">

      {!!Form::label("representante_label",'Destinatario',['class'=>'control-label'])!!}
      <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
          <div class="input-group">
            <input type="text" placeholder="Telefono"  id="telefono_destinatario" class="form-control input-sm">
            <span class="input-group-btn">
            <button type="button" class="btn btn-primary">+</button></span>
          </div>
      </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
        <input type="text" class="form-control input-sm" id="nombre_destinatario" placeholder="Destinatario">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
        <input type="text" class="form-control input-sm" id="centro_costos_destinatario" placeholder="Centro Costos ">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
        <input type="text" class="form-control input-sm" id="nit_destinatario" placeholder="NIT ">
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

      <textarea type="text" class="form-control input-sm" id="direccion_destinatario" placeholder="Dirección"></textarea>
      <input type="hidden" name="cordenadas_destinatario" id="cordenadas_destinatario">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
        <input type="text" class="form-control input-sm" id="barrio_destinatario" placeholder="Barrio">
        </div>
      </div>
  </div>

  <script type="text/javascript">

  function calcular() {

    Number.prototype.roundTo = function(num) {
        var resto = this%num;
        if (resto <= (num/2)) {
            return this-resto;
        } else {
            return this+num-resto;
        }
    }

     var porId=document.getElementById("ida_vuelta").checked;
    console.log(porId);
    var valor_ida_vuelta = {{$ida_vuelta}};

    if (porId)
    {
  valor_ida_vuelta=valor_ida_vuelta;
    }else{
      valor_ida_vuelta=0;
    }

  var valor_servicio =0;
  	var pos_A = $('#cordenadas_remitente').val();
    var pos_B = $('#cordenadas_destinatario').val();
    var pos1 =  pos_A.split(',');
    var lat1= pos1[0];
    var lon1= pos1[1];
    var pos2 =  pos_B.split(',');
    var lat2= pos2[0];
    var lon2= pos2[1];
    function _deg2rad(deg) {
     return deg * (Math.PI/180)
   }
   var R = 6371; // Radius of the earth in km 3963.191 in milles
    var dLat = _deg2rad(lat2-lat1);  // deg2rad below
    var dLon = _deg2rad(lon2-lon1);
    var a =
      Math.sin(dLat/2) * Math.sin(dLat/2) +
      Math.cos(_deg2rad(lat1)) * Math.cos(_deg2rad(lat2)) *
      Math.sin(dLon/2) * Math.sin(dLon/2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    var d = R * c; // Distance in km
    //alert(d.toFixed(3));
    var precio_base ={{$precio_base}};
    var precio_km = {{$precio_km}};
    var minimo_km = {{$minimo_km}};
    if (d>minimo_km){
    var valor_servicio =  precio_base + (precio_km * d);
  }else {
    var valor_servicio =  precio_base;
    }



  var tipo_servicio = $('#tipo_servicio').val();
  var aux= "costo_adicional";
  aux= aux.concat(tipo_servicio);
  //console.log(aux);
  //var valor_servicio =0;
  valor_servicio= 500 * Math.round(valor_servicio / 500);
  var adicional = 0 ;
  adicional= document.getElementById(aux).value;
  valor_servicio = parseInt(valor_servicio) + parseInt(adicional) + parseInt(valor_ida_vuelta);


   console.log(valor_servicio);

  //document.getElementById("valor_servicio").value=valor_servicio;
  $("#valor_servicio").val(valor_servicio);
   return valor_servicio;
  };
  </script>
      <div class="col-md-12 col-sm-12 col-xs-12">
  {!!Form::label("representante_label",'Tipo de Servicios',['class'=>'control-label'])!!}
</div>
    <div class="col-md-12 col-sm-12 col-xs-12">

<?php
$cantidad =0;
$m=0;
$tipo_por_defecto=0;
?>
  @foreach ($tipo_servicios as $tipo_servicio)
    <?php
    $m=$m+1;
    $descripcion = $tipo_servicio->descripcion;
    $cantidad =$cantidad+1;
    ?>
    <input type="hidden" name= "costo_adicional{{$tipo_servicio->id}}" value="{{$tipo_servicio->costo_adicional}}" id="costo_adicional{{$tipo_servicio->id}}">
    <?php
    if($m==1)
    {
      $tipo_por_defecto= $tipo_servicio->id;
      ?>
      {!!link_to('#', $title = $descripcion, $attributes = ["id"=>"envio_servicio".$tipo_servicio->id,"class"=>"btn btn-primary", "value"=>$tipo_servicio->id], $secure = null)!!}
      <?php
    }else {
      ?>
      {!!link_to('#', $title = $descripcion, $attributes = ["id"=>"envio_servicio".$tipo_servicio->id,"class"=>"btn btn-default", "value"=>$tipo_servicio->id], $secure = null)!!}
      <?php
      # code...
    }
    ?>

  @endforeach
  <br/>
    <br/>
    <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
  {!!Form::label("representante_label",'Detalle del Servicio',['class'=>'control-label'])!!}
</div>
  <div class="ln_solid"></div>

  <div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12 form-group ">
    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
      <select class="form-control input-sm" id='frecuente_control' placeholder="Servicio Frecuente">
       <option value="" disabled selected>Servicio Frecuente</option>
      </select>
    </div>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-12 form-group ">

    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
      <div class="input-group demo2">
      <input type="text" class="form-control input-sm"  name ="valor_servicio" id="valor_servicio" placeholder="Valor del Servicio ">
        <span class="input-group-addon"><a class="" onclick="calcular()" href= "#" ><i class="fa fa-dollar"></i> </a></span>
    </div>
    </div>
  </div>

  <div class="col-md-5 col-sm-5 col-xs-12 form-group ">
    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        {!!Form::select('contratista',$contratistas,null,['placeholder' => 'Contratista','class'=>'form-control input-sm', 'id'=>'contratista'])!!}
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
    <input type="text" class="form-control input-sm" id="nombre_contratista" placeholder="" disabled="true">
    </div>
  </div>
  </div>

    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
        <textarea class="form-control input-sm"  id="detalle_envio" placeholder="Detalle del Envio"></textarea>
      </div>




    <input type="hidden" name= "cantidad_servicios" value="{{$cantidad}}" id="cantidad_servicios">
  </div>
<input type="hidden" name= "tipo_servicio" value="{{$tipo_por_defecto}}" id="tipo_servicio">

<script type="text/javascript">
    function ida_vuelta_funcion(){
    var valor_detalle_envio = $('#detalle_envio').val();
    valor_detalle_envio= valor_detalle_envio.replace("Envio: Ida y Vuelta| ", "");
    var porId=document.getElementById("ida_vuelta").checked;
    if(porId)
    {
    valor_detalle_envio= "Envio: Ida y Vuelta| " + valor_detalle_envio;
    }
    $('#detalle_envio').val(valor_detalle_envio);
    calcular();
    }
    </script>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="container-fluid">


<div class="row">


    <div class="col-md-5 col-sm-5 col-xs-5 ">
      <div class = "panel panel-default">
   <div class = "panel-body">
     <label class="radio-inline input-sm"><strong> Forma de Pago:</strong> </label>
     <label class="radio-inline input-sm"><input type="radio" checked id="forma_pago1"  value="1" name="forma_pago">Contado</label>
     <label class="radio-inline input-sm"><input type="radio" id="forma_pago2" value="2" name="forma_pago">Credito</label>
   </div>
</div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12">
<div class = "panel panel-default">
  <div class = "panel-body">
    <label class="radio-inline input-sm"><input type="checkbox" id="ida_vuelta"  id="forma_pago1" OnClick="ida_vuelta_funcion()"  name = "ida_vuelta"  value="1" name="forma_pago"><strong>      Ida y Vuelta:</strong></label>
  </div>
</div>
</div>
  <div class="col-md-4 col-sm-4 col-xs-4 text-right">
  <a type ="reset" class="btn btn-app" href= "/home" id="CANCELAR" ><i class="glyphicon glyphicon-refresh"></i>Cancelar</a>
    <a class="btn btn-app" href= "#" id="envio_servicio" ><i class="glyphicon glyphicon-send"></i>Enviar</a>
    <a class="btn btn-app" href= "#" id="espera_servicio" ><i class="glyphicon glyphicon-hourglass"></i>Espera</a>
  </div>
</p>
</div>
</div>
  </div>
  <div class="row">
      <div class="container-fluid">
    <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
    <input type="text" class="form-control input-sm" data-toggle="tooltip" title="Largo del Paquete" id="largo_paquete" placeholder="Largo ">
    </div>
    <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
    <input type="text" class="form-control input-sm" data-toggle="tooltip" title="Ancho del Paquete" id="ancho_paquete" placeholder="Ancho ">
    </div>
    <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
    <input type="text" class="form-control input-sm" data-toggle="tooltip" title="Alto del Paquete" id="alto_paquete" placeholder="Alto ">
    </div>
    <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
    {!!Form::number('name', 'value',['id'=>'peso_paquete','class'=>'form-control input-sm','data-toggle'=>'tooltip','title'=>'Peso Paquete','placeholder'=>'Peso'])!!}
    </div>
    <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
    <input type="text" class="form-control input-sm" id="valor_paquete"  data-toggle="tooltip" title="Valor Asegurado" placeholder="Valor Asegurado ">
    </div>
    <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
    <input type="text" class="form-control input-sm" id="seguro_paquete" data-toggle="tooltip" title="Seguro del Paquete"  placeholder="Seguro Paquete">
    </div>
  </div>
  </div>
{!! Form::close() !!}
</div>
</div>
<div class="row">
<!-- Aqui Va la Segunda Linea -->
</div>

    </div>
    <div class="col-md-2 col-sm-12 col-xs-12">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel fixed_height_320 ">
          <div class="x_title">
                <h2>Llamadas Entrantes</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a href="/limpiar_llamadas_entrantes"  data-toggle="tooltip" title="Limpiar LLamadas" class=""><i class="fa fa-repeat"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
          <div class="x_content">
            <div class="dashboard-widget-content">
              <ul id="llamadas_entrantes" class="list-unstyled top_profiles scroll-view">
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel fixed_height_360 ">
          <div class="x_title">
            <h2>Contratistas </h2>
            <ul class="nav navbar-right panel_toolbox">
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="dashboard-widget-content">
              <ul id="lista_contratista" class="list-unstyled top_profiles scroll-view">
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    @include('espera')





  </div>

{!!Html::script('/js/script.js')!!}
@endsection
