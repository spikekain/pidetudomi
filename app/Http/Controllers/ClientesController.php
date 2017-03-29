<?php

namespace mensajeria\Http\Controllers;

use Illuminate\Http\Request;
      use Illuminate\Support\Facades\Auth;
      use Illuminate\Support\Facades\DB;
      use Illuminate\Pagination\Paginator;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function buscar($telefono)
     {
       $id_empresa=Auth::user()->empresa;
         $clientes= \mensajeria\cliente::on($id_empresa)->where('telefono1', '=', $telefono)
          ->orWhere('telefono2', '=', $telefono)->get();
       return response()->json($clientes->toArray());
     }
    public function index()
    {
        //
        $id_empresa=Auth::user()->empresa;
        $clientes= \mensajeria\cliente::on($id_empresa)->paginate(15);
        return view("clientes.index",compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_empresa=Auth::user()->empresa;
        $ciudades= \mensajeria\ciudad::on($id_empresa)->where('id','>',0)->get();
        $clientes= \mensajeria\cliente::on($id_empresa)->paginate(15);
        return view("clientes.create",compact("ciudades"),compact("clientes"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function crear_cliente (Request $request)
     {

       $id_empresa=Auth::user()->empresa;
       if($request->ajax())
       {
         $id_cliente=0;
       $existe=\mensajeria\cliente::on($id_empresa)->where('telefono1','=',$request->telefono_remitente)
       ->orWhere('telefono2', '=', $request->telefono_remitente)->count();
       $cliente = \mensajeria\cliente::on($id_empresa)->where('telefono1','=',$request->telefono_remitente)
       ->orWhere('telefono2', '=', $request->telefono_remitente)->firstOrFail();
       if ($existe)
       {
            $cliente->nit=$request->nit_remitente;
            $cliente->nombre=$request->nombre_remitente;
            $cliente->direccion=$request->direccion_remitente;
            $cliente->telefono1=$request->telefono_remitente;
            $cliente->barrio=$request->barrio_remitente;
            $cliente->contacto=$request->contacto_remitente;
            $cliente->coordenadas=$request->coordenadas;
            $cliente->save();
       }else{
         \mensajeria\cliente::on($id_empresa)->insert([
           'nit'=> $request->nit_remitente,
           'nombre' => $request->nombre_remitente,
           'direccion' => $request->direccion_remitente,
           'telefono1'=> $request->telefono_remitente,
           'barrio'=> $request->barrio_remitente,
           'contacto'=> $request->contacto_remitente,
           'coordenadas' => $request->cordenadas
         ]);
       }
       }
         return response()->json(["mensaje"=> "store"]);
       }

    public function store(Request $request)
    {

      //$ruta=$request->logo->getClientOriginalName();
       $id_empresa=Auth::user()->empresa;
      \mensajeria\cliente::on($id_empresa)->insert([
        'nit'=>$request->nit,
        'nombre'=>$request->nombre,
        'direccion'=>$request->direccion,
        'telefono1'=>$request->telefono1,
        'email'=>$request->email,
        'ciudad'=>$request->ciudad,
        'representante_legal'=>$request->representante_legal,
        'logo'=>$request->logo,
        'fondo_pagina'=>$request->fondo_pagina,
        'barrio'=>$request->barrio,
        'contacto'=>$request->contacto,
        'coordenadas'=>$request->coordenadas
      ]);
      return redirect('/clientes/create')->with('mensaje','store');
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
    public function traer_cliente(){
       $id_empresa=Auth::user()->empresa;
        $clientes= \mensajeria\cliente::on($id_empresa)->where('id','>',0)->get();
        return response()->json($clientes->toArray());
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
        $centrocostos= \mensajeria\centrocostos::on($id_empresa)->where('cliente', '=', $id)
        ->select('centrocostos.nombre', 'centrocostos.direccion', 'centrocostos.contacto','centrocostos.id')
        ->paginate(15);
        $frecuentes= \mensajeria\frecuente::on($id_empresa)->where('cliente', '=', $id)
        ->select('frecuentes.descripcion','frecuentes.id')
        ->paginate(15);

      $clientes= \mensajeria\cliente::on($id_empresa)->find($id);
      $ciudades= \mensajeria\ciudad::on($id_empresa)->where('id','>',0)->get();

      return view("clientes.edit")
      ->with('id',$id)
      ->with(compact("ciudades"))
      ->with(compact("centrocostos"))
        ->with(compact("frecuentes"))
      ->with(compact("clientes"));
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
        $id_empresa=Auth::user()->empresa;
        $contratista= \mensajeria\cliente::on($id_empresa)->find($id);
        $contratista->fill($request->all());
        $contratista->save();
        return redirect('/clientes')->with('mensaje','update');
    }
    public function analisis()
    {
      $id_empresa=Auth::user()->empresa;
    $servicios =DB::connection($id_empresa)->select("select count(*) as cantidad_servicio, sum(valor_servicio) as suma, servicios.nombre_remitente from servicios where status='1' GROUP by nombre_remitente asc order by cantidad_servicio desc  limit 0,20");
    $servicios2 =DB::connection($id_empresa)->select("select count(*) as cantidad_servicio, sum(valor_servicio) as suma, servicios.nombre_remitente from servicios where status='1' GROUP by nombre_remitente asc  order by suma desc limit 0,20");
     return view("analisis.analisis_clientes")->with(compact("servicios"))->with(compact("servicios2"));

    }
    public function analisis_servicios_consulta(Request $request)
    {
      $id_empresa=Auth::user()->empresa;
      $fecha_inicio= $request->fecha_inicio;
      $fecha_fin= $request->fecha_fin;
      $min = Carbon::createFromFormat('Y-m-d H:i:s', $fecha_inicio." 00:00:00" , 'America/Bogota');
      $fecha_intermedio = 
      $max = Carbon::createFromFormat('Y-m-d H:i:s', $fecha_fin." 23:59:59" , 'America/Bogota');

      /*$servicios=\mensajeria\servicios::on($id_empresa)
      ->where('id','>',0)
      ->select('servicios.nombre_remitente',DB::raw('(select count(*) from servicios where cliente = servicios.cliente) as primera_etapa'))
      ->orderBy('nombre_remitente','asc')
      ->paginate(50);
      */

    $servicios =DB::connection($id_empresa)->select("select nombre_remitente, (select count(*) from servicios where cliente = a.cliente and  dia between $min and $fecha_intermedio) as primera_etapa, (select count(*) from servicios where cliente = a.cliente and  dia between $fecha_intermedio and $max) as segunda_etapa from servicios as a order by nombre_remitente asc");

     return view("analisis.analisis_clientes2")->with(compact("servicios"));

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
