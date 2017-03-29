<?php

namespace mensajeria\Http\Controllers;
use mensajeria\Contratista;
use Illuminate\Http\Request;

class CentrocostosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function buscar_centro_costo($cliente)
     {
       $id_empresa=Auth::user()->empresa;
       $centrocostos= \mensajeria\centrocostos::on($id_empresa)->where('cliente', '=', $cliente)->get();
     return response()->json($centrocostos->toArray());
     }

     public function buscar_centro_costo_id($id)
     {
       $id_empresa=Auth::user()->empresa;
       $centrocostos= \mensajeria\centrocostos::on($id_empresa)->where('centrocostos.id', '=', $id)
       ->join('contratistas', 'contratistas.id', '=', 'centrocostos.frecuente')
       ->select('centrocostos.nombre', 'centrocostos.direccion', 'centrocostos.contacto','contratistas.nombre as frecuente', 'contratistas.id as id_contratista')->get();
     return response()->json($centrocostos->toArray());
     }
     public function editar($id)
     {
       $id_empresa=Auth::user()->empresa;
       $centrocostos= \mensajeria\centrocostos::on($id_empresa)->find($id);
        return view("clientes.centrocostos.editar")->with(compact("centrocostos"))->with('id',$id);
     }
     public function actualizar(Request $request)
     {
       $id_empresa=Auth::user()->empresa;
       $frecuente= \mensajeria\centrocostos::on($id_empresa)->find($request->id);
       $frecuente->fill($request->all());
       $frecuente->save();
      return redirect('/clientes')->with('mensaje','store');
     }
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function eliminar ($id)
      {
        $id_empresa=Auth::user()->empresa;
        $centrocostos= \mensajeria\centrocostos::on($id_empresa)->find($id);
        $centrocostos->delete();
        return redirect('/clientes')->with('mensaje','destroy');
      }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $id_empresa=Auth::user()->empresa;
      $contratistas= Contratista::on($id_empresa)->pluck('nombre','id');
      return view("clientes.centrocostos.create",compact("contratistas"))->with('id', $id);
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
        $id_empresa=Auth::user()->empresa;
        \mensajeria\centrocostos::on($id_empresa)->insert([
          'nombre'=>$request->nombre,
          'contacto'=>$request->contacto,
          'direccion'=>$request->direccion,
          'cliente'=>$request->cliente
        ]);
        return redirect('/clientes/'.$request->cliente.'/edit')->with('mensaje','store');
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
          $id_empresa=Auth::user()->empresa;
        $centrocostos= \mensajeria\centrocostos::on($id_empresa)->find($id);
        $contratistas= Contratista::on($id_empresa)->pluck('nombre','id');
      //  echo print_r ($empresas);
        return view("clientes.centrocostos.edit",['centrocostos'=>$centrocostos],compact("contratistas"));
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
      $centrocostos= \mensajeria\centrocostos::on($id_empresa)->find($id);
      $centrocostos->fill($request->all());
      $centrocostos->save();
      return redirect('/clientes/'.$request->cliente.'/edit')->with('mensaje','update');
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
