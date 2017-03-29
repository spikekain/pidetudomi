<?php $mensaje=Session::get('mensaje')?>
@if ($mensaje=='store')
  <div class="alert alert-success " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Usuario Registrado
  </div>
@endif
<?php
$id_empresa=1;
$id_empresa=Auth::user()->empresa;

?>
{!! Form::model($empresas,['route'=>['reporte_empresa.update',1],'method'=>'PUT','class'=>' form-horizontal form-label-left']) !!}

<div class="form-group ">
        {!!Form::label("codigo_label",'Observaciones Cuenta de Cobro',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">

        {!!Form::textarea('reporte1',$reporte1,['placeholder'=>'Contenido del Reporte','class'=>'form-control'])!!}
        </div>
</div>
<div class="form-group ">
        {!!Form::label("codigo_label",'Observaciones  Notas Contables',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">
        {!!Form::textarea('reporte2',$reporte2,['placeholder'=>'Contenido del Reporte','class'=>'form-control'])!!}
        </div>
</div>

<div class="form-group ">
        {!!Form::label("codigo_label",'Observaciones Slogan Tirilla Servicios',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">

        {!!Form::textarea('reporte3',$reporte3,['placeholder'=>'Contenido del Reporte' ,'class'=>'form-control'])!!}
        </div>
</div>

<div class="form-group ">
        {!!Form::label("codigo_label",'Observaciones  Reporte 4',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
        <div class="col-md-9 col-sm-9 col-xs-12">

        {!!Form::textarea('reporte4',$reporte4,['placeholder'=>'Contenido del Reporte' ,'class'=>'form-control'])!!}
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
<script>
  $(document).ready(function() {
if ("onwebkitspeechchange" in document.createElement("input")) {
  var editorOffset = $('#editor').offset();

  $('.voiceBtn').css('position', 'absolute').offset({
    top: editorOffset.top,
    left: editorOffset.left + $('#editor').innerWidth() - 35
  });
} else {
  window.prettyPrint;
  prettyPrint();
});
};
</script>
