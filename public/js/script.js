function cargar_llamadas(numero,id)
{
$('#telefono_remitente').val(numero);
console.log(  id );
var ruta = "/capturar_llamada/"+ id ;
  $.get(ruta,function() {
  console.log( "success" );
});

var textoBusqueda = $("#telefono_remitente").val();
var ruta = " /buscar/" +textoBusqueda  ;

      $.get(ruta,function(res){
            $("#nombre_remitente").val(res[0].nombre);
            $("#nit_remitente").val(res[0].nit);
            $("#direccion_remitente").val(res[0].direccion);
            $("#barrio_remitente").val(res[0].barrio);
            $("#contacto_remitente").val(res[0].contacto);
            $("#cordenadas_remitente").val(res[0].coordenadas);
            var id_cliente = res[0].id;
            var ruta2 = " /buscar_centro_costo/" +id_cliente  ;

            $("#centro_costos_remitente").empty();
            $.get(ruta2,function(res1){

              for(i=0;i<res1.length;i++)
              {
                $("#centro_costos_remitente").append("<option value='" + res1[i].id + "'>" +res1[i].nombre + "</option>");
              }
              });
              var ruta2 = " /buscar_frecuentes/" +id_cliente  ;

              $("#centro_costos_remitente").empty();
              $.get(ruta2,function(res1){

                for(i=0;i<res1.length;i++)
                {
                  $("#frecuente_control").append("<option value='" + +res1[i].descripcion + "'>" +res1[i].descripcion + "</option>");
                }
                });
      });

}



function mostrar(btn)
{
  $("#codigo_servicio_espera_procesado"). text(btn.value);
  $("#id_servicio_espera_procesado"). val(btn.value);
  var ruta = "/obtener_servicio_id/" +btn.value;
  console.log(ruta);

    $.get(ruta,function(res){

          $("#valor_servicio2").val(res.valor_servicio);
              $("#detalle_envio2").val(res.detalle_envio);
    });
}
function borrar_espera(btn)
{
    var ruta = "/borrar_servicio_espera/" +btn.value;


    $.get(ruta,function(res){
    $("#mensaje_label").html("Servicio Borrado");
    $("#mensaje-success").fadeIn();
    setTimeout(function(){ $("#mensaje-success").fadeOut(); }, 1000);
    });
}



$("#procesar_envio_espera2").click(function(){



    var token= $('#token_espera').val();
    var vector={};
    vector.id_servicio = $('#id_servicio_espera_procesado').val();
    vector.contratista= $('#contratista_modal').val();
    vector.detalle_envio= $('#detalle_envio2').val();
    vector.valor_servicio= $('#valor_servicio2').val();
    vector.impreso=0;
    if(confirm("Desea Imprimir el Comprobante")){
      vector.impreso=0;
    }else{
      vector.impreso=1;
    }

    vector.status=2
    var ruta = " /procesar_envio_espera";
    $.ajax({
      url:ruta,
      headers:{'X-CSRF-TOKEN':token, 'Access-Control-Allow-Origin': true},
      method:'post',
      dataType:'json',
      data:vector,
      success: function(){
      $("#mensaje_label").html("Servicio Enviado");
        $("#mensaje-success").fadeIn();
        setTimeout(function(){ $("#mensaje-success").fadeOut(); }, 1000);
        // window.open('/imprimir_servicios/' + vector.id_servicio,'','width=600,height=400,left=50,top=50,toolbar=yes');
         document.getElementById("frminformacion").reset();
         actualizar_servicios_espera();
      },
      error:function(msj){
        $("#mensaje_label_error").html(msj.responseJSON);
        $("#mensaje-error").fadeIn();
        setTimeout(function(){ $("#mensaje-error").fadeOut(); }, 1000);
      }
      });
    });

$('#contratista_reporte').change(function (event) {
  $("#nombre_contratista_reporte"). val('');
  var ruta = " /buscar_ccontratista_id/" +event.target.value;
    $.get(ruta,function(res){
        $("#nombre_contratista_reporte"). val(res.nombre);
      });
});
$('#telefono_cliente_reporte').focusout(function () {
  var textoBusqueda = $("#telefono_cliente_reporte").val();
    var ruta = "/buscar/" +textoBusqueda  ;
        $.get(ruta,function(res){
              $("#nombre_cliente_reporte").val(res[0].nombre);
                var id_cliente = res[0].id;
              var ruta2 = " /buscar_centro_costo/" +id_cliente  ;

              $("#centro_costos_remitente").empty();
              $.get(ruta2,function(res1){
                for(i=0;i<res1.length;i++)
                {
                  $("#centro_costos_remitente").append("<option value='" + res1[i].id + "'>" + res1[i].nombre + "</option>");
                }
                });
        });
  });
  $("#porcentaje_retencion").focusout(function(){
    var porcentaje =  $("#porcentaje_retencion").val();
    var total_credito=  $("#total_credito").val();
    var monto_porcentaje= (porcentaje/100) * total_credito;
    var total_deuda = total_credito- monto_porcentaje;
		$('#total_deuda').val(total_deuda);
	});

$('#telefono_remitente').focusout(function () {
  var textoBusqueda = $("#telefono_remitente").val();
var ruta = " /buscar/" +textoBusqueda  ;

        $.get(ruta,function(res){
              $("#nombre_remitente").val(res[0].nombre);
              $("#nit_remitente").val(res[0].nit);
              $("#direccion_remitente").val(res[0].direccion);
              $("#barrio_remitente").val(res[0].barrio);
              $("#contacto_remitente").val(res[0].contacto);
              $("#cordenadas_remitente").val(res[0].coordenadas);
              var id_cliente = res[0].id;
              var ruta2 = " /buscar_centro_costo/" +id_cliente  ;

              $("#centro_costos_remitente").empty();
              $.get(ruta2,function(res1){

                for(i=0;i<res1.length;i++)
                {
                  $("#centro_costos_remitente").append("<option value='" + res1[i].id + "'>" +res1[i].nombre + "</option>");
                }
                });
                var ruta2 = " /buscar_frecuentes/" +id_cliente  ;

                $("#centro_costos_remitente").empty();
                $.get(ruta2,function(res1){

                  for(i=0;i<res1.length;i++)
                  {
                    $("#frecuente_control").append("<option value='" + +res1[i].descripcion + "'>" +res1[i].descripcion + "</option>");
                  }
                  });
        });
  });
  $('#frecuente_control').change(function (event) {
    var ruta3 = $('#frecuente_control option:selected').html();
    console.log(ruta3);
    $('#detalle_envio').val(ruta3);
  });

  $('#centro_costos_remitente').change(function (event) {
    var ruta3 = " /buscar_centro_costo_id/" +event.target.value;

      $.get(ruta3,function(res2){
          $("#contacto_remitente").val(res2[0].contacto);
          $("#frecuente").val(res2[0].frecuente);
          $("#contratista"). val( res2[0].id_contratista).change();
        });
  });
  $('#contratista').change(function (event) {
    $("#nombre_contratista"). val('');
    var ruta = " /buscar_ccontratista_id/" +event.target.value;
      $.get(ruta,function(res){
          $("#nombre_contratista"). val(res.nombre);
        });
  });
  //Funciones de Liquidacion;
    function totalizar_liquidacion(){
    var porcentaje_contratista_liquidacion= parseFloat( $("#porcentaje_contratista_liquidacion"). val().replace(".", ""));
    if(porcentaje_contratista_liquidacion>100)
    {
      $("#porcentaje_contratista_liquidacion"). val(0);
       porcentaje_contratista_liquidacion= parseFloat( $("#porcentaje_contratista_liquidacion"). val().replace(".", ""));
    }
    var porcentaje_contratante_liquidacion= 100 -porcentaje_contratista_liquidacion;
    $("#porcentaje_contratante_liquidacion"). val(100 -porcentaje_contratista_liquidacion);

      var total_servicios_liquidacion= parseFloat( $("#total_servicios_liquidacion"). val().replace(".", ""));
      var total_contado_liquidacion= parseFloat( $("#total_contado_liquidacion"). val().replace(".", ""));
      var total_credito_liquidacion= parseFloat( $("#total_credito_liquidacion"). val().replace(".", ""));
      var monto_total_utilidad_liquidacion =(porcentaje_contratista_liquidacion*total_servicios_liquidacion)/100;
      var monto_total_utilidad_contratante_liquidacion = (porcentaje_contratante_liquidacion*total_servicios_liquidacion)/100;

      $("#monto_total_utilidad_liquidacion"). val((porcentaje_contratista_liquidacion*total_servicios_liquidacion)/100);
      $("#monto_total_utilidad_contratante_liquidacion"). val((porcentaje_contratante_liquidacion*total_servicios_liquidacion)/100);
      var total_pago_contratista= 0;
      total_pago_contratista = total_contado_liquidacion - monto_total_utilidad_liquidacion;
      var total_pago_contratante= 0;
      total_pago_contratante = total_credito_liquidacion - monto_total_utilidad_contratante_liquidacion;
      if (total_pago_contratante>0)
      {
      total_pago_contratante = total_pago_contratante;
      total_pago_contratista=0
      }else{
      total_pago_contratista = total_pago_contratista;
      total_pago_contratante= 0;
      }
        $("#total_pago_contratista"). val(total_pago_contratista);
        $("#total_pago_contratante"). val(total_pago_contratante);
        var abono_prestamo_liquidacion= parseFloat( $("#abono_prestamo_liquidacion"). val().replace(".", ""));
        var total_base_contratista= parseFloat( $("#total_base_contratista"). val().replace(".", ""));
        var abono_contratista_liquidacion= parseFloat( $("#abono_contratista_liquidacion"). val().replace(".", ""));
        var alquiler_equipos_liquidacion= parseFloat( $("#alquiler_equipos_liquidacion"). val().replace(".", ""));
        var total_liquidacion =0;
        if (total_pago_contratante > 0){
        total_liquidacion = total_pago_contratante - (abono_prestamo_liquidacion + total_base_contratista + abono_contratista_liquidacion + alquiler_equipos_liquidacion );
        }else{
        total_liquidacion = total_pago_contratista + (abono_prestamo_liquidacion + total_base_contratista + abono_contratista_liquidacion + alquiler_equipos_liquidacion );
        }

        $("#total_liquidacion"). val(total_liquidacion);
    }
  $("#actualizar_cliente").click(function(){

//actualizar cliente

var token= $('#token').val();
var vector={};
vector.telefono_remitente= $('#telefono_remitente').val();
vector.nombre_remitente= $('#nombre_remitente').val();
vector.centro_costo_remitente= $('#centro_costos_remitente').val();
vector.nit_remitente= $('#nit_remitente').val();
vector.contacto_remitente= $('#contacto_remitente').val();
vector.direccion_remitente= $('#direccion_remitente').val();
vector.barrio_remitente= $('#barrio_remitente').val();
vector.coordenadas= $('#cordenadas_remitente').val();

var ruta = "/actualizar_clientes";
$.ajax({
  url:ruta,
  headers:{'X-CSRF-TOKEN':token , 'Access-Control-Allow-Origin': true },
  method:'post',
  dataType:'json',
  data:vector,
  success: function(){
  alert("Cliente Actualizado");
  },
  error:function(msj){
  alert("Error al actualizar el cliente");
  }
  });
  });

  $('#porcentaje_contratista_liquidacion').change(function (event) {
  totalizar_liquidacion();
  });
  $('#abono_prestamo_liquidacion').change(function (event) {
  totalizar_liquidacion();
  });
  $('#total_base_contratista').change(function (event) {
  totalizar_liquidacion();
  });
  $('#abono_contratista_liquidacion').change(function (event) {
  totalizar_liquidacion();
  });
  $('#alquiler_equipos_liquidacion').change(function (event) {
  totalizar_liquidacion();
  });
  $('#contratista_modal').change(function (event) {
    $("#nombre_contratista_modal"). val('');
    var ruta = " /buscar_ccontratista_id/" +event.target.value;
      $.get(ruta,function(res){
          $("#nombre_contratista_modal"). val(res.nombre);
        });
  });

// FUNCION READY PARA EJECUTAR EL SCRIPT PRINCIPAL
  $( document ).ready(function() {
var input = document.getElementById('barrio_remitente');
var input2 = document.getElementById('barrio_destinatario');
    var defaultBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(4, -75),
    new google.maps.LatLng(8,-65));
  var options = {
  bounds: defaultBounds,
 componentRestrictions: {country: 'co'}
  };

autocomplete = new google.maps.places.Autocomplete(input, options);
autocomplete.addListener('place_changed', fillInAddress);
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
  var cordenadas = place.geometry.location.lat()+","+ place.geometry.location.lng();
 $("#cordenadas_remitente").val(cordenadas);
      console.log(cordenadas);

}

autocomplete2 = new google.maps.places.Autocomplete(input2, options);
autocomplete2.addListener('place_changed', fillInAddress2);
function fillInAddress2() {
  // Get the place details from the autocomplete object.
  var place = autocomplete2.getPlace();
  var cordenadas = place.geometry.location.lat()+","+ place.geometry.location.lng();
  $("#cordenadas_destinatario").val(cordenadas);
  //

}

    var servicios= parseInt( $('#cantidad_servicios').val())+1;
    for(i=0; i<=servicios; i++)
    {
      $("#envio_servicio"+ i).click(function(){
      if ( $(this).hasClass('btn btn-primary') ) {
      }else {
        var servicios2= parseInt( $('#cantidad_servicios').val())+1;
        for(j=0; j<=servicios2; j++)
        {
            $("#envio_servicio"+ j).removeClass('btn btn-primary');
            $("#envio_servicio"+ j).addClass('btn btn-default');
        }
        var str=  $(this).attr('id');

         str = str.replace("envio_servicio", "");
        $("#tipo_servicio"). val( str  );

        $(this).removeClass('btn btn-default');
        $(this).addClass('btn btn-primary');
      }
      });

// otro boton

      $("#cantidad_servicio_boton_"+ i).click(function(){
      if ( $(this).hasClass('btn btn-primary') ) {
      }else {
        var servicios2= parseInt( $('#cantidad_servicios').val())+1;
        for(j=0; j<=servicios2; j++)
        {
            $("#cantidad_servicio_boton_"+ j).removeClass('btn btn-primary');
            $("#cantidad_servicio_boton_"+ j).addClass('btn btn-default');
        }
        $(this).removeClass('btn btn-default');
        $(this).addClass('btn btn-primary');

         var str=  $(this).attr('id');
         str = str.replace("cantidad_servicio_boton_", "");
         $("#tipos_servicios_espera").val(str);

      }
      });
    }

    function actualizar_contratistas(){
      var ruta = "/lista_contratistas/" ;
        $.get(ruta,function(res){
          $("#lista_contratista").empty();
          for (i=0;i<res.length; i++){
          $("#lista_contratista").append('<li class="media event"> <a class="pull-left border-aero profile_thumb"> <i class="fa fa-user aero"></i> </a>  <div class="media-body">  <a class="title" href="#">('+ res[i].codigo + ') ' + res[i].nombre +'</a> <p><strong>Ubicación: </strong></p>  <p> <small>Ultimo Servicio: </small> ' + res[i].ultimo_servicio + '  </p> </div> </li>');
          }
          });
    }
    function actualizar_llamadas(){
      var ruta = "/llamadas_entrantes/" ;
        $.get(ruta,function(res){
        function cargar_llamada()
        {
        console.log ("Hola");
        }

          $("#llamadas_entrantes").empty();
          for (i=0;i<res.length; i++){
          $("#llamadas_entrantes").append('<li class="media event">   <div  class="media-body">  <p><a OnClick="cargar_llamadas('+ res[i].numero + ',' + res[i].id + ')" class="title"  href="#">Linea :<small>'+ res[i].linea + ' </small> Tel:  <small>'+ res[i].numero + '</small></p> <p>Cliente:  ' + res[i].nombre +' </p> <p>Dir:<small>' + res[i].direccion +'</small> </p> </div> </li>');
          }
          });
    }

function actualizar_servicios_espera(){
        var servicios= parseInt( $('#cantidad_servicios').val())+1;
        var  ruta0 ="/servicios_espera/";


              //  $('#cantidad_servicio0').html('');
                $.get(ruta0,function(res){
                if (res.length>0)
                {
                $('#cantidad_servicio0').html(res.length);
                }else{
                $('#cantidad_servicio0').html();
                }
                  });
        for(j=1; j<=servicios; j++)
        {


        var ruta1 = "/servicios_espera_tipo/"+j;
      //  $('#cantidad_servicio'+ j).html('');
        $.get(ruta1,function(res){
        if (res.length>0)
        {
        $('#cantidad_servicio'+ res[0].tipo_servicio).html(res.length);
        }else{
        $('#cantidad_servicio'+ res[0].tipo_servicio).html();
        }
          });
        }
        var tipo_servicio_espera =    $("#tipos_servicios_espera").val();
        if (tipo_servicio_espera>0)
        {
          var ruta = "/servicios_espera_tipo/" + tipo_servicio_espera ;

        }else {
          var ruta = "/servicios_espera/" ;
        }



        $.get(ruta,function(res){
          $('#total_servicios_espera').html(res.length) ;
          if(res.length>0)
          {
            $('#color_espera').attr("style", " background-color: #BF1720; color:#FFF; text-decoration: none;");
          }else {
            $('#color_espera').attr("style", " background-color: #3366FF ; color:#FFF;");

          }
          $("#servicios_espera").empty();
          for (i=0;i<res.length; i++){
            var fecha = res[i].fecha;
          $("#servicios_espera").append('<tr><td  colspan="3" > <strong>Hora del Servicio:</strong> '+  fecha+ ' </td><td bgcolor="#' + res[i].color +'"></td></tr> <tr  ><td><table  style="width:100%;"> <tr> <td style = "width: 40%;" ><strong> Telefóno:</strong> </td> <td style = "width: 60%;" >' + res[i].telefono_remitente +'</td>  </tr> <tr> <td> <strong> Nombre Remitente</td><td> ' + res[i].nombre_remitente + '</td> </tr>   <tr>     <td><strong>Centro Costo:</strong> </td></tr><tr> <td ><strong>Contacto:</strong> </td> <td > ' +  res[i].contacto_remitente +'</td>    </tr>   <tr>     <td ><strong> Dirección:</strong></td>     <td >' +  res[i].direccion_remitente +'</td>   </tr>    <tr>     <td ><strong>Barrio</strong></td>      <td >' +  res[i].barrio_remitente +'</td>   </tr> </table>  </td> <td><table  style="width:100%;" > <tr> <td style = "width: 40%;"><strong>Telefóno:</strong> </td> <td style = "width: 60%;" >' + res[i].telefono_destinatario +'</td>   </tr> <tr> <td> <strong> Nombre Destinatario</strong></td><td> ' + res[i].nombre_destinatario + '</td> </tr>   <tr><td><strong>Centro Costo</strong></td> <td >' +  res[i].centro_costos_destinatario + '</td>  <tr> <td ><strong>Contacto</strong></td> <td > ' +  res[i].contacto_destinatario +'</td>    </tr>   <tr>     <td ><strong>Dirección:</strong></td>     <td >' +  res[i].direccion_destinatario +'</td>   </tr>    <tr>     <td ><strong>Barrio</strong></td>      <td>' +  res[i].barrio_destinatario +'</td>   </tr> </table></td>   <td>  <table style="width:100%;" > <tr> <td><strong>Valor del Servicio:</strong> </td> <td>' + res[i].valor_servicio +'</td> </tr>      <tr>     <td ><strong>Detalle del Envio:<strong></td>   <td>' +  res[i].detalle_envio +'</td>   </tr>     </table></td ><td width="15%" align="center"><div class= "btn-group">      <input type="image"  style = "max-height:60px" src="images/accept.png"  value="' +  res[i].id +'" data-toggle="modal" data-target="#myModal"  OnClick="mostrar(this)" id="procesar_envio_espera" >  </input><input  style = "max-height:60px" type="image"  src="images/delete1.png"  value="' +  res[i].id +'" OnClick="borrar_espera(this)" type="submit"   href= "#" id="eliminar_envio_espera" ></input> </div> </td> </tr>');
          }
          });
    }

    setInterval(actualizar_contratistas, 10000);
    setInterval(actualizar_servicios_espera, 4000);
    setInterval(actualizar_llamadas, 1500);



  });
$('#envio_servicio').click(function(){
    var token= $('#token').val();
    var vector={};
    vector.telefono_remitente= $('#telefono_remitente').val();
    vector.nombre_remitente= $('#nombre_remitente').val();
    vector.centro_costo_remitente= $('#centro_costos_remitente').val();
    vector.nit_remitente= $('#nit_remitente').val();
    vector.contacto_remitente= $('#contacto_remitente').val();
    vector.direccion_remitente= $('#direccion_remitente').val();
    vector.barrio_remitente= $('#barrio_remitente').val();
    vector.telefono_destinatario= $('#telefono_destinatario').val();
    vector.nombre_destinatario= $('#nombre_destinatario').val();
    vector.centro_costo_destinatario= $('#centro_costos_destinatario').val();
    vector.nit_destinatario= $('#nit_destinatario').val();
    vector.direccion_destinatario= $('#direccion_destinatario').val();
    vector.contacto_destinatario= $('#contacto_destinatario').val();
    vector.barrio_destinatario= $('#barrio_destinatario').val();
    vector.alto_paquete= $('#alto_paquete').val();
    vector.largo_paquete= $('#largo_paquete').val();
    vector.ancho_paquete= $('#ancho_paquete').val();
    vector.peso_paquete= $('#peso_paquete').val();
    vector.valor_paquete= $('#valor_paquete').val();
    vector.seguro_paquete= $('#seguro_paquete').val();
    vector.contratista= $('#contratista').val();
    vector.detalle_envio= $('#detalle_envio').val();
    vector.valor_servicio= $('#valor_servicio').val();
    vector.tipo_servicio= $('#tipo_servicio').val();
    vector.coordenadas= $('#cordenadas_remitente').val();
    vector.operario= $('#operario_nombre').val();
    vector.forma_pago=$('input:radio[name=forma_pago]:checked').val();
    vector.impreso=0;
    if(confirm("Desea Imprimir el Comprobante")){
      vector.impreso=0;
    }else{
      vector.impreso=1;
    }
    vector.status=1;
    var ruta = "/enviar_servicio";
    $.ajax({
      url:ruta,
      headers:{'X-CSRF-TOKEN':token , 'Access-Control-Allow-Origin': true },
      method:'post',
      dataType:'json',
      data:vector,
      success: function(){
        $("#mensaje_label").html("Servicio Enviado");
        $("#mensaje-success").fadeIn();
        setTimeout(function(){ $("#mensaje-success").fadeOut(); }, 1000);
        $("#centro_costos_remitente").empty();
          $("#frecuente_control").empty();
         document.getElementById("frminformacion").reset();
      //   window.open('/ultimo_servicio','','width=600,height=400,left=50,top=50,toolbar=yes');
      },
      error:function(msj){
        $("#mensaje_label_error").html(msj.responseJSON);
        $("#mensaje-error").fadeIn();
        setTimeout(function(){ $("#mensaje-error").fadeOut(); }, 1000);
      }
      });
  });

  $('#espera_servicio').click(function(){
  var token= $('#token').val();
  var vector={};
  vector.telefono_remitente= $('#telefono_remitente').val();
  vector.nombre_remitente= $('#nombre_remitente').val();
  vector.centro_costo_remitente= $('#centro_costos_remitente').val();
  vector.nit_remitente= $('#nit_remitente').val();
  vector.contacto_remitente= $('#contacto_remitente').val();
  vector.direccion_remitente= $('#direccion_remitente').val();
  vector.barrio_remitente= $('#barrio_remitente').val();
  vector.telefono_destinatario= $('#telefono_destinatario').val();
  vector.nombre_destinatario= $('#nombre_destinatario').val();
  vector.centro_costo_destinatario= $('#centro_costos_destinatario').val();
  vector.nit_destinatario= $('#nit_destinatario').val();
  vector.direccion_destinatario= $('#direccion_destinatario').val();
  vector.contacto_destinatario= $('#contacto_destinatario').val();
  vector.barrio_destinatario= $('#barrio_destinatario').val();
  vector.alto_paquete= $('#alto_paquete').val();
  vector.largo_paquete= $('#largo_paquete').val();
  vector.ancho_paquete= $('#ancho_paquete').val();
  vector.peso_paquete= $('#peso_paquete').val();
  vector.valor_paquete= $('#valor_paquete').val();
  vector.seguro_paquete= $('#seguro_paquete').val();
  vector.contratista= $('#contratista').val();
  vector.detalle_envio= $('#detalle_envio').val();
  vector.valor_servicio= $('#valor_servicio').val();
  vector.tipo_servicio= $('#tipo_servicio').val();
  vector.coordenadas= $('#cordenadas_remitente').val();
  vector.operario= $('#operario_nombre').val();
  vector.forma_pago=$('input:radio[name=forma_pago]:checked').val();
  vector.status=2;
  var ruta = "/enviar_servicio_espera2";
  $.ajax({
    url:ruta,
    headers:{'X-CSRF-TOKEN':token , 'Access-Control-Allow-Origin': true },
    method:'post',
    dataType:'json',
    data:vector,
    success: function(){
      $("#mensaje_label").html("Servicio Enviado");
      $("#mensaje-success").fadeIn();

        $("#frecuente_control").empty();
      $("#centro_costos_remitente").empty();
      setTimeout(function(){ $("#mensaje-success").fadeOut(); }, 1000);
       document.getElementById("frminformacion").reset();


    },
    error:function(msj){
      $("#mensaje_label_error").html(msj.responseJSON);
      $("#mensaje-error").fadeIn();
      setTimeout(function(){ $("#mensaje-error").fadeOut(); }, 1000);
    }
    });
    });
