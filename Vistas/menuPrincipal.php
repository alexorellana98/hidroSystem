 <?php
 session_start();
if(!$_SESSION["validar"]){
  echo '<script>
    location.href="login.php";
  </script>';
}
?>
 <!-- MENU LATERAL -->
 <div class="navbar nav_title" style="border: 0;">
              <a href="main.php" class="site_title"><i class="fa fa-tint"></i> <span>HIDROSIS</span></a>
            </div>

            <div class="clearfix"></div>

            <br />
 <!-- menu profile quick info -->
 <div class="profile clearfix">
              <!-- <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div> -->
</div>
            <!-- /menu profile quick info -->

 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Inicio<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../Vistas/main.php">SISPOZO</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Estacion Meteorologica<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../Vistas/estacionmeteorologica.php">Estacion Meteorologica</a></li>
                      <li><a href="../ProcesoSubir/SubirEstacion.php">Lectura Estación Meteorológica</a></li>
                      <li><a href="../Vistas/visitaestaciones.php">Visita Estaciones</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-tint"></i> Pozos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../Vistas/datosDePozos.php">Datos de pozos</a></li>
                      <li><a href="../Vistas/propietariospozos.php">Propietarios Pozos</a></li>
                      <li><a href="../Vistas/visitantespozos.php">Visitantes Pozos</a></li>
                      <li><a href="../ProcesoSubir/SubirPozos.php">Lectura de Pozos</a></li>
                      <li><a href="../Vistas/visitapozos.php">Visita Pozos</a></li>


                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Instituciones/Comunidades <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="ResponsablesEstaciones/responsablesestaciones.php">Responsables</a></li>
                    <li><a href="../Vistas/comunidades.php">Instituciones y Comunidades</a></li>


                    </ul>
                  </li>
                  <li><a><i class="fa fa-eye"></i> Observadores <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="../Vistas/observadorescomunales.php">Observadores Comunales.</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-mobile"></i>Equipos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="../Vistas/equipos.php">Equipos</a></li>
                    <li><a href="../Vistas/asignacionEquipos.php">Asignacion de Equipos</a></li>
                    </ul>
                  </li>
                  <!--REPORTES-->
                   <li><a><i class="fa fa-bar-chart-o"></i>Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../Reportes/Vista_Visita.php">Nivel de pozos segun visitas</a></li>
                        <li><a href="../Reportes/Vista_nivel_pozoSensor.php">Nivel de pozo promedio segun lecturas</a></li>
                        <li><a href="../Reportes/Vista_rainRayte.php">Rain Rate promedio</a></li>
                        <li><a href="../Reportes/BuVistaPromedio.php">Reporte temperatura promedio estaciones</a></li>
                        <li><a href="../Reportes/BuReprtePozDep.php">Reporte pozo por departamento</a></li>
                        <li><a href="../Reportes/vista_GD.php">Reporte temperatura pozo </a></li>
                        <li><a href="../Reportes/vista_GD1.php">Reporte Pozos Observacion</a></li>
                        <li><a href="../Reportes/Reporte_Visitantes.php">Reporte de visitantes registrados.</a></li>
                        <li><a href="../Reportes/Vista_VisitaPozo.php">Reporte de visitas a pozos.</a></li>
                        <li><a href="../Reportes/ReportePozosGeo.php" target="_blank">Reporte Pozos y su Geologia</a></li>
                        <li><a href="../Reportes/Reporte_datosPozos.php" target="_blank">Reporte de datos de pozos</a></li>
                        <li><a href="../Reportes/ReporteAsignacionEquipo.php" target="_blank">Reporte de Asignacion de Equipos</a></li>
                    </ul>
                  </li>
                  <!--REPORTES-->
                             <!--CONSULTAS-->
                  <li><a><i class="fa fa-mobile"></i>Consultas<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../Consultas/listapozo.php">Listado de datos Pozos</a></li>
                    <li><a href="../Consultas/medidas_basicas.php"> Listado de datos de Pozo por Medidas Basicas</a></li>
                    <li><a href="../Consultas/segun_geo.php">Listado de Pozos segun Geologia</a></li>
                    <li><a href="../Consultas/visitas_estaciones.php">Listado de visitas a las Estaciones</a></li>
                    <li><a href="../Consultas/visita_pozo.php">Listado de hoja de visita a Pozos</a></li>
                    <li><a href="../Consultas/lista_propietarios.php">Lista de Propietarios</a></li>
                    </ul>
                  </li>
                  <!--CONSULTAS-->
                 <li><a><i class="fa fa-user"></i>Usuarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../Vistas/usuarios.php?aux1=1">Gestión de usuario</a></li>
                    </ul>
                  </li>
                  <li><a href="../Vistas/login.php"><i class="fa fa-user"></i>Cerrar Sesion</a>
                    <ul class="nav child_menu">

                    </ul>
                  </li>
              </div>



              <!-- <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div> -->

            </div>
            <!-- /sidebar menu -->
