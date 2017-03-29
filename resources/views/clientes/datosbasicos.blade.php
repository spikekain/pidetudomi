

<?php $mensaje=Session::get('mensaje')?>
@if ($mensaje=='store')
  <div class="alert alert-success " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Empresa Registrada
  </div>
@endif
@if ($mensaje=='update')
  <div class="alert alert-success " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Usuario Actualizado
  </div>
@endif

    {!! Form::open(['route'=>'clientes.store','method'=>'POST','class'=>' form-horizontal form-label-left', 'files'=>true]) !!}
<div class="form-group ">
        {!!Form::label("codigo_label",'Código',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Codigo'],'disabled')!!}
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
        {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección', 'id'=>'barrio_remitente'])!!}
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
        {!!Form::label("representante_label",'Representante Legal',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('representante_legal',null,['class'=>'form-control','placeholder'=>'Representante Legal'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("representante_label",'Barrio',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('barrio',null,['class'=>'form-control','placeholder'=>'Barrio', 'id'=>'barrio_destinatario'])!!}
        {!!Form::hidden('coordenadas',null,['class'=>'form-control','placeholder'=>'coordenadas', 'id'=>'cordenadas_destinatario'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("representante_label",'Contacto',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('contacto',null,['class'=>'form-control','placeholder'=>'Carrio'])!!}
        </div>
</div>
<div class="form-group ">
  {!!Form::label("ciudad_label",'Ciudad',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
    <div class="col-md-9 col-sm-9 col-xs-12">
                  <select name="ciudad" class="select2_single form-control" tabindex="-1">
                      @foreach($ciudades as $ciudad)
                          <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                      @endforeach
                    </select>
   </div>
     </div>

     <div class="form-group ">
             {!!Form::label("Logo",'Logo',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
             <div class="col-md-9 col-sm-9 col-xs-12">
             {!!Form::file('logo',null)!!}
             </div>
     </div>
     <div class="form-group ">
             {!!Form::label("fondo",'Fondo de Pagina',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
             <div class="col-md-9 col-sm-9 col-xs-12">
             {!!Form::file('fondo_pagina',null)!!}
             </div>
     </div>


     <div class="ln_solid"></div>
     <div class="form-group">
       <div class="col-md-6 col-sm-6 col-xs-6 text-right">
       <div class="btn-group">
         <a type ="reset" class="btn btn-app" href= "/clientes/create" ><i class="glyphicon glyphicon-refresh"></i> Limpiar</a>
        <button type="submit" class="btn btn-app" href= "#" ><i class="fa fa-check"></i> Procesar</button>

     </div>
   </div>
{!! Form::close() !!}
