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
                <li><a href="/clientes/{{$id}}/edit"class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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

                         <form class="form-horizontal" action="/clientes/frecuente/guardar" method="post">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>

                        {!!Form::textarea('cliente',$id,['hidden'=>'true']) !!}
                    <div class="form-group ">
                            {!!Form::label("nombre_label",'Descripcion',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion'])!!}
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
