@extends('layouts.principal')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Detalle de Cartera Cliente</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                <h2>Consolidado de Cartera</h2>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <br />
                    {!! Form::open(['route'=>'cartera.store','method'=>'POST','class'=>' form-horizontal form-label-left']) !!}
                        <input type="hidden" value="{{$telefono_cliente}}" name="telefono_cliente" id="telefono_cliente">
                  <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td><strong>Cantidad de Facturas Pendientes</strong></td>
                          <td align="right">{!!$cantidad!!}</td>
                          <td><strong>Total Deuda Pendiente</strong></td>
                          <td align="right">{!!number_format($total, 2, ',', '.')!!}</td>
                        </tr>
                        <tr>
                          <td><strong>Tipo de Documento</strong></td>
                          <td ><select class="form-control">
                                <option value="1">Abono</option>
                                <option value="2">Factura</option>
                              </select></td>

                          <td><strong>Descripción</strong></td>
                          <td ><input type="text" class="form-control" name="descripcion"></td>
                        </tr>
                        <tr>
                          <td><strong>Referencia</strong></td>
                          <td ><input type="text" class="form-control" name="referencia"></td>
                          <td><strong>Valor</strong></td>
                          <td><input type="text" class="form-control" name="valor"></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                    <div class="btn-group">
                      <a class="btn btn-app" href= "/cartera"  ><i class="glyphicon glyphicon-triangle-left"></i> Atras</a>
                     <button type="submit" class="btn btn-app" href= "#"  ><i class="glyphicon glyphicon-ok"></i> Procesar</button>
                  </div>
                </form>
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
