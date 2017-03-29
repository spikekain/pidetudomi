<?php

namespace mensajeria\Http\Controllers;

use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

class notas extends Controller
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
      $notas = \mensajeria\notas_contables::on($id_empresa)->where('id','>','0')->paginate(15);
      return  view("notas_contables.index")->with(compact("notas"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $responsable=Auth::user()->name;
      return  view("notas_contables.create")->with('responsable',$responsable);
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
        \mensajeria\notas_contables::on($id_empresa)->insert([
          'proveedor'=>$request->proveedor,
          'nit'=>$request->nit,
          'descripcion'=>$request->descripcion,
          'fecha' => $request->fecha,
          'monto'=>$request->monto,
          'responsable'=>$request->responsable,
          'tipo'=>$request->tipo
        ]);
        return redirect('/notas_contables/create')->with('mensaje','store');
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
