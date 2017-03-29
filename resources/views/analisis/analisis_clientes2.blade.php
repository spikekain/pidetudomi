@extends('layouts.principal')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Cositas</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-bars"></i> Estado de Clientes</h2>
              <ul class="nav navbar-right panel_toolbox">
                  <a class="btn btn-app" href= "/prestamos/create" id="espera_servicio" ><i class="glyphicon glyphicon-plus"></i> Añadir Prestamo</a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">Cliente </th>
                        <th class="column-title">Primera Etapa </th>
                        <th class="column-title">Segunda Etapa </th>

                        <th class="column-title no-link last"><span class="nobr"></span>
                        </th>

                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($servicios as $servicio)


                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{$servicio->nombre_remitente}}</td>
                        <td class=" ">{{$servicio->primera_etapa}} </td>
                        <td class=" ">{{$servicio->segunda_etapa}}</td>
                        </td>
                      </tr>
                            @endforeach

                    </tbody>
                  </table>
          
                </div>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection
