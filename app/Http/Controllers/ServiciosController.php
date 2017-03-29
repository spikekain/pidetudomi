<?php

namespace mensajeria\Http\Controllers;
use mensajeria\Http\Requests\crear_servicios;
use mensajeria\Http\Requests\crear_servicio_directo;
use mensajeria\Http\Requests\request_servicio_espera;
use Illuminate\Http\Request;
use App;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $id_empresa=Auth::user()->empresa;
        if(isset($request->contratista))
      {


        $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
        ->where('contratista', '=', $request->contratista_reporte)
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista','servicios.dia')
        ->orderBy('servicios.id', 'asc')
          ->paginate(15);
      }else {
        $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista','servicios.dia')
        ->orderBy('servicios.id', 'asc')
          ->paginate(15);
      }
        $contratistas= \mensajeria\Contratista::on($id_empresa)->pluck('codigo','id');
        //echo $request;
       return view("servicios.index")->with(compact("contratistas"))->with(compact("servicios"));


    }
    public function enviar_servicio_espera(request_servicio_espera $request)
    {
      $id_empresa=Auth::user()->empresa;
          if($request->ajax())
          {
            $id_cliente=0;
          $existe=\mensajeria\cliente::on($id_empresa)->where('telefono1','=',$request->telefono_remitente)->count();
          $codigo_cliente = \mensajeria\cliente::where('telefono1','=',$request->telefono_remitente)->get();
          if ($existe)
          {
            foreach($codigo_cliente as $t){
  			         $id_cliente = $t->id;
               }
          }else{
            \mensajeria\cliente::on($id_empresa)->insert([
              'nit'=> $request->nit_remitente,
              'nombre' => $request->nombre_remitente,
              'direccion' => $request->direccion_remitente,
              'telefono1'=> $request->telefono_remitente,
              'barrio'=> $request->barrio_remitente,
              'contacto'=> $request->contacto_remitente,
              'coordenadas'=>$request->coordenadas

            ]);
            $codigo_cliente2 = \mensajeria\cliente::on($id_empresa)->where('telefono','=',$request->telefono_remitente);
            foreach($codigo_cliente2 as $t){
                 $id_cliente = $t->id;
               }
          }
          $codigo_contratista= 0;
          $monto_utilidad_contratista =0;

          if(is_numeric($request->contratista))
          {
            $codigo_contratista=$request->contratista;
            $utilidad_contratista = \mensajeria\Contratista::on($id_empresa)->find($codigo_contratista);
            $monto_utilidad_contratista = $utilidad_contratista->utilidad;
          }else {
          $codigo_contratista=0;
          $monto_utilidad_contratista =0;
          }

          $hora = Carbon::now();

            \mensajeria\servicios::on($id_empresa)->insert([
              'telefono_remitente'=> $request->telefono_remitente,
              'nombre_remitente'=> $request->nombre_remitente,
              'centro_costo_remitente'=> $request->centro_costo_remitente,
              'nit_remitente'=> $request->nit_remitente,
              'contacto_remitente'=> $request->contacto_remitente,
              'direccion_remitente'=> $request->direccion_remitente,
              'barrio_remitente'=> $request->barrio_remitente,
              'telefono_destinatario'=> $request->telefono_destinatario,
              'nombre_destinatario'=> $request->nombre_destinatario,
              'centro_costo_destinatario'=> $request->telefono_destinatario,
              'nit_destinatario'=> $request->nit_destinatario,
              'direccion_destinatario'=> $request->direccion_destinatario,
              'contacto_destinatario'=> $request->contacto_destinatario,
              'barrio_destinatario'=> $request->barrio_destinatario,
              'tipo_servicio'=> $request->tipo_servicio,
              'cliente'=> $id_cliente,
              'contratista'=> $codigo_contratista,
              'valor_servicio'=> $request->valor_servicio,
              'status'=> $request->status,
              'alto_paquete'=> $request->alto_paquete,
              'largo_paquete'=> $request->largo_paquete,
              'ancho_paquete'=> $request->ancho_paquete,
              'peso_paquete'=> $request->peso_paquete,
              'valor_paquete'=> $request->valor_paquete,
              'seguro_paquete'=> $request->seguro_paquete,
              'forma_pago'=>$request->forma_pago,
              'fecha'=>$hora,
              'utilidad'=>  $monto_utilidad_contratista,
              'detalle_envio'=>$request->detalle_envio,
              'operario'=>Auth::user()->id,
                'fecha_espera'=>$hora,
                'dia'=>$hora

            ]);
            return response()->json(["mensaje"=> "store"]);
          }else
          {

          if(isset($request->contratista))
        {

          $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
          ->where('contratista', '=', $request->contratista_reporte)
          ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
          ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
          ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista','servicios.dia')
          ->orderBy('servicios.id', 'asc')
            ->paginate(15);
        }else {
          $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
          ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
          ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
          ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista','servicios.dia')
          ->orderBy('servicios.id', 'asc')
            ->paginate(15);
        }
          $contratistas= \mensajeria\Contratista::on($id_empresa)->pluck('codigo','id');
          //echo $request;
         return view("servicios.index")->with(compact("contratistas"))->with(compact("servicios"));
      }
    }
    public function enviar_servicio(crear_servicio_directo $request)
    {
      $id_empresa=Auth::user()->empresa;

          if($request->ajax())
          {
            $id_cliente=0;
          $existe=\mensajeria\cliente::on($id_empresa)->where('telefono1','=',$request->telefono_remitente)->count();
          $codigo_cliente = \mensajeria\cliente::on($id_empresa)->where('telefono1','=',$request->telefono_remitente)->get();
          if ($existe)
          {
            foreach($codigo_cliente as $t){
  			         $id_cliente = $t->id;
               }

          }else{
            \mensajeria\cliente::on($id_empresa)->insert([
              'nit'=> $request->nit_remitente,
              'nombre' => $request->nombre_remitente,
              'direccion' => $request->direccion_remitente,
              'telefono1'=> $request->telefono_remitente,
              'barrio'=> $request->barrio_remitente,
              'contacto'=> $request->contacto_remitente,
              'coordenadas'=>$request->coordenadas
            ]);
            $codigo_cliente2 = \mensajeria\cliente::on($id_empresa)->where('telefono1','=',$request->telefono_remitente)
            ->orWhere('telefono2', '=', $request->telefono_remitente);
            foreach($codigo_cliente2 as $t){
                 $id_cliente = $t->id;
               }
          }
          $codigo_contratista= 0;
          $monto_utilidad_contratista =0;

          if(is_numeric($request->contratista))
          {
            $codigo_contratista=$request->contratista;
            $utilidad_contratista = \mensajeria\Contratista::find($codigo_contratista);
            $monto_utilidad_contratista = $utilidad_contratista->utilidad;
          }else {
          $codigo_contratista=0;
          $monto_utilidad_contratista =0;
          }
          $hora = Carbon::now();
              \mensajeria\servicios::on($id_empresa)->insert([
              'telefono_remitente'=> $request->telefono_remitente,
              'nombre_remitente'=> $request->nombre_remitente,
              'centro_costo_remitente'=> $request->centro_costo_remitente,
              'nit_remitente'=> $request->nit_remitente,
              'contacto_remitente'=> $request->contacto_remitente,
              'direccion_remitente'=> $request->direccion_remitente,
              'barrio_remitente'=> $request->barrio_remitente,
              'telefono_destinatario'=> $request->telefono_destinatario,
              'nombre_destinatario'=> $request->nombre_destinatario,
              'centro_costo_destinatario'=> $request->telefono_destinatario,
              'nit_destinatario'=> $request->nit_destinatario,
              'direccion_destinatario'=> $request->direccion_destinatario,
              'contacto_destinatario'=> $request->contacto_destinatario,
              'barrio_destinatario'=> $request->barrio_destinatario,
              'tipo_servicio'=> $request->tipo_servicio,
              'cliente'=> $id_cliente,
              'contratista'=> $codigo_contratista,
              'valor_servicio'=> $request->valor_servicio,
              'status'=> $request->status,
              'alto_paquete'=> $request->alto_paquete,
              'largo_paquete'=> $request->largo_paquete,
              'ancho_paquete'=> $request->ancho_paquete,
              'peso_paquete'=> $request->peso_paquete,
              'valor_paquete'=> $request->valor_paquete,
              'seguro_paquete'=> $request->seguro_paquete,
              'forma_pago'=>$request->forma_pago,
              'fecha_espera'=>$hora,
              'fecha'=>$hora,
              'utilidad'=>  $monto_utilidad_contratista,
              'detalle_envio'=>$request->detalle_envio,
              'dia'=>$hora,
              'operario'=>Auth::user()->id,
              'impreso'=>$request->impreso
            ]);
            return response()->json(["mensaje"=> "store"]);
          }else
          {

          if(isset($request->contratista))
        {

          $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
          ->where('contratista', '=', $request->contratista_reporte)
          ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
          ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
          ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista','servicios.dia')
          ->orderBy('servicios.id', 'asc')
            ->paginate(15);
        }else {
          $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
          ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
          ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
          ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista','servicios.dia')
          ->orderBy('servicios.id', 'asc')
            ->paginate(15);
        }
          $contratistas= \mensajeria\Contratista::on($id_empresa)->pluck('codigo','id');
          //echo $request;
         return view("servicios.index")->with(compact("contratistas"))->with(compact("servicios"));
      }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function editar($id)
     {
       $id_empresa=Auth::user()->empresa;
         $tipo_servicios= \mensajeria\tipo_servicio::on($id_empresa)->where('id','>',0)->get();
       $servicios= \mensajeria\servicios::on($id_empresa)->find($id);
       $contratistas= \mensajeria\Contratista::pluck('codigo','id');
       //echo $request;
      return view("servicios.editar")->with(compact("contratistas"))->with(compact("servicios"))->with(compact("tipo_servicios"));
     }
     public function analisis_servicios()
     {
       $id_empresa=Auth::user()->empresa;
      $servicios =DB::connection($id_empresa) ->select("select count(*) as cantidad_servicio,dia, sum(valor_servicio) as suma from servicios where status='1' GROUP by dia");
       return view("analisis.analisis_servicios")->with(compact("servicios"));
     }
     public function analisis_servicios_consulta(Request $request)
     {
        $id_empresa=Auth::user()->empresa;
      $servicios =DB::connection($id_empresa) ->select("select count(*) as cantidad_servicio,dia, sum(valor_servicio) as suma from servicios where status='1' and servicios.dia BETWEEN '$request->fecha_inicio' and '$request->fecha_fin' GROUP by dia");
    //  echo "select count(*) as cantidad_servicio,dia from servicios where status='1' and dia> $request->fecha_inicio and dia<=$request->fecha_fin  GROUP by dia";
       return view("analisis.analisis_servicios")->with(compact("servicios"));
     }
     public function guardar(Request $request)
     {
$id_empresa=Auth::user()->empresa;
       $servicios1=\mensajeria\servicios::on($id_empresa)->find($request->id_servicio);
       $servicios1->fill($request->all());
       $servicios1->save();
        $servicios= \mensajeria\servicios::on($id_empresa)->where('status', '=', '1')
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
        ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
        ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista', 'servicios.fecha','servicios.id','servicios.dia')
        ->orderBy('servicios.id', 'asc')
          ->paginate(15);
        $contratistas= \mensajeria\Contratista::on($id_empresa)->pluck('codigo','id');
        //echo $request;
       return view("liquidacion_contratistas.index")->with(compact("contratistas"))->with(compact("servicios"));


     }
     public function imprimir($id)
     {
         //
   $id_empresa=Auth::user()->empresa;
         $servicios= \mensajeria\servicios::on($id_empresa)->where('servicios.id', '=', $id)
         ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
         ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
         ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista','servicios.id', 'servicios.fecha', 'servicios.forma_pago','servicios.dia')
         ->orderBy('servicios.id', 'asc')
         ->get();

         $empresa= \mensajeria\empresa::on($id_empresa)->find(1);
         $pdf = App::make('dompdf.wrapper');


           $pdf->loadView('ticket_servicio',compact('servicios'),compact('empresa'))->setPaper('8.5x14', 'portrait');
           return $pdf->stream('cuenta_cobro.pdf')
                  ->header('Content-Type','application/pdf');
     }
     public function ultimo_servicio()
     {
       $id_empresa=Auth::user()->empresa;
       $srv= \mensajeria\servicios::on($id_empresa)->where('id','>',0)->get();
        $id= $srv->last()->id;
         $servicios= \mensajeria\servicios::on($id_empresa)->where('servicios.id', '=', $id)
         ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
         ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
         ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'detalle_envio', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista', 'contratistas.codigo as codigo_contratista','servicios.id', 'servicios.fecha', 'servicios.forma_pago')
         ->orderBy('servicios.id', 'asc')
         ->get();

         $empresa= \mensajeria\empresa::on($id_empresa)->find(1);
         $pdf = App::make('dompdf.wrapper');
           $pdf->loadView('ticket_servicio',compact('servicios'),compact('empresa'))->setPaper('8.5x14', 'portrait');
           return $pdf->stream('cuenta_cobro.pdf')
                  ->header('Content-Type','application/pdf');
     }
     public function obtener_servicio_id($id)
     {
       $id_empresa=Auth::user()->empresa;
       $servicios = \mensajeria\servicios::on($id_empresa)->find($id);
         return response()->json($servicios->toArray());
     }
     public function borrar_servicio_espera($id)
     {
       $id_empresa=Auth::user()->empresa;
       $servicios = \mensajeria\servicios::on($id_empresa)->find($id);
       $servicios->delete();
        // return response()->json($servicios->toArray());
     }
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function servicios_espera()
     {
        $id_empresa=Auth::user()->empresa;
    $servicios_espera= \mensajeria\servicios::on($id_empresa)->where('status', '=', '2')
    ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
    ->select('servicios.id','servicios.telefono_remitente','servicios.nombre_destinatario', 'servicios.tipo_servicio','servicios.nombre_remitente','servicios.nit_remitente','servicios.nombre_remitente','servicios.nombre_remitente','servicios.direccion_remitente','servicios.contacto_remitente','servicios.barrio_remitente','servicios.telefono_destinatario','servicios.nit_destinatario','servicios.direccion_destinatario', 'servicios.centro_costo_destinatario', 'servicios.contacto_destinatario', 'servicios.fecha', 'servicios.barrio_destinatario', 'servicios.valor_servicio','servicios.detalle_envio','tipo_servicios.color' )
    ->orderBy('servicios.id', 'asc')
      ->get();

     return response()->json($servicios_espera->toArray());
     }



     public function servicios_espera_tipo($id)
     {
        $id_empresa=Auth::user()->empresa;
    $servicios_espera= \mensajeria\servicios::on($id_empresa)->where('status', '=', '2')
    ->where('tipo_servicio','=',$id)
    ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
    ->orderBy('servicios.id', 'asc')
    ->get();

     return response()->json($servicios_espera->toArray());
     }
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
      $id_empresa=Auth::user()->empresa;
      $servicios= \mensajeria\servicios::on($id_empresa)->where('servicios.id','=',$id)
      ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio')
      ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
      ->select('telefono_remitente','nombre_remitente', 'direccion_remitente', 'direccion_destinatario', 'valor_servicio', 'tipo_servicios.descripcion as tipo_servicio_descripcion', 'contratistas.nombre as nombre_contratista')
      ->get();
       return response()->json($servicios->toArray());
    }
    public function lista_impresion_servicios($empresa)
    {
        $id_empresa=$empresa;
      $servicios= \mensajeria\servicios::on($id_empresa)->where('servicios.impreso','=',0)
      ->join('users','users.id','servicios.operario')
      ->join('contratistas', 'contratistas.id', '=', 'servicios.contratista')
      ->select('contratistas.nombre as contratista','users.name as operario', 'servicios.nombre_remitente as contacto_remitente','servicios.telefono_remitente','servicios.direccion_remitente', 'servicios.valor_servicio as valor_paquete','servicios.detalle_envio', 'servicios.fecha', 'servicios.nit_remitente', 'servicios.id')
      ->get();
      \mensajeria\servicios::on($id_empresa)->where('servicios.impreso','=',0)->update(['impreso' => 1]);
       return response()->json($servicios->toArray());
    }
    public function reimprimir($id){
      
$id_empresa=Auth::user()->empresa;
      $servicios= \mensajeria\servicios::on($id_empresa)->find($id);
      $servicios->impreso=0;
      $servicios->save();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */public function procesar_servicio_espera(Request $request)
     {
       $id_servicio = $request->id_servicio;
       $id_empresa=Auth::user()->empresa;
       $servicios= \mensajeria\servicios::on($id_empresa)->find($id_servicio);
       $servicios->impreso = $request->impreso;

                $servicios->valor_servicio= $request->valor_servicio;
                $servicios->detalle_envio= $request->detalle_envio;
                $servicios->contratista= $request->contratista;
                if(is_numeric($request->contratista))
                {
                  $codigo_contratista=$request->contratista;
                  $utilidad_contratista = \mensajeria\Contratista::on($id_empresa)->find($codigo_contratista);
                  $monto_utilidad_contratista = $utilidad_contratista->utilidad;
                }else {
                $codigo_contratista=0;
                $monto_utilidad_contratista =0;
                }
                $servicios->utilidad= $monto_utilidad_contratista;
                $servicios->status=1;
                $hora = Carbon::now();
                $servicios->fecha=$hora;
              $servicios->dia=$hora;
                $servicios->save();
                   return response()->json(["mensaje"=> "store"]);
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
