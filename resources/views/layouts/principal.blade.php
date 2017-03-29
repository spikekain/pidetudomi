<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    header("access-control-allow-origin: *");

     ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tu Mensajeria</title>
    {!!Html::style('gentella/vendors/bootstrap/dist/css/bootstrap.min.css')!!}
    {!!Html::style('gentella/vendors/font-awesome/css/font-awesome.min.css')!!}
    {!!Html::style('gentella/vendors/iCheck/skins/flat/green.css')!!}
    {!!Html::style('gentella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')!!}
    {!!Html::style('gentella/production/css/maps/jquery-jvectormap-2.0.3.css')!!}
    {!!Html::style('gentella/build/css/custom.css')!!}



    <!-- Bootstrap -->

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/home" class="site_title"> <span>PidetuDomi.com</span></a>
            </div>
            <div class="clearfix"></div>

            <!-- menu profile quick info -->

            <div class="profile">
              <div class="profile_pic">
                <img src="/images/User.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido, a <strong>{{strtoupper(Auth::user()->empresa)}}</strong></span>
                <h2>{{ Auth::user()->name}} </h2>
                <hr>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="/home"><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>

                  </li>
                  <li><a><i class="fa fa-edit"></i> Terceros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/clientes">Clientes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Caja Menor <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/notas_contables">Notas Contables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/servicios">Servicios</a></li>
                      <li><a href="/informeclientes">Informes Clientes</a></li>
                      <li><a href="/informe_general">Informe General</a></li>
                      <li><a href="/cartera">Cartera</a></li>
                      <li><a href="/cierre_caja">Cierre de Caja</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Nomina <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/contratistas">Contratistas</a></li>
                      <li><a href="/liquidacion_contratista">Liquidacion Contratistas</a></li>
                        <li><a href="/prestamos">Prestamos</a></li>
                          <li><a href="/estado_pagos_contratista">Estado de Pagos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Empresa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/empresa">Perfil de Empresa</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-shopping-cart"></i>Analisis de Ventas<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/analisis_servicios">Analisis de Servicios</a></li>
                      <li><a href="/analisis_clientes">Analisis de Clientes</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>


              <ul class="nav navbar-nav navbar-right">

                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user aero"></i>
                          {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> <i class="fa fa-gear"></i>   Perfil</a></li>
                    <li><a href="javascript:;"> <i class="fa fa-question"></i>  Ayuda</a></li>
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                     <i class="fa fa-sign-out"></i>  Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
@yield('content')
        <footer>
          <div class="pull-right">
            Pidetudomi.com la mejor opcion para controlar tus envios
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

{!!Html::script("https://maps.googleapis.com/maps/api/js?key=AIzaSyCLc2sEjf0B9--ziuVVGCpkj_cEDY5Cl5k&libraries=places,geometry")!!}
{!!Html::script('js/script_reportes_servicios.js')!!}
{!!Html::script('js/jscolor.js')!!}
{!!Html::script('gentella/vendors/jquery/dist/jquery.min.js')!!}
{!!Html::script('gentella/vendors/bootstrap/dist/js/bootstrap.min.js')!!}
{!!Html::script('js/script.js')!!}
{!!Html::script('gentella/vendors/iCheck/icheck.min.js')!!}
{!!Html::script('gentella/vendors/skycons/skycons.js')!!}
{!!Html::script('gentella/vendors/Flot/jquery.flot.js')!!}
{!!Html::script('gentella/vendors/Flot/jquery.flot.pie.js')!!}
{!!Html::script('gentella/vendors/Flot/jquery.flot.time.js')!!}
{!!Html::script('gentella/vendors/Flot/jquery.flot.stack.js')!!}
{!!Html::script('gentella/vendors/Flot/jquery.flot.resize.js')!!}
{!!Html::script('gentella/production/js/flot/jquery.flot.orderBars.js')!!}
{!!Html::script('gentella/production/js/build/date.js')!!}
{!!Html::script('gentella/production/js/flot-spline/js/jquery.flot.spline.js')!!}
{!!Html::script('gentella/vendors/jqvmap/dist/jquery.vmap.js')!!}
{!!Html::script('gentella/vendors/jqvmap/dist/maps/jquery.vmap.world.js')!!}
{!!Html::script('gentella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')!!}
{!!Html::script('gentella/production/js/moment/moment.min.js')!!}
{!!Html::script('gentella/production/js/datepicker/daterangepicker.js')!!}
{!!Html::script('gentella/build/js/custom.min.js')!!}
{!!Html::script('gentella/vendors/jquery/dist/jquery.min.js')!!}



  </body>
</html>
