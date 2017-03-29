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
                <a class="btn btn-app" href= "/notas_contables"  ><i class="glyphicon glyphicon-triangle-left"></i> Atras</a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

                    <?php $mensaje=Session::get('mensaje')?>
                    @if ($mensaje=='store')
                      <div class="alert alert-success " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Nota de Credito Registrada
                      </div>
                    @endif
                    @if ($mensaje=='update')
                      <div class="alert alert-success " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Nota de Credito  Actualizado
                      </div>
                    @endif
                        {!! Form::open(['route'=>'notas_contables.store','method'=>'POST','class'=>' form-horizontal form-label-left']) !!}
                      {!!Form::hidden('responsable',$responsable,['class'=>'form-control','placeholder'=>'responsable'])!!}
                        <div class="form-group ">
                                {!!Form::label("telefono1_label",'Proveedor ',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                                <div class="col-md-9 col-sm-9 col-xs-12">
                               {!!Form::text('proveedor',null,['class'=>'form-control','placeholder'=>'Proveedor'])!!}
                                </div>
                        </div>
                        <div class="form-group ">
                                {!!Form::label("telefono1_label",'NIT ',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                                <div class="col-md-9 col-sm-9 col-xs-12">
                               {!!Form::text('nit',null,['class'=>'form-control','placeholder'=>'NIT'])!!}
                                </div>
                        </div>
                    <div class="form-group ">
                            {!!Form::label("nombre_label",'Descripción de la Nota',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion'])!!}
                            </div>
                    </div>

                    <div class="form-group ">
                            {!!Form::label("direccion_label",'Fecha',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                             {!!Form::date('fecha', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono1_label",'Monto ',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                           {!!Form::text('monto',null,['class'=>'form-control','placeholder'=>'Monto'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono1_label",'Tipo',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                        {{Form::select('tipo', ['1' => 'Nota de Credito', '2' => 'Nota de Debito'], 'S',['class'=>'form-control'])}}
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
