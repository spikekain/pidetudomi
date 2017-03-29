<?php

namespace mensajeria\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class informe_general_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id_empresa=Auth::user()->empresa;
      $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
      ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
      ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
      ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista', 'servicios.utilidad', 'servicios.dia')
      ->orderBy('servicios.id', 'asc')
        ->paginate(15);
     $tipo_servicios= \mensajeria\tipo_servicio::on($id_empresa)->where('id','>',0)->get();
    return view("informe_general.index")->with(compact("tipo_servicios"))->with(compact("servicios"))->with('fecha_inicio',"") ->with('nombre_cliente',"");
    }

    public function consulta (Request $request)
    {
      $id_empresa=Auth::user()->empresa;
      $min = Carbon::createFromFormat('Y-m-d H:i:s', $request->fecha_inicio." 00:00:00" , 'America/Bogota');
      $max = Carbon::createFromFormat('Y-m-d H:i:s', $request->fecha_fin." 23:59:59" , 'America/Bogota');
    //  echo $request->tipo_servicio;

      if ($request->tipo_servicio>0)
      {
        $servicios= \mensajeria\servicios::on($id_empresa)->where('servicios.id', '>', 0)
        ->whereBetween('dia',array($min, $max))
        ->where ('servicios.tipo_servicio','=',$request->tipo_servicio)
        ->where('cobrado','=',0)
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista', 'servicios.fecha','servicios.forma_pago','servicios.utilidad', 'servicios.dia')
        ->orderBy('servicios.id', 'asc')
          ->paginate(15);

      }else{
        $servicios= \mensajeria\servicios::on($id_empresa)->where('servicios.id', '>', 0)
        ->whereBetween('dia',array($min, $max))
        ->where('cobrado','=',0)
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista', 'servicios.fecha','servicios.forma_pago','servicios.utilidad', 'servicios.dia')
        ->orderBy('servicios.id', 'asc')
          ->paginate(15);
      }


            $recorre_servicios = $servicios;
            $cantidad_total= 0;
            $cantidad_contado=0;
            $cantidad_credito=0;
            $total_general=0;
            $total_credito = 0;
            $total_contado= 0;
            $utilidad_contratista= 0;
            $utilidad_contratante = 0;
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
              $utilidad_contratista = ($t->valor_servicio *$t->utilidad)/100 +   $utilidad_contratista ;
              $utilidad_contratante = ($t->valor_servicio *(100-$t->utilidad))/100 + $utilidad_contratante;

      			}
         $tipo_servicios= \mensajeria\tipo_servicio::on($id_empresa)->where('id','>',0)->get();
        // echo $servicios;
        return view("informe_general.consulta")->with(compact("tipo_servicios"))->with(compact("servicios"))->with('fecha_inicio',$request->fecha_inicio) ->with('telefono_remitente',$request->telefono_remitente)->with('total_general',$total_general)->with('total_contado',$total_contado)->with('total_credito',$total_credito)->with('cantidad_contado',$cantidad_contado)->with('cantidad_credito',$cantidad_credito)->with('cantidad_total',$cantidad_total)->with('fecha_inicio',$request->fecha_inicio)->with('fecha_fin',$request->fecha_fin)->with('nombre_cliente',$request->telefono_cliente_reporte)->with('utilidad_contratista',$utilidad_contratista)->with('utilidad_contratante',  $utilidad_contratante);

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
