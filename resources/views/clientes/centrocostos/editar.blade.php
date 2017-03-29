@extends('layouts.principal')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Frecuente</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-bars"></i> </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="/clientes/{{$centrocostos->cliente}}/edit"class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

                    <?php $mensaje=Session::get('mensaje')?>
                    @if ($mensaje=='store')
                      <div class="alert alert-success " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Frecuente Registrado
                      </div>
                    @endif
                    @if ($mensaje=='update')
                      <div class="alert alert-success " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Frecuente Actualizado
                      </div>
                    @endif

                         <form class="form-horizontal" action="/clientes/centrocostos/actualizar" method="post">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>

                                                     {!!Form::hidden('cliente',$centrocostos->cliente) !!}
                                                        {!!Form::textarea('id',$centrocostos->id,['hidden'=>'true']) !!}
                                                 <div class="form-group ">
                                                         {!!Form::label("nombre_label",'Nombre',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                                                         <div class="col-md-9 col-sm-9 col-xs-12">
                                                         {!!Form::text('nombre',$centrocostos->nombre,['class'=>'form-control','placeholder'=>'Nombre'])!!}
                                                         </div>
                                                 </div>
                                                 <div class="form-group ">
                                                         {!!Form::label("direccion_label",'Dirección',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                                                         <div class="col-md-9 col-sm-9 col-xs-12">
                                                         {!!Form::text('direccion',$centrocostos->direccion,['class'=>'form-control','placeholder'=>'Dirección'])!!}
                                                         </div>
                                                 </div>
                                                 <div class="form-group ">
                                                         {!!Form::label("telefono1_label",'Contacto',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                                                         <div class="col-md-9 col-sm-9 col-xs-12">
                                                         {!!Form::text('contacto',$centrocostos->contacto,['class'=>'form-control','placeholder'=>'Contacto'])!!}
                                                         </div>
                                                 </div>



                         <div class="ln_solid"></div>
                         <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                              <button type="submit" class="btn btn-primary">Cancel</button>
                                              <button type="submit" class="btn btn-success">Enviar</button>
                                            </div>
                                          </div>
                    {!! Form::close() !!}
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
