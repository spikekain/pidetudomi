@extends('layouts.principal')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Prestamos</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-bars"></i> </h2>
              <ul class="nav navbar-right panel_toolbox">
                      <a class="btn btn-app" href= "/prestamos"  ><i class="glyphicon glyphicon-triangle-left"></i> Atras</a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

                    <?php $mensaje=Session::get('mensaje')?>
                    @if ($mensaje=='store')
                      <div class="alert alert-success " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Prestamo Registrada
                      </div>
                    @endif
                    @if ($mensaje=='update')
                      <div class="alert alert-success " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Prestamo Actualizado
                      </div>
                    @endif

                        {!! Form::open(['route'=>'prestamos.store','method'=>'POST','class'=>' form-horizontal form-label-left', 'files'=>true]) !!}
                        <div class="form-group ">
                            {!!Form::label("telefono1_label",'Contratistas',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::select('contratista',$contratistas,null,['placeholder' => 'Seleccione un Valor...','class'=>'form-control'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("nombre_label",'Descripción del Prestamo',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion del Prestamo'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("direccion_label",'Fecha del Prestamo',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                             {!!Form::date('fecha', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono1_label",'Monto del Prestamo',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                           {!!Form::text('monto',null,['class'=>'form-control','placeholder'=>'Monto'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono1_label",'Tipo',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="tipo">
                            <option value="1">Prestamo</option>
                            <option value="2">Abono</option>
                          </select>
                            </div>
                    </div>
                         <div class="ln_solid"></div>
                         <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                                            <button type="submit" class="btn btn-app" href= "#" ><i class="glyphicon glyphicon-ok"></i> Procesar</button>
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
