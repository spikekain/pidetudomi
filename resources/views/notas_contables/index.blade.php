@extends('layouts.principal')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Notas Contables</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-bars"></i> Listados de Notas Contables</h2>
              <ul class="nav navbar-right panel_toolbox">
                  <a class="btn btn-app" href= "/notas_contables/create"  ><i class="glyphicon glyphicon-plus"></i> Añadir Nota Contable</a>
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
                        <th class="column-title">Fecha </th>
                        <th class="column-title">Proveedor </th>
                        <th class="column-title">Nit </th>

                        <th class="column-title">Descripcion</th>
                        <th class="column-title">Responsable</th>
                        <th class="column-title">Monto </th>
                        <th class="column-title no-link last"><span class="nobr"></span>
                        </th>

                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($notas as $nota)


                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{$nota->fecha}} </td>
                        <td class=" ">{{$nota->proveedor}}</td>
                        <td class=" ">{{$nota->nit}} </td>

                        <td class=" ">{{$nota->descripcion}}</td>
                        <td class=" ">{{$nota->responsable}}</td>
                        <td class=" ">{{$nota->monto}}</td>



                        </td>
                      </tr>
                            @endforeach

                    </tbody>
                  </table>
                  {!!$notas->render()!!}
                </div>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>



@endsection
