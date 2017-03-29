@extends('layouts.principal')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Cartera Pendiente</h3>
        </div>
      </div>
      <div class="clearfix"></div>



      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Búsqueda</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <br />
                                       <form class="form-horizontal" action="/cartera/consulta" method="post">
                                           <div class="col-md-12 col-sm-12 col-xs-12 ">

                                         <div class="form-group">
                                           <label class="control-label col-md-1 col-sm-1 col-xs-2">Cliente</label>
                                           <div class="col-md-2 col-sm-2 col-xs-2">
                                             <input name="telefono_cliente_reporte" id= "telefono_cliente_reporte" type="text" class="form-control" placeholder="Telefono Cliente">
                                           </div>
                                           <div class="col-md-9 col-sm-9 col-xs-9">
                                             <input type="text" name="nombre_cliente_reporte" id="nombre_cliente_reporte" disabled class="form-control" placeholder="Default Input">
                                           </div>
                                         </div>
                                       </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">
                    <br>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <br>
                      <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                      <div class="btn-group">
                        <a type ="reset" class="btn btn-app" href= "/informeclientes" ><i class="glyphicon glyphicon-refresh"></i> Limpiar</a>
                       <button type="submit" class="btn btn-app" href= "#"  ><i class="fa fa-search"></i> Buscar</button>

                    </div>
                  </div>
                </div>
              </div>
      </div>

      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <div class="container">

            </div>
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
                      <th class="column-title">Telefono Cliente</th>
                      <th class="column-title">Nombre Cliente</th>
                      <th class="column-title">Fecha de Emisión </th>
                      <th class="column-title">Total Factura</th>
                      <th  class="column-title text-right">Saldo Actual </th>

                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($cartera as $detalle_cartera)


                    <tr class="even pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <?php

                       ?>
                      <td class=" ">{{$detalle_cartera->cliente}} </td>
                      <td class=" ">{{$detalle_cartera->nombre}}</td>
                      <td class=" ">{{$detalle_cartera->fecha_creacion}}</td>
                      <td class=" ">{{$detalle_cartera->total_deuda}} </td>
                      <td class="text-right ">{{$detalle_cartera->saldo}}</td>




                    </tr>
                          @endforeach

                  </tbody>
                  </table>
                  {!!$cartera->render()!!}

              </div>



            </div>
          </div>
        </div>
      </div>
    </div>

  </div>





@endsection
