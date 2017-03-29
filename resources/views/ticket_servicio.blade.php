@foreach ($servicios as $t)
  <strong>Fecha:</strong>{!!$t->fecha!!}
  <hr>
  <table  class="table .table-sm" WIDTH="100%">
    <tr>
      <td ><img style = "max-height:60px" src="images/logos/{{$empresa->logo}}" alt="{{$empresa->logo}}"></td>
    </tr>
    <tr>
      <td ><strong>{!!$empresa->nombre!!}</strong></td>
    </tr>
    <tr>
      <td><strong>{!!$empresa->nit!!}</strong></td>
    </tr>
    <tr>
      <td><strong>{!!$empresa->direccion!!}</strong></td>
    </tr>
    <tr>
      <td><strong>{!!$empresa->telefono1!!}</strong></td>
    </tr>
  </table>
<hr>
  <p><strong>Contratista:</strong> {!!$t->nombre_contratista!!}</p>
  <p><strong>Consecutivo:</strong> {!!$t->id!!}</p>
  <?php if ($t->forma_pago==1) {
    echo "<p><strong>Forma Pago:</strong> Contado</p>";
  }else {
    echo "<p><strong>Forma Pago:</strong> Credito</p>";      # code...
    }    # code...
  ?>
<hr>
  <table class="table .table-sm" WIDTH="100%">
    <tr>
      <td style="background-color:gray; text-align:center;"> Remitente</td>
    </tr>
    <tr>
      <td ><strong>Telefono: </strong>{!!$t->telefono_remitente!!}</td>
    </tr>
    <tr>
      <td><strong>Cliente: </strong>{!!$t->nombre_remitente!!}</td>
    </tr>
    <tr>
      <td><strong>Nit:</strong>{!!$t->nit_remitente!!}</td>
    </tr>
    <tr>
      <td><strong>Centro de Costo:</strong>{!!$t->centro_costos_destinatario!!}</td>
    </tr>
    <tr>
      <td><strong>Contacto:</strong>{!!$t->contacto_remitente!!}</td>
    </tr>
    <tr>
      <td><strong>Dirección:</strong>{!!$t->direccion_remitente!!}</td>
    </tr>
    <tr>
      <td><strong>Barrio:</strong>{!!$t->barrio_remitente!!}</td>
    </tr>
    <tr>
      <td style="background-color:gray; text-align:center;"> Destinatario</td>
    </tr>
    <tr>
      <td ><strong>Telefono: </strong>{!!$t->telefono_destinatario!!}</td>
    </tr>
    <tr>
      <td><strong>Cliente: </strong>{!!$t->nombre_destinatario!!}</td>
    </tr>
    <tr>
      <td><strong>Nit:</strong>{!!$t->nit_destinatario!!}</td>
    </tr>
    <tr>
      <td><strong>Centro de Costo:</strong>{!!$t->centro_costos_destinatario!!}</td>
    </tr>
    <tr>
      <td><strong>Contacto:</strong>{!!$t->contacto_destinatario!!}</td>
    </tr>
    <tr>
      <td><strong>Dirección:</strong>{!!$t->direccion_destinatario!!}</td>
    </tr>
    <tr>
      <td><strong>Barrio:</strong>{!!$t->barrio_destinatario!!}</td>
    </tr>
    <tr>
      <td style="background-color:gray; text-align:center;"> Detalle del Servicio</td>
    </tr>
    <tr>
      <td> {!!$t->detalle_envio!!}</td>
    </tr>

  <?php if(is_numeric($t->valor_servicio)){

  }else {
$t->valor_servicio=0;
  }?>
  <tr>
    <td><strong>Total: </strong> COP {!!number_format($t->valor_servicio, 2, ',', '.')!!}</td>
  </tr>
    </table>
<br>
<br>
<hr>

<table class="table .table-sm" WIDTH="100%">
  <tr>
    <td style="text-align:center;"> Firma </td>
  </tr>
</table>



@endforeach
