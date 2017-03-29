@extends('layouts.principal')
@section('content')

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Clientes</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-bars"></i> </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="/clientes"class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

                    <?php $mensaje=Session::get('mensaje')?>
                    @if ($mensaje=='store')
                      <div class="alert alert-success " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Tipo de Servicio Registrado
                      </div>
                    @endif
                    @if ($mensaje=='update')
                      <div class="alert alert-success " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Tipo de Servicio  Actualizado
                      </div>
                    @endif

                        {!! Form::open(['route'=>'tipo_servicios.store','method'=>'POST','class'=>' form-horizontal form-label-left', 'files'=>true]) !!}
                    <div class="form-group ">
                            {!!Form::label("nombre_label",'Descripcion',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("nombre_label",'Costo Adicional',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('costo_adicional',null,['class'=>'form-control','placeholder'=>'costo_adicional'])!!}
                            </div>
                    </div>

                                        <div class="form-group ">
                                                {!!Form::label("nombre_label",'Color',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                  <input id='color' name='color' class="jscolor form-control" value="FFFFFF">
                                                </div>
                                        </div>
<div id="Inline"></div>
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
