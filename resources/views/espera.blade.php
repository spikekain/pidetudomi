<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actualización de Servicio: <span id="codigo_servicio_espera_procesado">  <span></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form class="form-horizontal form-label-left" action="procesar_envio_espera2" method="post">
              <input type="hidden" name= "token_espera" value="{{csrf_token()}}" id="token_espera">
            <input type="hidden" name= "id_servicio_espera_procesado" value="" id="id_servicio_espera_procesado">
          <div class="col-md-2 col-sm-2 col-xs-2 form-group has-feedback">
            {!!Form::label("representante_label",'Codigo Contratista',['class'=>'control-label'])!!}
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2 form-group has-feedback">
              {!!Form::select('contratista_modal',$contratistas,null,['placeholder' => 'Seleccione un Valor...','class'=>'form-control', 'id'=>'contratista_modal'])!!}
          </div>
          <div class="col-md-8 col-sm-8 col-xs-8 form-group has-feedback">
          <input type="text" class="form-control" id="nombre_contratista_modal" placeholder="" disabled="true">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 col-sm-2 col-xs-2 form-group has-feedback">
            {!!Form::label("representante_label",'Valor Servicio',['class'=>'control-label'])!!}
          </div>
          <div class="col-md-10 col-sm-10 col-xs-10 form-group has-feedback">
          <input type="text" class="form-control" id="valor_servicio2" placeholder="Valor del Servicio ">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 col-sm-2 col-xs-2 form-group has-feedback">
            {!!Form::label("representante_label",'Detalles del Paquete',['class'=>'control-label'])!!}
          </div>
          <div class="col-md-10 col-sm-10 col-xs-10 form-group has-feedback">
          <input type="text" class="form-control" id="detalle_envio2" placeholder="Detalles del Paquete ">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <a class="btn btn-app" type = "submit" id="procesar_envio_espera2" data-dismiss="modal"><i class="glyphicon glyphicon-send"></i> Enviar Servicio</a>
          <a type ="reset" class="btn btn-app" href= "/home" id="CANCELAR" data-dismiss="modal"><i class="glyphicon glyphicon-refresh"></i> Cancelar</a>
        </div>

      </div>
      </form>
    </div>

  </div>
</div>
<section id="espera">
  <div class="">

    <div class="clearfix"></div>
    <div class="">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">

            <div class="text-left"></div>
             <ul class="nav navbar-right panel_toolbox">
               <button  id="cantidad_servicio_boton_0" class="btn btn-primary"  value = "0" type="button">
                Todos <span  class="badge"><small ><div id="cantidad_servicio0"></div></small></span>
               </button>
               <input  type = "hidden" class="form-control" name="tipos_servicios_espera" id="tipos_servicios_espera" value=0>
 @foreach ($tipo_servicios as $tipo_servicio)
    <?php
    $descripcion = $tipo_servicio->descripcion;
    $cantidad =$cantidad+1;
    ?>

 <button  id="cantidad_servicio_boton_{!!$tipo_servicio->id!!}" class="btn btn-default"  value = "{!!$tipo_servicio->id!!}" type="button">
  {!!$descripcion!!} <span  class="badge"><small ><div id="cantidad_servicio{!!$tipo_servicio->id!!}"></div></small></span>
</button>

  @endforeach
  </class>
  </ul>
            <div class="clearfix"></div>

          <div class="x_content">
              <!-- Modal content-->




            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action ">
                <thead>
                  <tr class="headings">
                    <th>
                      <input type="checkbox" id="check-all" class="flat">
                    </th>
                    <th class="column-title">Remitente </th>
                    <th class="column-title">Destinatario </th>
                    <th class="column-title">Detalle </th>

                    <th class="column-title no-link last"><span class="nobr"></span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>
              </table>
            </div>
              <div class="table-responsive">
                <table id= "servicios_espera" style = "width: 100%" class="table-bordered">
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
