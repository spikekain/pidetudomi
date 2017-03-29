
<table  class="table" WIDTH="100%">
  <tr>
    <td style="background-color:gray; text-align:center;" colspan="3"  >TIRILLA DE PAGO</td>
  </tr>
  <tr>
    <td style=" font-size: xx-small;"><strong>Contratista</strong>
    </td>
    <td colspan="2" style=" font-size: xx-small;" >{{$tabla_contratista->nombre}}  </td>
  </tr>
  <tr>
    <td style=" font-size: xx-small;"><strong>Fecha</strong>
    </td>
    <td colspan="2" style=" font-size: xx-small;" >{{$liquidacion->fecha_inicio}}  </td>
  </tr>
  <tr>
    <td colspan="3" style="background-color:gray; text-align:center;"> Detalles</td>
  </tr>
  <tr>
    <td style=" font-size: xx-small; text-align:center; "><strong>Cliente</strong>
    </td>
    <td style=" font-size: xx-small; text-align:center;"><strong>Forma Pago</strong>
    </td>
    <td style=" font-size: xx-small; text-align:center;"><strong>Valor</strong>
    </td>
  </tr>
@foreach ($servicios as $t)
  <tr >
    <?php
    $tipo_pago="";
    if($t->forma_pago==1)
    {
      $tipo_pago="Contado";
    }else{
      $tipo_pago="Credito";
    }
     ?>
    <td style=" font-size: xx-small;" ><span>{{$t->nombre_remitente}}</span></td>
    <td style="font-size: xx-small;" ><span>{{$tipo_pago}}</span></td>
    <td style=" font-size: xx-small;  text-align:right" ><span>{{number_format($t->valor_servicio,0,",",".")}}</span></td>
  </tr>
@endforeach
<tr>
  <td colspan="3" style="background-color:gray; text-align:center;"> Totales</td>
</tr>
<tr>
  <td  colspan="2"  style="font-size: xx-small;"><strong>Total Ventas</strong> </td><td style="font-size: xx-small; text-align:right">{{number_format($liquidacion->total_servicios,0,",",".")}}</td>
</tr>
<tr>
  <td  colspan="2" style="font-size: xx-small;"><strong>Comisión</strong> </td><td  style="font-size: xx-small;text-align:right">{{number_format($liquidacion->porcentaje_contratista,0,",",".")}} %</td>
</tr>
</table>
<br>
<table class="table" WIDTH="100%">
<tr>
  <td  colspan="2" style=" font-size: xx-small;"><strong>Efectivo</strong></td><td  style="font-size: xx-small; text-align:right"> {{$liquidacion->total_contado}}</td>
</tr>
<tr>
  <td  colspan="2" style=" font-size: xx-small;"><strong>Credito</strong></td><td  style="font-size: xx-small; text-align:right; border-bottom: 1px solid #000; "> {{$liquidacion->total_credito}}</td>
</tr>
<tr>
  <td  colspan="2" style=" font-size: xx-small;"><strong>Total Contratante</strong></td><td   style="font-size: xx-small; text-align:right"> {{$liquidacion->total_contratante}}</td>
</tr>
<tr>
  <td  colspan="2" style=" font-size: xx-small;"><strong>Total Contratista</strong></td><td   style="font-size: xx-small; text-align:right"> {{$liquidacion->total_contratista}}</td>
</tr>
</table>
<br>
<table class="table" WIDTH="100%">
  <tr>
    <td  colspan="2" style=" font-size: xx-small;"><strong>Ahorro</strong></td><td   style="font-size: xx-small; text-align:right"> {{$liquidacion->ahorro}}</td>
  </tr>
<tr>
  <td  colspan="2" style=" font-size: xx-small;"><strong>Seguridad</strong></td><td   style="font-size: xx-small; text-align:right"> {{$liquidacion->seguro}}</td>
</tr>
<tr>
  <td  colspan="2" style=" font-size: xx-small;"><strong>Comunicaciones</strong></td><td   style="font-size: xx-small; text-align:right; border-bottom: 1px solid #000;"> {{$liquidacion->alquiler}}</td>
</tr>
<tr>
  <td  colspan="2" style=" font-size: xx-small;"><strong>Total</strong></td><td   style="font-size: xx-small; text-align:right"><strong> {{$liquidacion->total_liquidacion}}</strong></td>
</tr>
</table>
