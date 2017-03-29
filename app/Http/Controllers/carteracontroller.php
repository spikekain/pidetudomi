<?php

namespace mensajeria\Http\Controllers;
use mensajeria\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App;
use PDF;

class carteracontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $modelo_cartera = new \mensajeria\cartera;
        $empresa= Auth::user()->empresa;
        $cartera = $modelo_cartera::on($empresa)->where('saldo','>',0)
      ->join('clientes', 'clientes.telefono1', '=', 'cartera.cliente')
      ->select('cartera.cliente', 'clientes.nombre','cartera.fecha_creacion','cartera.total_deuda','cartera.saldo')
      ->orderBy('cartera.fecha_creacion', 'asc')
        ->paginate(15);
       return view("cartera.index")->with(compact("cartera"));
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
        //
        $modelo_cartera = new \mensajeria\cartera;
        $empresa= Auth::user()->empresa;
        $cartera = $modelo_cartera::on($empresa)->where('saldo','>',0)
        ->where ('cliente','=', $request->telefono_cliente)
      ->join('clientes', 'clientes.telefono1', '=', 'cartera.cliente')
      ->select('cartera.cliente', 'clientes.nombre','cartera.fecha_creacion','cartera.total_deuda','cartera.saldo','cartera.id')
      ->orderBy('cartera.fecha_creacion', 'asc')->get();
      $total_abono = $request->valor;
      $recorre_servicios = $cartera;
      $cantidad= 0;
      $total=0;
      foreach($recorre_servicios as $t){
        if($total_abono > $t->saldo)
        {
          \mensajeria\detalles_cartera::create([
          'cartera'=> $t->id,
          'monto'=>  $t->saldo,
          'tipo'=>2,
          'descripcion'=> $request->descripcion,
          'referencia'=>  $request->referencia
          ]);
          $total_abono = $total_abono - $t->saldo;
        }else{
          \mensajeria\detalles_cartera::create([
          'cartera'=> $t->id,
          'monto'=>  $total_abono,
          'tipo'=>2,
          'descripcion'=> $request->descripcion,
          'referencia'=>  $request->referencia
          ]);
          break;
        }
      }

      $cartera = \mensajeria\cartera::where('saldo','>',0)
    ->join('clientes', 'clientes.telefono1', '=', 'cartera.cliente')
    ->select('cartera.cliente', 'clientes.nombre','cartera.fecha_creacion','cartera.total_deuda','cartera.saldo')
    ->orderBy('cartera.fecha_creacion', 'asc')
      ->paginate(15);
     return view("cartera.index")->with(compact("cartera"))->with('message', 'store');


    }

    public function consulta(Request $request)
    {
        //
        $cartera = \mensajeria\cartera::where('saldo','>',0)
        ->where ('cliente','=', $request->telefono_cliente_reporte)
      ->join('clientes', 'clientes.telefono1', '=', 'cartera.cliente')
      ->select('cartera.cliente', 'clientes.nombre','cartera.fecha_creacion','cartera.total_deuda','cartera.saldo')
      ->orderBy('cartera.fecha_creacion', 'asc')
        ->paginate(15);
        $recorre_servicios = $cartera;
        $cantidad= 0;
        $total=0;
        foreach($recorre_servicios as $t){
          $cantidad= $cantidad+1;
          $total = $t->saldo + $total;
        }
       return view("cartera.consulta")->with(compact("cartera"))->with('telefono_cliente', $request->telefono_cliente_reporte)->with('cantidad',$cantidad)->with('total',$total);
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
    public function cuenta_cobro($id)
    {
        //
        $pdf = App::make('dompdf.wrapper');
          $pdf->loadView('cuenta_cobro');
          return $pdf->stream('cuenta_cobro.pdf')
                 ->header('Content-Type','application/pdf');
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
