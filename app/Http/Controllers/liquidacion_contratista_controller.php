<?php

namespace mensajeria\Http\Controllers;

use Illuminate\Http\Request;

use App;
use PDF;
use SebastianBergmann\Diff\LCS\TimeEfficientImplementation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class liquidacion_contratista_controller extends Controller
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
       if(isset($request->contratista))
      {


        $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
        ->where('contratista', '=', $request->contratista_reporte)
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista','servicios.fecha')
        ->orderBy('servicios.id', 'asc')
          ->paginate(15);
      }else {
        $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista', 'servicios.fecha','servicios.id')
        ->orderBy('servicios.id', 'asc')
          ->paginate(15);
      }
        $contratistas= \mensajeria\Contratista::on($id_empresa)->pluck('codigo','id');
        //echo $request;
       return view("liquidacion_contratistas.index")->with(compact("contratistas"))->with(compact("servicios"));

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
     public function detalle_tirilla()
     {

     }
     public function imprimir_tirilla($id)
     {
         $id_empresa=Auth::user()->empresa;

       $liquidacion= \mensajeria\liquidacion::on($id_empresa)->find($id);


        $min = Carbon::createFromFormat('Y-m-d H:i:s', $liquidacion->fecha_inicio." 00:00:00" , 'America/Bogota');
        $max = Carbon::createFromFormat('Y-m-d H:i:s', $liquidacion->fecha_fin." 23:59:59" , 'America/Bogota');
       $contratista= $liquidacion->contratista;
       $tabla_contratista = \mensajeria\Contratista::on($id_empresa)->find($contratista);
       $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
       ->where('contratista', '=',$contratista)
       ->whereBetween('servicios.fecha',array($min, $max))
       ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
       ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
       ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista','servicios.fecha','servicios.forma_pago','contratistas.utilidad', 'contratistas.abono', 'contratistas.descuento', 'contratistas.codigo as codigo_contratista','servicios.id')
       ->orderBy('servicios.id', 'asc')->get();

       $empresa= \mensajeria\empresa::on($id_empresa)->find(1);
       $view =  \View::make('tirilla_pago')->with(compact("servicios"))->with(compact("liquidacion"))->with(compact("empresa"))->with(compact("tabla_contratista"))->render();
       $pdf = App::make('dompdf.wrapper');
         $pdf->loadhtml($view)->setPaper('8.5x14', 'portrait');
         return $pdf->stream('cuenta_cobro.pdf')
                ->header('Content-Type','application/pdf');


     }
    public function store(Request $request)
    {
      IF (is_numeric($request->porcentaje_retencion_liquidacion))
      {
        $porcentaje_retencion= $request->porcentaje_retencion_liquidacion;
      }else{
        $porcentaje_retencion=0;
      }
       $id_empresa=Auth::user()->empresa;
      \mensajeria\liquidacion::on($id_empresa)->insert([
          'contratista'=> $request->contratista,
          'fecha_inicio'=> $request->fecha_inicio,
          'fecha_fin'=> $request->fecha_fin,
          'cantidad_servicio'=> $request->cantidad_servicios_liquidacion,
          'cantidad_contado'=> $request->cantidad_contado_liquidacion,
          'cantidad_credito'=> $request->cantidad_credito_liquidacion,
          'porcentaje_contratista'=> $request->porcentaje_contratista_liquidacion,
          'porcentaje_contratante'=> $request->porcentaje_contratante_liquidacion,
          'porcentaje_retencion'=>$porcentaje_retencion ,
          'total_servicios'=> $request->total_servicios_liquidacion,
          'total_contado'=> $request->total_contado_liquidacion,
          'total_credito'=> $request->total_credito_liquidacion,
          'monto_retencion'=> $request->monto_retencion_liquidacion,
          'utilidad_contratista'=> $request->monto_total_utilidad_liquidacion,
          'utilidad_contratante'=> $request->monto_total_utilidad_contratante_liquidacion,
          'total_contratante'=> $request->total_pago_contratante,
          'total_contratista'=> $request->total_pago_contratista,
          'abono_prestamo'=>$request->abono_prestamo_liquidacion,
          'base'=> $request->total_base_contratista,
          'ahorro'=> $request->abono_contratista_liquidacion,
          'alquiler'=> $request->alquiler_equipos_liquidacion,
          'fecha'=>Carbon::now(),
          'seguro'=> $request->seguro_liquidacion,
          'total_liquidacion'=> $request->total_liquidacion
      ]);
      if ($request->abono_prestamo_liquidacion>0 )
      {
          \mensajeria\abono_prestamo::on($id_empresa)->insert([
            'contratista'=>$request->contratista,
            'monto'=>$request->abono_prestamo_liquidacion
          ]);
          $prestamos= \mensajeria\prestamos::on($id_empresa)->where('contratista', '=',  $request->contratista)
          ->where('prestamos.saldo','>',0)
        ->join('contratistas', 'contratistas.id', '=', 'prestamos.contratista')
        ->select('contratistas.nombre', 'contratistas.codigo', 'prestamos.descripcion','prestamos.fecha','prestamos.monto', 'prestamos.saldo','prestamos.id')
        ->get();

        $total_abono = $request->abono_prestamo_liquidacion;
        $recorre_servicios = $prestamos;
        $cantidad= 0;
        $total=0;
        foreach($recorre_servicios as $t){
          if($total_abono > $t->saldo)
          {
            $actualizado = \mensajeria\prestamos::on($id_empresa)->find($t->id);
            $actualizado->saldo = 0;
            $actualizado->save();
            $total_abono= $total_abono- $t->saldo;
          }else{
            $actualizado = \mensajeria\prestamos::on($id_empresa)->find($t->id);
            $actualizado->saldo =  $t->saldo-$total_abono;
            $actualizado->save();
            break;
          }
        }

      }
      $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
      ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
      ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
      ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista', 'servicios.fecha','servicios.id')
      ->orderBy('servicios.id', 'asc')
        ->paginate(15);

      $contratistas= \mensajeria\Contratista::on($id_empresa)->pluck('codigo','id');
      $tabla_liquidacion= \mensajeria\liquidacion::on($id_empresa)->where('id','>',0)->get();
      $id_liquidacion= $tabla_liquidacion->last()->id;


    //  echo   $id_liquidacion;
     return view("/liquidacion_contratistas.imprimir_tirilla")->with('id_liquidacion',$id_liquidacion);
    }


    public function consulta(Request $request){
 $id_empresa=Auth::user()->empresa;
  $min = Carbon::createFromFormat('Y-m-d H:i:s', $request->inicio." 00:00:00" , 'America/Bogota');
  $max = Carbon::createFromFormat('Y-m-d H:i:s', $request->fin." 23:59:59" , 'America/Bogota');
  $nombre_contratista= $request->contratista_reporte;

      $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
      ->where('servicios.contratista', '=', $request->contratista_reporte)
      ->whereBetween('servicios.dia',array($min, $max))
      ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
      ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
      ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista','servicios.fecha','servicios.forma_pago','contratistas.utilidad', 'contratistas.abono', 'contratistas.descuento', 'contratistas.codigo as codigo_contratista','servicios.id','contratistas.sso')
      ->orderBy('servicios.id', 'asc')
        ->paginate(50);
        $cantidad_total= 0;
        $cantidad_contado=0;
        $cantidad_credito=0;
        $total_general=0;
        $total_credito = 0;
        $total_contado= 0;
        $utilidad=0;
        $abono=0;
        $alquiler=0;

        $seguro=0;
        foreach($servicios as $t){
          if($t->forma_pago==1)
          {
            $nombre_contratista= "(".$t->codigo_contratista.") ". $t->nombre_contratista;
            $utilidad= $t->utilidad;
            $seguro=$t->sso;
            $abono = $t->abono;
            $alquiler=$t->descuento;
            $total_general=$t->valor_servicio + $total_general;
            $total_contado=$t->valor_servicio + $total_contado;
            $cantidad_contado=$cantidad_contado+1;
            $cantidad_total=$cantidad_total+1;
          }else{
            $utilidad= $t->utilidad;
            $seguro=$t->sso;
            $abono = $t->abono;
            $total_general=$t->valor_servicio + $total_general;
            $total_credito=$t->valor_servicio + $total_credito;
            $cantidad_credito=$cantidad_credito+1;
            $cantidad_total=$cantidad_total+1;
          }
  			}
        $prestamos= \mensajeria\prestamos::on($id_empresa)->where('contratista', '=', $request->contratista_reporte)
        ->where('prestamos.saldo','>',0)
      ->join('contratistas', 'contratistas.id', '=', 'prestamos.contratista')
      ->select('contratistas.nombre', 'contratistas.codigo', 'prestamos.descripcion','prestamos.fecha','prestamos.monto', 'prestamos.saldo')
      ->paginate(15);
      $total_prestamo=0;
      foreach($prestamos as $j){
      $total_prestamo= $j->saldo + $total_prestamo;
      }
      $min = $request->inicio;
      $max = $request->fin;
        $tiempo = " Del ".$min. " al ".$max;
       return view("liquidacion_contratistas.liquidacion")->with(compact("servicios"))->with('total_contado',$total_contado)->with('total_credito',$total_credito)->with('total',$total_general)->with('cantidad_credito',$cantidad_credito)->with('cantidad_contado',$cantidad_contado)->with('utilidad',$utilidad)->with(compact("prestamos"))->with('total_prestamo',$total_prestamo)->with('alquiler',$alquiler)->with('abono',$abono)->with('nombre_contratista',$nombre_contratista)->with('tiempo',$tiempo)->with('id_contratista', $request->contratista_reporte)->with('fecha_inicio',$min)->with('fecha_fin',$max)->with('seguro',$seguro);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
