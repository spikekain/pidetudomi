<?php

namespace mensajeria\Http\Controllers;

use Illuminate\Http\Request;
use mensajeria\User;
use Session;
      use Illuminate\Support\Facades\Auth;
      use Illuminate\Support\Facades\Storage;
      use Illuminate\Support\Facades\File;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id_empresa=Auth::user()->empresa;
        $ciudades= \mensajeria\ciudad::on($id_empresa)->where('id','>',0);
        $empresas= \mensajeria\empresa::on($id_empresa)->where('codigo','=',$id_empresa)->get();
        $empresas2 = \mensajeria\empresa::on($id_empresa)->where('id','>',0)->get();
      
        $tipo_servicios= \mensajeria\tipo_servicio::on($id_empresa)->where('id','>',0)->paginate(15);

        $codigo_empresa = $empresas->last()->codigo;
        $nombre_empresa = $empresas->last()->nombre;
        $nit_empresa = $empresas->last()->nit;
        $direccion_empresa = $empresas->last()->direccion;
        $telefono1_empresa = $empresas->last()->telefono1;
        $telefono2_empresa = $empresas->last()->telefono2;
        $representante_legal_empresa = $empresas->last()->representante_legal;
        $ciudad_empresa = $empresas->last()->ciudad;
        $precio_base_empresa = $empresas->last()->precio_base;
        $precio_km_empresa = $empresas->last()->precio_km;
        $minimo_km_empresa = $empresas->last()->minimo_km;
        $email_empresa = $empresas->last()->email;
        $logo_empresa = $empresas->last()->logo;
        $ida_vuelta=$empresas->last()->ida_vuelta;

        $reporte_empresa = \mensajeria\reporte_empresa::on($id_empresa)->find(1);



      //  echo print_r ($empresas);
        return view("empresa.index",['empresas'=>$empresas2],compact("ciudades"))->with(compact("tipo_servicios"))->with('id_empresa',$id_empresa)->with('codigo_empresa',$codigo_empresa)->with('nombre_empresa',$nombre_empresa)->with('direccion_empresa',$direccion_empresa)->with('telefono1_empresa',$telefono1_empresa)->with('telefono2_empresa',$telefono2_empresa)->with('representante_legal_empresa',$representante_legal_empresa)->with('ciudad_empresa',$ciudad_empresa)->with('precio_base_empresa',$precio_base_empresa)->with('precio_km_empresa',$precio_km_empresa)->with('minimo_km_empresa',$minimo_km_empresa)->with('logo_empresa',$logo_empresa)->with('nit_empresa',$nit_empresa)->with('email_empresa',$email_empresa)->with('reporte1',$reporte_empresa->reporte1)->with('reporte2',$reporte_empresa->reporte2)->with('reporte3',$reporte_empresa->reporte3)->with('reporte4',$reporte_empresa->reporte4)->with('logo',$logo_empresa)->with('ida_vuelta',$ida_vuelta);
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


      $id_empresa=Auth::user()->empresa;
        \mensajeria\Empresa::on($id_empresa)->insert(['nit'=>$request['nit'],
        'nombre'=>$request['nombre'],
        'direccion'=>$request['direccion'],
        'telefono1'=>$request['telefono1'],
        'telefono2'=>$request['telefono2'],
        'email'=>$request['email'],
        'representante_legal'=>$request['representante_legal'],
        'ciudad'=>$request['ciudad'],
        'precio_base'=>$request['precio_base'],
        'precio_km'=>$request['precio_km'],
        'logo'=>$nuevo_nombre,
        'codigo'=>$request['codigo']]);


      //indicamos que queremos guardar un nuevo archivo en el disco local
      \Storage::disk('local')->put($nuevo_nombre,  \File::get($file));


        //return redirect('/empresa')->with('mensaje','store');
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


        $file = $request->file('file');
        $extension = File::extension($file);

                $id_empresa=Auth::user()->empresa;
                $empresas= \mensajeria\empresa::on($id_empresa)->where('codigo','=',$id_empresa)->get();
                $empresas2 = \mensajeria\empresa::on($id_empresa)->find($empresas->last()->id);
        if (is_null($file))
        {

        }else {
          $nombre = $file->getClientOriginalExtension();
          $nuevo_nombre = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
          $nuevo_nombre= $nuevo_nombre.".".$nombre;
        //  echo $nuevo_nombre;
          \Storage::disk('public')->put($nuevo_nombre,  \File::get($file));  # code...
            $empresas2->logo =$nuevo_nombre;
        }




        $empresas2->fill($request->all());
        $empresas2->save();

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
