
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
                  Tipo de Servicio Actualizado
                </div>
              @endif
              @if ($mensaje=='destroy')
                <div class="alert alert-danger " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Tipo de Servicio Eliminado
                </div>
              @endif
              <ul class="nav navbar-right panel_toolbox">

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="tipo_servicios/create">Añadir Tipo de Servicio</a>
                    </li>

                  </ul>
                </li>
                </li>
              </ul>


                <div class="table-responsive">

                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">Descipción </th>
                          <th class="column-title">Costo Adicional </th>

                        <th class="column-title no-link last"><span class="nobr"></span>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($tipo_servicios as $tipo_servicio)
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{$tipo_servicio->descripcion}}</td>
                          <td class=" ">{{$tipo_servicio->costo_adicional}}</td>
                        <td class=" last"><a href="#">{{link_to_route('tipo_servicios.edit', $title = 'Editar', $parameters = $tipo_servicio->id, $attributes = ['class'=>' btn btn-primary'])}}</a>
                        </td>
                      </tr>
                            @endforeach

                    </tbody>
                  </table>
                  {!!$tipo_servicios->render()!!}
                </div>
