@extends('layouts.principal')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Analisis de Clientes</h3>
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



                  <form class="form-horizontal" action="/analisis_clientes/consulta" method="post">
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                      {!!Form::label("telefono3_label",'Fecha de Inicio',['class'=>'control-label col-md-1 col-sm-1 col-xs-4'])!!}
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        {!!Form::date('fecha_inicio', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                      </div>
                      {!!Form::label("telefono3_label",'Fecha de Finalización',['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])!!}
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        {!!Form::date('fecha_fin', \Carbon\Carbon::now(),['class'=>'form-control']);!!}
                      </div>
                      {!!Form::label("telefono3_label",'Dias a Revisar',['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])!!}
                      <div class="col-md-1 col-sm-1 col-xs-1">
                      {!!Form::text('dias',null,['class'=>'form-control','placeholder'=>'Dias a Revisar'])!!}
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                        <div class="btn-group">
                          <a type ="reset" class="btn btn-app" href= "/analisis_servicios" ><i class="glyphicon glyphicon-refresh"></i> Limpiar</a>
                         <button type="submit" class="btn btn-app" href= "#" ><i class="fa fa-search"></i> Buscar</button>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">
                    <br>

                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <br>


                </div>
              </div>
      </div>
      <div class="clearfix"></div>
      <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-bars"></i> TOP 20</h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">
<h4> TOP 20</h4>
      <div class="col-md-6 col-sm-6 col-xs-6">

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
       <script type="text/javascript">
         google.charts.load("current", {packages:['corechart']});
         google.charts.setOnLoadCallback(drawChart);
         function drawChart() {
           <?php $cantidad=0; ?>
           var data = google.visualization.arrayToDataTable([
             ["Cliente", "Cantidad", { role: "style" } ],
                   @foreach ($servicios as $servicio)


                   <?php $cantidad=$cantidad + 1; ?>
               ["{{$servicio->nombre_remitente}}",{{$servicio->cantidad_servicio}},"<?php
               switch ($cantidad % 5) {
    case 0:
        echo "#4da6f9";
        break;
    case 1:
        echo "#3f8cd3";
        break;
    case 2:
        echo "#3375b2";
        break;
    case 3:
        echo "#25527c";
        break;
        case 4:
            echo "#162e44";
            break;
}


               ?> "],

                   @endforeach

           ]);

           var view = new google.visualization.DataView(data);
           view.setColumns([0, 1,
                            { calc: "stringify",
                              sourceColumn: 1,
                              type: "string",
                              role: "annotation" },
                            2]);

           var options = {
             title: "Clientes por Cantidad",
             width: 1000,
             height: 500,
             bar: {groupWidth: "95%"},
             legend: { position: "none" },
           };
           var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
           chart.draw(view, options);
       }
       </script>
     <div id="columnchart_values" style="width: 100%; height: 100%;"></div>
   </div>
   <div class="col-md-6 col-sm-6 col-xs-6">
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        <?php $cantidad=0; ?>
        var data = google.visualization.arrayToDataTable([
          ["nombre_remitente", "Cantidad", { role: "style" } ],
                @foreach ($servicios2 as $servicio)

                <?php $cantidad=$cantidad + 1; ?>
            ["{{$servicio->nombre_remitente}}",{{$servicio->suma}},"<?php
            switch ($cantidad % 5) {
 case 0:
     echo "#4da6f9";
     break;
 case 1:
     echo "#3f8cd3";
     break;
 case 2:
     echo "#3375b2";
     break;
 case 3:
     echo "#25527c";
     break;
     case 4:
         echo "#162e44";
         break;
}


            ?> "],

                @endforeach

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                         { calc: "stringify",
                           sourceColumn: 1,
                           type: "string",
                           role: "annotation" },
                         2]);

        var options = {
          title: "Clientes Por Monto",
          width: 1000,
          height: 500,
          bar: {groupWidth: "95%"},
          legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
        chart.draw(view, options);
    }
    </script>
  <div id="columnchart_values2" style="width: 100%; height: 100%;"></div>
</div>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>



@endsection
