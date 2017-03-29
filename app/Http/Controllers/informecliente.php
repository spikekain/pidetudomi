<?php

namespace mensajeria\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
      use Illuminate\Support\Facades\Auth;

class informecliente extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id_empresa=Auth::user()->empresa;
        $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista', 'servicios.dia')
        ->orderBy('servicios.id', 'asc')
          ->paginate(15);
       $tipo_servicios= \mensajeria\tipo_servicio::on($id_empresa)->where('id','>',0)->get();
      return view("informeclientes.index")->with(compact("tipo_servicios"))->with(compact("servicios"))->with('fecha_inicio',"") ->with('nombre_cliente',"");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }
    public function consulta(Request $request)
    {
    /*echo "fecha inicio:".$request->fecha_inicio;
    echo "telefono_remitente:".$request->telefono_cliente_reporte;
        echo "fecha fin:".$request->fecha_fin;
*/
  $id_empresa=Auth::user()->empresa;
$fecha =Carbon::parse($request->fecha_fin);
$ultimo_dia = $fecha->addDay();
$centro_costo=0;
if (is_numeric ($request->centro_costos_remitente))
{
$centro_costo=$request->centro_costos_remitente;
}else{
$centro_costo="";
}

if ($request->tipo_envio >0)
{
  if ($request->optradio=="Todo")
  {
    $servicios= \mensajeria\servicios::on($id_empresa)->where('telefono_remitente', '=', $request->telefono_cliente_reporte)
    ->whereBetween('fecha',array($request->fecha_inicio, $ultimo_dia))
    ->where('servicios.tipo_servicio','=',$request->tipo_envio)
    ->where('cobrado','=',0)
      ->where('servicios.centro_costo_remitente','=',$centro_costo)
    ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
    ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
    ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista', 'servicios.fecha','servicios.forma_pago', 'servicios.dia')
    ->orderBy('servicios.id', 'asc')
      ->paginate(15);
  }else{
    if ($request->optradio=="Contado")
    {
      $tipo_pago = "1";
    }else{
      $tipo_pago = "2";
    }
    $servicios= \mensajeria\servicios::on($id_empresa)->where('telefono_remitente', '=', $request->telefono_cliente_reporte)
    ->whereBetween('fecha',array($request->fecha_inicio, $ultimo_dia))
    ->where('servicios.tipo_servicio','=',$request->tipo_envio)
    ->where('servicios.forma_pago','=',$tipo_pago)
    ->where('cobrado','=',0)
      ->where('servicios.centro_costo_remitente','=',$centro_costo)
    ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
    ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
    ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista', 'servicios.fecha','servicios.forma_pago', 'servicios.dia')
    ->orderBy('servicios.id', 'asc')
      ->paginate(15);
  }


}else {

  if ($request->optradio=="Todo")
  {
    $servicios= \mensajeria\servicios::on($id_empresa)->where('telefono_remitente', '=', $request->telefono_cliente_reporte)
    ->whereBetween('fecha',array($request->fecha_inicio, $ultimo_dia))
    ->where('cobrado','=',0)
    ->where('servicios.centro_costo_remitente','=',$centro_costo)
    ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
    ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
    ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista', 'servicios.fecha','servicios.forma_pago', 'servicios.dia')
    ->orderBy('servicios.id', 'asc')
      ->paginate(15);
  }else{
    if ($request->optradio=="Contado")
    {
      $tipo_pago = "1";
    }else{
      $tipo_pago = "2";
    }
    $servicios= \mensajeria\servicios::on($id_empresa)->where('telefono_remitente', '=', $request->telefono_cliente_reporte)
    ->whereBetween('fecha',array($request->fecha_inicio, $ultimo_dia))
    ->where('cobrado','=',0)
    ->where('servicios.forma_pago','=',$tipo_pago)
    ->where('servicios.centro_costo_remitente','=',$centro_costo)
    ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
    ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
    ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista', 'servicios.fecha','servicios.forma_pago', 'servicios.dia')
    ->orderBy('servicios.id', 'asc')
      ->paginate(15);
  }


}

      $recorre_servicios = $servicios;
      $cantidad_total= 0;
      $cantidad_contado=0;
      $cantidad_credito=0;
      $total_general=0;
      $total_credito = 0;
      $total_contado= 0;
      foreach($recorre_servicios as $t){
        if($t->forma_pago==1)
        {
          $total_general=$t->valor_servicio + $total_general;
          $total_contado=$t->valor_servicio + $total_contado;
          $cantidad_contado=$cantidad_contado+1;
          $cantidad_total=$cantidad_total+1;
        }else{
          $total_general=$t->valor_servicio + $total_general;
          $total_credito=$t->valor_servicio + $total_credito;
          $cantidad_credito=$cantidad_credito+1;
          $cantidad_total=$cantidad_total+1;
        }
			}
   $tipo_servicios= \mensajeria\tipo_servicio::on($id_empresa)->where('id','>',0);
 return view("informeclientes.consulta")->with(compact("tipo_servicios"))->with(compact("servicios"))->with('fecha_inicio',$request->fecha_inicio) ->with('telefono_remitente',$request->telefono_remitente)->with('total_general',$total_general)->with('total_contado',$total_contado)->with('total_credito',$total_credito)->with('cantidad_contado',$cantidad_contado)->with('cantidad_credito',$cantidad_credito)->with('cantidad_total',$cantidad_total)->with('fecha_inicio',$request->fecha_inicio)->with('fecha_fin',$request->fecha_fin)->with('nombre_cliente',$request->telefono_cliente_reporte);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function generar_cartera(Request $request)
     {
         $id_empresa=Auth::user()->empresa;
            $carbon = new \Carbon\Carbon();
            $porcentaje_retencion= floatval( $request->porcentaje_retencion);
            $total_credito= floatval( $request->total_deuda);
            $total_deuda= floatval(  $request->total_deuda);

            \mensajeria\cartera::on($id_empresa)->insert([
           'cliente'=> $request->telefono_remitente,
           'fecha_inicio'=> $request->fecha_inicio,
           'fecha_fin'=> $request->fecha_fin,
           'total_credito'=>$total_credito ,
           'porcentaje_retencion'=> $porcentaje_retencion,
           'centro_costo'=>$request->centro_costos_remitente,
           'total_deuda'=> $total_deuda,
           'saldo'=> 0
         ]);

         $cartera=   \mensajeria\cartera::on($id_empresa)->where('id','>',0);
         $id_cartera =$cartera->last()->id;
         \mensajeria\detalles_cartera::on($id_empresa)->insert([
         'cartera'=> $id_cartera,
         'monto'=>  $total_deuda,
         'tipo'=>1,
         'descripcion'=>'Facturación de Servicios del Periodo '.  $request->fecha_inicio .' al '. $request->fecha_fin,
         'referencia'=> ''
         ]);


         $fecha =Carbon::parse($request->fecha_fin);
         $ultimo_dia = $fecha->addDay();

         $servicios= \mensajeria\servicios::on($id_empresa)->where('telefono_remitente', '=', $request->telefono_remitente)
         ->whereBetween('fecha',array($request->fecha_inicio, $ultimo_dia))
         ->update(['cobrado' => 1]);

         $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
         ->where(['cobrado' => 0])
         ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
         ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
         ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista')
         ->orderBy('servicios.id', 'asc')
           ->paginate(15);

//echo "telefono: ".$request->telefono_remitente;
        $tipo_servicios= \mensajeria\tipo_servicio::on($id_empresa)->where('id','>',0);
   return view("informeclientes.index")->with(compact("tipo_servicios"))->with(compact("servicios"))->with('fecha_inicio',"") ->with('nombre_cliente',"")->with('mensaje','store');



     }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
