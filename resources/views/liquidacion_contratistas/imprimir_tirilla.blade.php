@extends('layouts.principal')
@section('content')

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Liquidación de Contratistas</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>liquidacion Terminada </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="/clientes"class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-6 col-sm-6 col-xs-6 text-right">
              <div class="btn-group">
                <a class="btn btn-app" href= "/imprimir_tirilla/{{$id_liquidacion}}"  ><i class="fa fa-print"></i> Imprimir</a>

            </div>
          </form>
          </div>

              </div>
              </div>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

{!!Html::script('js/script.js')!!}
@stop
