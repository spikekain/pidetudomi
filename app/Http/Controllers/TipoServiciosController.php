<?php

namespace mensajeria\Http\Controllers;

use Illuminate\Http\Request;
use mensajeria\Http\Requests\tipo_servicios_request_create;
use Illuminate\Support\Facades\Auth;

class TipoServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
  {

  }

    public function create()
    {
          return view("tipo_servicios.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipo_servicios_request_create $request)
    {
        //
         $id_empresa=Auth::user()->empresa;
        \mensajeria\tipo_servicio::on($id_empresa)->insert([
          'descripcion'=>$request->descripcion,
          'color'=>$request->color,
          'costo_adicional'=>$request->costo_adicional
                ]);
        return redirect('/tipo_servicios/create')->with('mensaje','store');
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
      $id_empresa=Auth::user()->empresa;
      $tipo_servicios= \mensajeria\tipo_servicio::on($id_empresa)->find($id);

    //  echo print_r ($empresas);
      return view("tipo_servicios.edit",['tipo_servicios'=>$tipo_servicios]);
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
      $tipo_servicios= \mensajeria\tipo_servicio::on($id_empresa)->find($id);
      $tipo_servicios->fill($request->all());
      $tipo_servicios->save();
    //  echo print_r ($empresas);
      return redirect('/empresa')->with('mensaje','update');
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
