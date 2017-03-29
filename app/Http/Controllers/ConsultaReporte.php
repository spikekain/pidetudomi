<?php

namespace mensajeria\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
      use Illuminate\Support\Facades\Auth;

class ConsultaReporte extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
          $id_empresa=Auth::user()->empresa;

      if(!empty($request->contratista_reporte)&&!empty($request->telefono_cliente_reporte))
      {

        $min = $request->inicio;
        $max =  $request->fin ;
        $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
        ->where('contratista', '=', $request->contratista_reporte)
        ->where('telefono_remitente', '=', $request->telefono_cliente_reporte)
        ->whereBetween('dia',array($min, $max))
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista','fecha','servicios.dia')
        ->orderBy('servicios.id', 'asc')
        ->paginate(15);
      //  echo "ambos filtros"       ;
      }elseif(!empty($request->contratista_reporte)){
          $min = $request->inicio;
        $max = ( $request->fin ) ;
        $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
        ->where('contratista', '=', $request->contratista_reporte)
        ->whereBetween('servicios.dia',array($min, $max))
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista','servicios.fecha','servicios.dia')
        ->orderBy('servicios.id', 'asc')
        ->paginate(15);
       // echo "contratista"       ;

      }elseif(!empty($request->telefono_cliente_reporte))
      {
          $min = $request->inicio;
        $max =  $request->fin ;
        $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
        ->where('telefono_remitente', '=', $request->telefono_cliente_reporte)
        ->whereBetween('dia',array($min, $max))
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista','fecha','dia')
        ->orderBy('servicios.id', 'asc')
        ->paginate(15);
       //  echo "cliente"       ;

      }else{
        $min = $request->inicio;
        $max =  $request->fin ;
        $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
        ->whereBetween('dia',array($min, $max))
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista','fecha','dia')
        ->orderBy('servicios.id', 'asc')
        ->paginate(15);
       // echo "Ningun Filtro";
      }
        //1473695axe
              $contratistas= \mensajeria\Contratista::on($id_empresa)->pluck('codigo','id');
     return view("servicios.index")->with(compact("contratistas"))->with(compact("servicios"));
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
