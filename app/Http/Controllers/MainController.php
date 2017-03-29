<?php

namespace mensajeria\Http\Controllers;
use mensajeria\Contratista;
use Illuminate\Http\Request;
use mensajeria\User;
use Session;
      use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //
    public function index()

    {
      if (Auth::check())
      {
      }else {
          return view('frontend.index');
      }
      $id_empresa=Auth::user()->empresa;
        $name_user=Auth::user()->name;

      $ciudades= \mensajeria\ciudad::on($id_empresa)->where('id','>',0)->get();
    $empresas= \mensajeria\empresa::on($id_empresa)->where('codigo','=',$id_empresa)->get();
      $precio_base = $empresas->last()->precio_base;
      $precio_km = $empresas->last()->precio_km;
      $minimo_km = $empresas->last()->minimo_km;
      $ida_vuelta= $empresas->last()->ida_vuelta;

        $tipo_servicios= \mensajeria\tipo_servicio::on($id_empresa)->where('id','>',0)->get();;
        $contratistas= Contratista::on($id_empresa)->pluck('codigo','id');
      return view("index")->with(compact("contratistas"))->with(compact("tipo_servicios"))->with('precio_base',$precio_base)->with('precio_km',$precio_km)->with('minimo_km',$minimo_km)->with('ida_vuelta',$ida_vuelta)->with('name_user',$name_user);
    }
    public function prueba()
    {

      return view("prueba");
    }
  }
