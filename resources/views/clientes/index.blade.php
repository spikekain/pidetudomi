@extends('layouts.principal')
@section('content')
  <!-- page content -->


  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Clientes</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-users"></i> Listado de Clientes</h2>
              <ul class="nav navbar-right panel_toolbox">


                    <a class="btn btn-app" href= "clientes/create" id="espera_servicio" ><i class="glyphicon glyphicon-plus"></i> Añadir Clientes</a>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">


              <?php $mensaje=Session::get('mensaje')?>
              @if ($mensaje=='store')
                <div class="alert alert-success " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Cliente Registrado
              @endif
            </div>
              @if ($mensaje=='update')
                <div class="alert alert-success " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Cliente Actualizado
                </div>
              @endif
              @if ($mensaje=='destroy')
                <div class="alert alert-danger " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Cliente Eliminado
                </div>
              @endif

.
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

                      @foreach ($clientes as $cliente)
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{$cliente->nit}}</td>
                        <td class=" ">{{$cliente->nombre}} </td>
                        <td class=" ">{{$cliente->direccion}}</td>
                        <td class=" ">{{$cliente->telefono1}}</td>
                        <td class=" ">{{$cliente->email}}</td>
                        <td class=" last"><a href="/clientes/{{$cliente->id}}/edit"><input  tooltip= "editar" style = "max-height:25px" type="image"  src="images/edit.png"   data-toggle="modal"  id="editar_envio_espera" > </input></a>
                        </td>
                      </tr>
                            @endforeach

                    </tbody>
                  </table>
                  {!!$clientes->render()!!}
                </div>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>



@endsection
