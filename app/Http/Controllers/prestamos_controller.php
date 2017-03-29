<?php

namespace mensajeria\Http\Controllers;

use Illuminate\Http\Request;
use mensajeria\Contratista;
use Illuminate\Support\Facades\Auth;

class prestamos_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $id_empresa=Auth::user()->empresa;
          $prestamos= \mensajeria\prestamos::on($id_empresa)->where('contratista', '<>', 0)
          ->where('prestamos.saldo','>',0)
        ->join('contratistas', 'contratistas.id', '=', 'prestamos.contratista')
        ->select('contratistas.nombre', 'contratistas.codigo', 'prestamos.descripcion','prestamos.fecha','prestamos.monto', 'prestamos.saldo')
        ->paginate(15);
         return view("prestamos.index",compact("prestamos"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $id_empresa=Auth::user()->empresa;
        $contratistas = Contratista::on($id_empresa)->pluck('nombre','id');
         return view("prestamos.create",compact("contratistas"));
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
      \mensajeria\prestamos::on($id_empresa)->insert(['contratista'=> $request->contratista,
        'fecha'=> $request->fecha,
        'descripcion'=> $request->descripcion,
        'monto'=> $request->monto,
        'saldo'=> $request->monto ]);
      return redirect('/prestamos/create')->with('mensaje','store');
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
