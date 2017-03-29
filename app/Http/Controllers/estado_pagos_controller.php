<?php

namespace mensajeria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class estado_pagos_controller extends Controller
{
    //
    public function index()
    {
      $id_empresa=Auth::user()->empresa;
       $collection = DB::connection($id_empresa)->select('select c.nombre, (select count(*) from servicios as s where s.contratista= c.id and s.forma_pago=1) as cantidad_contado , (select count(*) from servicios as s where s.contratista= c.id and s.forma_pago=2) as cantidad_credito, (select sum(s.valor_servicio) from servicios as s where s.contratista= c.id and s.forma_pago=1) as suma_contado , (select sum(s.valor_servicio) from servicios as s where s.contratista= c.id and s.forma_pago=2) as suma_credito, (select sum(s.valor_servicio) from servicios as s where s.contratista= c.id) as suma_total, (select sum(l.alquiler) from liquidacion as l where l.contratista= c.id) as alquiler , (select sum(l.ahorro) from liquidacion as l where l.contratista= c.id) as ahorro, (select sum(l.alquiler) from liquidacion as l where l.contratista= c.id) as alquiler, (select sum(s.valor_servicio * (100-s.utilidad)/100) from servicios as s where s.contratista= c.id) as utilidad_empresa, (select sum(s.valor_servicio * (s.utilidad)/100) from servicios as s where s.contratista= c.id) as utilidad_contratista , (select sum(l.monto_retencion) from liquidacion as l where l.contratista= c.id) as monto_retencion from contratistas as c where c.deleted_at is null ');

return view("estado_pagos.index")->with(compact("collection"));
    }
    public function consulta(Request $request)
    {
      $fecha_inicio2= $request->fecha_inicio;
      $fecha_fin2= $request->fecha_fin;
      $min = Carbon::createFromFormat('Y-m-d H:i:s', $request->fecha_inicio." 00:00:00" , 'America/Bogota');
  $max = Carbon::createFromFormat('Y-m-d H:i:s', $request->fecha_fin." 23:59:59" , 'America/Bogota');
      $fecha_inicio= $min;
      $fecha_fin = $max;
      $cantidad_servicio=0;
      $total_servicio=0;
      $utilidad_contratista=0;
      $utilidad_contratante=0;
      $cantidad_contado=0;
      $cantidad_credito=0;
      $total_contado=0;
      $total_credito=0;
      $total_alquiler=0;
      $total_ahorro=0;
      $total_retencion = 0;

$id_empresa=Auth::user()->empresa;

    //  echo $fecha_inicio . "·"  . $fecha_fin;
       $collection = DB::connection($id_empresa)->select('select c.nombre, c.id as id_contratista, (select count(*) from servicios as s where s.contratista= c.id and s.forma_pago=1 and fecha > :inicio and fecha < :fin) as cantidad_contado , (select count(*) from servicios as s where s.contratista= c.id and s.forma_pago=2 and fecha > :inicio1 and fecha < :fin1 ) as cantidad_credito, (select sum(s.valor_servicio) from servicios as s where s.contratista= c.id and s.forma_pago=1  and fecha > :inicio2 and fecha < :fin2 ) as suma_contado , (select sum(s.valor_servicio) from servicios as s where s.contratista= c.id and s.forma_pago=2  and fecha > :inicio3 and fecha < :fin3 ) as suma_credito, (select sum(s.valor_servicio) from servicios as s where s.contratista= c.id  and fecha > :inicio4 and fecha < :fin4  ) as suma_total, (select sum(l.alquiler) from liquidacion as l where l.contratista= c.id  and fecha > :inicio5 and fecha < :fin5 ) as alquiler , (select sum(l.ahorro) from liquidacion as l where l.contratista= c.id and fecha > :inicio6 and fecha < :fin6) as ahorro, (select sum(l.alquiler) from liquidacion as l where l.contratista= c.id and fecha > :inicio7 and fecha < :fin7) as alquiler, (select sum(s.valor_servicio * (100-s.utilidad)/100) from servicios as s where s.contratista= c.id and fecha > :inicio8 and fecha < :fin8) as utilidad_empresa, (select sum(s.valor_servicio * (s.utilidad)/100) from servicios as s where s.contratista= c.id and fecha > :inicio9 and fecha < :fin9) as utilidad_contratista , (select sum(l.monto_retencion) from liquidacion as l where l.contratista= c.id and fecha > :inicio10 and fecha < :fin10) as monto_retencion from contratistas as c where c.deleted_at is null' ,['inicio'=>$fecha_inicio, 'fin'=>$fecha_fin,'inicio1'=>$fecha_inicio, 'fin1'=>$fecha_fin,'inicio2'=>$fecha_inicio, 'fin2'=>$fecha_fin,'inicio3'=>$fecha_inicio, 'fin3'=>$fecha_fin,'inicio4'=>$fecha_inicio, 'fin4'=>$fecha_fin,'inicio5'=>$fecha_inicio, 'fin5'=>$fecha_fin,'inicio6'=>$fecha_inicio, 'fin6'=>$fecha_fin,'inicio7'=>$fecha_inicio, 'fin7'=>$fecha_fin ,'inicio8'=>$fecha_inicio, 'fin8'=>$fecha_fin ,'inicio9'=>$fecha_inicio, 'fin9'=>$fecha_fin ,'inicio10'=>$fecha_inicio, 'fin10'=>$fecha_fin ]);

       foreach($collection as $t){
            $cantidad_servicio= $t->cantidad_contado + $cantidad_servicio;
            $cantidad_servicio= $t->cantidad_credito + $cantidad_servicio;
            $cantidad_credito= $t->cantidad_credito + $cantidad_credito;
            $cantidad_contado= $t->cantidad_contado + $cantidad_contado;
            $total_contado= $total_contado + $t->suma_contado;
            $total_credito= $total_credito + $t->suma_credito;
            $total_servicio=$total_servicio+ $t->suma_total;
            $utilidad_contratista=$utilidad_contratista+ $t->utilidad_contratista;
            $utilidad_contratante= $utilidad_contratante +$t->utilidad_empresa;
            $total_ahorro= $total_ahorro + $t->ahorro;
            $total_alquiler= $total_alquiler + $t->alquiler;
            $total_ahorro= $total_ahorro + $t->ahorro;
            $total_retencion = $t->monto_retencion + $total_retencion;
          }
      return view("estado_pagos.consulta")->with(compact("collection"))->with('fecha_inicio',$fecha_inicio2)->with('fecha_fin',$fecha_fin2)->with('cantidad_servicio',$cantidad_servicio)->with('cantidad_credito',$cantidad_credito)->with('total_contado',$total_contado)->with('total_credito',$total_credito)->with('total_servicio',$total_servicio)->with('utilidad_contratista',$utilidad_contratista)->with('utilidad_contratante',$utilidad_contratante)->with('total_ahorro',$total_ahorro)->with('total_alquiler',$total_alquiler)->with('total_retencion',$total_retencion)->with('cantidad_contado',$cantidad_contado);
    }
    public function detalle($fecha_inicio,$fecha_fin,$id)
    {
      $id_empresa=Auth::user()->empresa;
      $fecha_inicio2= $fecha_inicio;
      $fecha_fin2= $fecha_fin;
      $min = Carbon::createFromFormat('Y-m-d H:i:s', $fecha_inicio." 00:00:00" , 'America/Bogota');
      $max = Carbon::createFromFormat('Y-m-d H:i:s', $fecha_fin." 23:59:59" , 'America/Bogota');
      $fecha_inicio= $min;
      $fecha_fin = $max;
      $cantidad_servicio=0;
      $total_servicio=0;
      $utilidad_contratista=0;
      $utilidad_contratante=0;
      $cantidad_contado=0;
      $cantidad_credito=0;
      $total_contado=0;
      $total_credito=0;
      $total_alquiler=0;
      $total_ahorro=0;
      $total_retencion = 0;
      $contratista = \mensajeria\Contratista::on($id_empresa)->find($id);
      $nombre_contratista = $contratista->nombre;



    //  echo $fecha_inicio . "·"  . $fecha_fin;
       $collection = DB::connection($id_empresa)->select('SELECT s_principal.dia, (select count(*) from servicios as s where s.forma_pago=1 and s.contratista= :contratista1 and dia >= s_principal.dia and dia <= s_principal.dia ) as cantidad_contado , (select count(*) from servicios as s where s.forma_pago=2 and s.contratista= :contratista2 and dia >= s_principal.dia and dia <= s_principal.dia ) as cantidad_credito, (select SUM(valor_servicio) from servicios as s where s.forma_pago=1 and s.contratista= :contratista10 and dia >= s_principal.dia and dia <= s_principal.dia ) as suma_contado, (select sum(valor_servicio) from servicios as s where s.forma_pago=2 and s.contratista=:contratista3 and dia >= s_principal.dia and dia <= s_principal.dia ) as suma_credito, (select sum(valor_servicio) from servicios as s where s.contratista= :contratista4 and dia >= s_principal.dia and dia <= s_principal.dia ) as suma_total, (select sum(l.alquiler) from liquidacion as l where l.contratista= :contratista5  and fecha >= s_principal.dia and fecha <=s_principal.dia ) as alquiler , (select sum(l.ahorro) from liquidacion as l where l.contratista= 8  and fecha > s_principal.dia and fecha <s_principal.dia ) as ahorro , (select sum(s.valor_servicio * (100-s.utilidad)/100) from servicios as s where s.contratista= :contratista6 and s.dia >= s_principal.dia and s.dia <=s_principal.dia) as utilidad_empresa , (select sum(s.valor_servicio * (s.utilidad)/100) from servicios as s where s.contratista= :contratista7 and s.dia >= s_principal.dia and s.dia <=s_principal.dia) as utilidad_contratista , (select sum(l.monto_retencion) from liquidacion as l where l.contratista= :contratista8 and fecha >= s_principal.dia and fecha <=s_principal.dia) as monto_retencion  FROM servicios as s_principal where dia >= :inicio and dia <= :fin and s_principal.contratista= :contratista9 group by dia',['inicio'=>$fecha_inicio, 'fin'=>$fecha_fin, 'contratista1'=>$id, 'contratista2'=>$id, 'contratista3'=>$id, 'contratista4'=>$id, 'contratista5'=>$id, 'contratista6'=>$id, 'contratista7'=>$id, 'contratista8'=>$id, 'contratista9'=>$id, 'contratista10'=>$id]);
       foreach($collection as $t){
            $cantidad_servicio= $t->cantidad_contado + $cantidad_servicio;
            $cantidad_servicio= $t->cantidad_credito + $cantidad_servicio;
            $cantidad_credito= $t->cantidad_credito + $cantidad_credito;
            $cantidad_contado= $t->cantidad_contado + $cantidad_contado;
            $total_contado= $total_contado + $t->suma_contado;
            $total_credito= $total_credito + $t->suma_credito;
            $total_servicio=$total_servicio+ $t->suma_total;
            $utilidad_contratista=$utilidad_contratista+ $t->utilidad_contratista;
            $utilidad_contratante= $utilidad_contratante +$t->utilidad_empresa;
            $total_ahorro= $total_ahorro + $t->ahorro;
            $total_alquiler= $total_alquiler + $t->alquiler;
            $total_ahorro= $total_ahorro + $t->ahorro;
            $total_retencion = $t->monto_retencion + $total_retencion;
          }
      return       view("estado_pagos.detalle")->with(compact("collection"))->with('fecha_inicio',$fecha_inicio2)->with('fecha_fin',$fecha_fin2)->with('cantidad_servicio',$cantidad_servicio)->with('cantidad_credito',$cantidad_credito)->with('total_contado',$total_contado)->with('total_credito',$total_credito)->with('total_servicio',$total_servicio)->with('utilidad_contratista',$utilidad_contratista)->with('utilidad_contratante',$utilidad_contratante)->with('total_ahorro',$total_ahorro)->with('total_alquiler',$total_alquiler)->with('total_retencion',$total_retencion)->with('cantidad_contado',$cantidad_contado)->with('nombre_contratista',$nombre_contratista);
    }
}
