<?php

namespace mensajeria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class llamadas_entrantes extends Controller
{

    public function consulta()
    {
      $id_empresa=Auth::user()->empresa;
        $llamadas_entrantes=DB::connection($id_empresa)->select('select ll.id, ll.numero, ll.linea, ifnull((select nombre from clientes where telefono1 = ll.numero),"") as nombre , ifnull((select direccion from clientes where telefono1 = ll.numero),"") as direccion from llamadas_entrantes as ll where status = "1"');
          return response()->json(collect($llamadas_entrantes)->toArray());
    }
    public function captura($id)
    {
      $id_empresa=Auth::user()->empresa;
        $llamadas_entrantes= \mensajeria\llamadas_entrantes::on($id_empresa)->find($id);
        $llamadas_entrantes->status=2;
        $llamadas_entrantes->save();
        return response()->json(["mensaje"=> "store"]);
    }
    public function limpiar()
    {
      $id_empresa=Auth::user()->empresa;
        $llamadas_entrantes= \mensajeria\llamadas_entrantes::on($id_empresa)->where('status','=','1')->update(['status' => '2']);

        return redirect('/home')->with('mensaje','update');
    }
    public function llenar($numero,$linea,$empresa)
    {
        $llamadas_entrantes= \mensajeria\llamadas_entrantes::on($empresa)->insert([
          'numero'=> $numero,
          'linea'=>$linea,
          'status'=>'1'
        ]);
    }

}
