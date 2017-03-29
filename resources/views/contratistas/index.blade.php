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
              <h2><i class="fa fa-bars"></i> Listado de Contratistas</h2>
              <ul class="nav navbar-right panel_toolbox">

                <a class="btn btn-app" href= "contratistas/create" id="espera_servicio" ><i class="glyphicon glyphicon-plus"></i> Añadir Contratista</a>
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
                  Contratista Actualizado
                </div>
              @endif
              @if ($mensaje=='destroy')
                <div class="alert alert-danger " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Contratista Eliminado
                </div>
              @endif


                <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">NIT </th>
                        <th class="column-title">Nombre </th>
                        <th class="column-title">Direccion </th>
                        <th class="column-title">Telefono </th>
                        <th class="column-title">Correo </th>
                        <th class="column-title no-link last"><span class="nobr"></span>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($contratistas as $contratista)


                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{$contratista->nit}}</td>
                        <td class=" ">{{$contratista->nombre}} </td>
                        <td class=" ">{{$contratista->direccion}}</td>
                        <td class=" ">{{$contratista->telefono1}}</td>
                        <td class=" ">{{$contratista->email}}</td>
                        <td class=" last"><a href="#">{{link_to_route('contratistas.edit', $title = 'Editar', $parameters = $contratista->id, $attributes = ['class'=>' btn btn-primary'])}}</a>
                        </td>
                      </tr>
                            @endforeach

                    </tbody>
                  </table>
                  {!!$contratistas->render()!!}
                </div>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>



@endsection
