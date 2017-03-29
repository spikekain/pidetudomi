@extends('layouts.principal')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Contratistas</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-bars"></i> Añadir un Contratista</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="/contratistas" class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>


                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <?php $mensaje=Session::get('mensaje')?>
              @if ($mensaje=='store')
                <div class="alert alert-success " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Contratista Registrado
                </div>
              @endif
              @if ($mensaje=='update')
                <div class="alert alert-success " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Usuario Actualizado
                </div>
              @endif
            @include('alerts.request')
              {!! Form::open(['route'=>'contratistas.store','method'=>'POST','class'=>' form-horizontal form-label-left', 'files'=>true]) !!}

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Datos Personales</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Configuración</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Datos Adicionales</a>
                  </li>

                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <div class="form-group ">
                            {!!Form::label("representante_label",'Código del Contratista',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Código del Contratista'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("nit_label",'NIT',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('nit',null,['class'=>'form-control','placeholder'=>'NIT'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("nombre_label",'Nombre',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("direccion_label",'Dirección',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono1_label",'Teléfono Principal',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('telefono1',null,['class'=>'form-control','placeholder'=>'Teléfono Principal'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono2_label",'Teléfono Auxiliar',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('telefono2',null,['class'=>'form-control','placeholder'=>'Teléfono Auxiliar'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono3_label",'Email',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono3_label",'Nº de Contrato',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('contrato',null,['class'=>'form-control','placeholder'=>'Nº de Contrato'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("foto",'Foto',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::file('foto',null)!!}
                            </div>
                    </div>

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <div class="form-group ">
                            {!!Form::label("telefono3_label",'Alquiler de Equipos',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('descuento',null,['class'=>'form-control','placeholder'=>'Descuento por Alquiler de Equipos'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono3_label",'Porcentaje de Utilidad',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('utilidad',null,['class'=>'form-control','placeholder'=>'Porcentaje de Utilidad'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono3_label",'Abono',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('abono',null,['class'=>'form-control','placeholder'=>'Abono'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono3_label",'Descuento Seguro Social',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('sso',null,['class'=>'form-control','placeholder'=>'Descuento Seguro Social'])!!}
                            </div>
                    </div>
                    <div class="form-group ">
            {!! Form::label('radios', 'Forma de Pago', ['class' => 'col-md-3 col-sm-3 col-xs-12 control-label']) !!}
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="form-group ">
                  {!! Form::label('radios', 'Diario', ['class' => 'control-label']) !!}
                  {!! Form::radio('tipo_pago', 'Diario', true) !!}
                  </div>
                  <div class="form-group ">
                    {!! Form::label('radios', 'Semanal', ['class' => 'control-label']) !!}
                    {!! Form::radio('tipo_pago', 'Semanal', true) !!}
                    </div>
                    <div class="form-group ">
                      {!! Form::label('radios', 'Quincenal', ['class' => 'control-label']) !!}
                      {!! Form::radio('tipo_pago', 'Quincenal', true) !!}
                    </div>

            </div>
                    </div>


                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <div class="form-group ">
                            {!!Form::label("telefono3_label",'SOAP',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::date('soap', \Carbon\Carbon::now());!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono3_label",'CDT',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::date('cdt', \Carbon\Carbon::now());!!}
                            </div>
                    </div>
                    <div class="form-group ">
                            {!!Form::label("telefono3_label",'Nombre de la EPS',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('eps',null,['class'=>'form-control','placeholder'=>'Nombre de la EPS'])!!}
                            </div>
                    </div>                    <div class="form-group ">
                            {!!Form::label("telefono3_label",'Placa de la Moto',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::text('placa',null,['class'=>'form-control','placeholder'=>'Plaga de la Moto'])!!}
                            </div>
                    </div>

                  </div>

                </div>
              </div>

                   <div class="ln_solid"></div>
                   <div class="form-group">
                     <div class="form-group">
                       <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <div class="btn-group">
                              <a type ="reset" class="btn btn-app" href= "/contratistas/create" ><i class="glyphicon glyphicon-refresh"></i> Limpiar</a>
                             <button type="submit" class="btn btn-app" href= "#"  ><i class="fa fa-check"></i> Procesar</button>

                          </div>
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



@endsection
