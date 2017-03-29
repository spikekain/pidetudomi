<?php

namespace mensajeria\Http\Controllers;

use Illuminate\Http\Request;

class frecuentes_controller extends Controller
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

     public function crear($id)
     {
       return view("clientes.frecuente2")->with('id', $id);
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
     public function buscar_frecuentes($cliente)
     {
       $id_empresa=Auth::user()->empresa;
       $centrocostos= \mensajeria\frecuente::on($id_empresa)->where('cliente', '=', $cliente)->get();
     return response()->json($centrocostos->toArray());
     }
    public function guardar(Request $request)
    {
       $id_empresa=Auth::user()->empresa;
        \mensajeria\frecuente::on($id_empresa)->insert([
          'descripcion'=> $request->descripcion,
          'cliente'=>$request->cliente
        ]);
           return view("clientes.frecuente2")->with('id', $request->cliente)->with('mensaje', 'store');
    }
    public function editar($id)
    {
       $id_empresa=Auth::user()->empresa;
      $frecuente= \mensajeria\frecuente::on($id_empresa)->find($id);
       return view("clientes.frecuente3")->with(compact("frecuente"));
    }
    public function actualizar(Request $request)
    {
       $id_empresa=Auth::user()->empresa;
      $frecuente= \mensajeria\frecuente::on($id_empresa)->find($request->id);
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
       $contratista= \mensajeria\frecuente::on($id_empresa)->find($id);
       $contratista->delete();
         return redirect('/clientes')->with('mensaje','destroy');
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
