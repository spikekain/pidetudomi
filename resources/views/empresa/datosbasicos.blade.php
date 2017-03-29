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
    Empresa Actualizada
  </div>
@endif

{!! Form::model($empresas,['route'=>['empresa.update',$id_empresa], 'files'=>'true' ,'method'=>'PATCH','class'=>' form-horizontal form-label-left']) !!}
<div class="form-group ">
        {!!Form::label("codigo_label",'Código',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('codigo',$codigo_empresa,['class'=>'form-control','placeholder'=>'Codigo'],'disabled')!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("nit_label",'NIT',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('nit',$nit_empresa,['class'=>'form-control','placeholder'=>'NIT'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("nombre_label",'Nombre',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('nombre',$nombre_empresa,['class'=>'form-control','placeholder'=>'Nombre'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("direccion_label",'Dirección',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('direccion',$direccion_empresa,['class'=>'form-control','placeholder'=>'Dirección'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("telefono1_label",'Teléfono Principal',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('telefono1',$telefono1_empresa,['class'=>'form-control','placeholder'=>'Teléfono Principal'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("telefono2_label",'Teléfono Auxiliar',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('telefono2',$telefono2_empresa,['class'=>'form-control','placeholder'=>'Teléfono Auxiliar'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("telefono3_label",'Email',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('email',$email_empresa,['class'=>'form-control','placeholder'=>'Email'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("telefono3_label",'Servicio Minimo',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('precio_base',$precio_base_empresa,['class'=>'form-control','placeholder'=>'Monto Serivicio Minimo'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("telefono3_label",'Precio Kilometro Adicional',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('precio_km',$precio_km_empresa,['class'=>'form-control','placeholder'=>'Precio Kilometro Adicional'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("telefono3_label",'Kilometros para KM Adicional',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('minimo_km',$minimo_km_empresa,['class'=>'form-control','placeholder'=>'Kilometro para cobrar Adicional'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("telefono3_label",'Adicional por Ida y Vuelta',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('ida_vuelta',$ida_vuelta,['class'=>'form-control','placeholder'=>'Kilometro para cobrar Adicional'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("representante_label",'Representante Legal',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::text('representante_legal',$representante_legal_empresa,['class'=>'form-control','placeholder'=>'Representante Legal'])!!}
        </div>
</div>
<div class="form-group ">
  {!!Form::label("ciudad_label",'Ciudad',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
    <div class="col-md-9 col-sm-9 col-xs-12">
                  <select name="ciudad" class="select2_single form-control" tabindex="-1">
                      @foreach($ciudades as $ciudad)
                        <?php if ($ciudad_empresa == $ciudad->id)
                        {
                          ?>
                            <option  selected="true"value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                          <?php
                        }else{
                          ?>
                          <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                          <?php
                        }
                        ?>

                      @endforeach
                    </select>
   </div>
     </div>
     <div class="form-group ">
       {!!Form::label("ciudad_label",'Logo',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
         <div class="col-md-9 col-sm-9 col-xs-12">
           <input type="file" id="file" name="file" class= "form-control" />
<img src="/images/logos/{{$logo}}" id="image" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">

<script>
document.getElementById("file").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>


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
