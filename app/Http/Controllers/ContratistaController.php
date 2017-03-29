<?php

namespace mensajeria\Http\Controllers;

use Illuminate\Http\Request;
use mensajeria\Http\Requests\ContratistaCreateRequest;
use mensajeria\Http\Requests\ContratistaUpdateRequest;
use mensajeria\Contratista;
      use Illuminate\Support\Facades\Auth;

class ContratistaController extends Controller
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
        $contratistas= \mensajeria\Contratista::on($id_empresa)->paginate(15);
          return view("contratistas.index",compact("contratistas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view("contratistas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratistaCreateRequest $request)
    {
        //
        $id_empresa=Auth::user()->empresa;
        \mensajeria\Contratista::on($id_empresa)->insert([
          'nit'=>$request->nit,
          'nombre'=>$request->nombre,
          'direccion'=> $request->direccion,
          'telefono1'=>$request->telefono1,
          'email'=>$request->email,
          'codigo'=>$request->codigo,
          'descuento'=>$request->descuento,
          'sso'=>$request->sso,
          'tipo_pago'=>$request->tipo_pago,
          'soap'=>$request->soap,
          'cdt'=>$request->cdt,
          'eps'=>$request->eps,
          'placa'=>$request->placa,
          'contrato'=>$request->contrato,
          'foto'=>$request->foto,
          'utilidad'=>$request->utilidad
        ]);
      //  echo "prueba";
        return redirect('/contratistas/create')->with('mensaje','store');
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
        $contratista= \mensajeria\Contratista::on($id_empresa)->find($id);
      //  echo print_r ($empresas);
        return view("contratistas.edit",['contratista'=>$contratista]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratistaUpdateRequest $request, $id)
    {
        //
  $id_empresa=Auth::user()->empresa;
        $contratista= \mensajeria\Contratista::on($id_empresa)->find($id);
        $contratista->fill($request->all());
        $contratista->save();

    return redirect('/contratistas')->with('mensaje','update');
    }

public function lista_contratistas()
{
    $id_empresa=Auth::user()->empresa;
$contratista= \mensajeria\Contratista::on($id_empresa)->where('id','>',0)->get();
return response()->json($contratista->toArray());
}
    public function buscar_ccontratista_id($id)
    {
        $id_empresa=Auth::user()->empresa;
      $contratista= \mensajeria\Contratista::on($id_empresa)->find($id);
    return response()->json($contratista->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_empresa=Auth::user()->empresa;
        $contratista= \mensajeria\Contratista::on($id_empresa)->find($id);
        $contratista->delete();
          return redirect('/contratistas')->with('mensaje','destroy');

    }
}
