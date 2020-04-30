<?php
session_start();
include('../control/configBd.php');
include('../modelo/Usuario.php');
include('../control/ControlUsuario.php');
include('../control/ControlConexion.php');


$objUsuario=new Usuario($_SESSION['Usu'],'','');
$objCtrUsuario =new ControlUsuario($objUsuario);
$resultUsuario=$objCtrUsuario->consultarPerfil();

if($_SESSION['Usu'] ==  null){
    header('Location: ../index.php');
}
if($resultUsuario !=  'clie'){
    header('Location: menuGeneral.php');
}

echo"
<!doctype html>
<html class='no-js' lang='zxx'>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>
    <title>Distribuidora</title>
    <meta name='description' content=''>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
                <!-- controles de form de perfil -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!--estilo responsive bootstrap-->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    
    <!--control para pestañas de menu de perfil -->
    <!--<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>-->



                 <!-- archivos CSS de stilo de pagina-->
    <!-- navbar -->
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <!--css para la animacion de los div deslizantes-->
    <link rel='stylesheet' href='css/animate.min.css'>
    <!--manejo para autoajustar navbar-->
    <link rel='stylesheet' href='css/slicknav.css'>
    <link rel='stylesheet' href='css/slick.css'>
    <!--css estilo general de la pagina-->
    <link rel='stylesheet' href='css/style.css'>
    <!--css para los icones de redes sociales-->
    <link rel='stylesheet' href='css/font-awesome.min.css'>
    <link rel='stylesheet' href='css/themify-icons.css'>

    
</head>

<body>

    <header>
        <div class='header-area '>
            <div id='sticky-header' class='main-header-area'>
                <div class='container-fluid'>
                    <div class='row align-items-center'>
                        <div class='col-xl-3 col-lg-2'>
                            <div class='logo'>
                                <a href='menuGeneral.php'>
                                    <h1 style='color: white'>Distribuidora</h1>
                                </a>
                            </div>
                        </div>
                        <div class='col-xl-6 col-lg-7'>
                            <div class='main-menu  d-none d-lg-block'>
                                <nav>
                                    <ul id='navigation'>
                                    <li><a href='#'>Producto <i class='ti-angle-down'></i></a>
                                        <ul class='submenu'>
                                            <li><a href='listaProductos.php'>Catalogo de productos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href='#'>Cliente <i class='ti-angle-down'></i></a>
                                        <ul class='submenu'>
                                            <li><a href='datosCliente.php'>Ver datos</a></li>
                                        </ul>
                                    </li>
                                        <li><a href='#'>Proveedor <i class='ti-angle-down'></i></a>
                                            <ul class='submenu'>
                                                <li><a href='blog.html'>Datos</a></li>
                                                <li><a href='single-blog.html'>Actualizar datos</a></li>
                                            </ul>
                                        </li>
                                        <li><a href='#'>Empleado <i class='ti-angle-down'></i></a>
                                            <ul class='submenu'>
                                                 <li><a href='GestionProducto.php'>Nuevo</a></li>
                                                 <li><a href='listaProductos.php'>Lista de productos</a></li>
                                            </ul>
                                        </li>
                                        <li><a href='menuAdmin.php'>Gestión Admin</a></li>
                                        <li><a href='Ubicacion.php'>🌍Mapa</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                            <div class='Appointment'>
                                <div class='book_btn d-none d-lg-block'>
                                    <a  href='cerrarSesion.php'>Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                        <div class='col-12'>
                            <div class='mobile_menu d-block d-lg-none'></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

   

    <!-- div para descargar aplicacion  -->
    <div class='productivity_area'>
        <div class='container'>
            <div class='row align-items-center'>
                <div class='col-xl-7 col-md-12 col-lg-6'>
                   



                <head>
  
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <!--estilo responsive bootstrap-->
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
                
                <!--control para pestañas de menu de perfil -->
                <!--<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>-->
              
              </head>
              
              <hr>
              <div class='container bootstrap snippet'>
                  <div class='row'>
                        <div class='col-sm-10'><h1>Datos</h1></div>
                  </div>
                  <div class='row'>
                        <div class='col-sm-3'>
                            
              
                    <div class='text-center'>
                      <img src='fotoCliente/cliente2.jpg' class='avatar img-circle img-thumbnail' alt='avatar'>
                      <h6>Cargar una foto o imagen diferente...</h6>
                      <input type='file' class='text-center center-block file-upload'>
                    </div></hr><br>
              
                             
                        <div class='panel panel-default'>
                          <div class='panel-heading'>Nombre de usuario<i class='fa fa-link fa-1x'></i></div>
                          <div class='panel-body'><a href='http://bootnipets.com'>cliente1</a></div>
                        </div>
                        
                             
                       <!-- pestañas del menu del perfil --> 
                      </div>
                      <div class='col-sm-9'>
                          <ul class='nav nav-tabs'>
                              <li class='active'><a data-toggle='tab' href='#home'>Información</a></li>
                              <!--<li><a data-toggle='tab' href='#'>Menu 1</a></li>-->
                              
                            </ul>
                      <!-- fin de pestañas  --> 
              
                            
                        <div class='tab-content'>
                          <div class='tab-pane active' id='home'>
                              <hr>
                                <form class='form' action='datosCliente.php' method='post' id='registrationForm'>
                                    <div class='form-group'>
                                        
                                        <div class='col-xs-6'>
                                            <label for='first_name' style='color: white;'><h4>Nombre</h4></label>
                                            <input type='text' class='form-control' name='first_name' id='first_name' placeholder='Nombre y apellido' title='enter your first name if any.'>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        
                                        <div class='col-xs-6'>
                                          <label for='last_name' style='color: white;'><h4>Documento</h4></label>
                                            <input type='text' class='form-control' name='last_name' id='last_name' placeholder='Documento' title='enter your last name if any.'>
                                        </div>
                                    </div>
                        
                                    <div class='form-group'>
                                        
                                        <div class='col-xs-6'>
                                            <label for='phone' style='color: white;'><h4>Fecha de registro</h4></label>
                                            <input type='date' class='form-control' name='phone' id='phone' placeholder='enter phone' title='enter your phone number if any.'>
                                        </div>
                                    </div>
                        
                                    <div class='form-group'>
                                        <div class='col-xs-6'>
                                           <label for='mobile' style='color: white;'><h4>Crédito</h4></label>
                                            <input type='text' class='form-control' name='mobile' id='mobile' placeholder='Crédito' title='enter your mobile number if any.'>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        
                                        <div class='col-xs-6'>
                                            <label for='email' style='color: white;'><h4>Email</h4></label>
                                            <input type='email' class='form-control' name='email' id='email' placeholder='ejemplo@email.com' title='enter your email.'>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        
                                        <div class='col-xs-6'>
                                            <label for='email' style='color: white;'><h4>Telefono</h4></label>
                                            <input type='phone' class='form-control' id='location' placeholder='Número de telefono' title='enter a location'>
                                        </div>
                                    </div>
                                  
              
                                    <div class='form-group'>
                                         <div class='col-xs-12'>
                                              <br>
                                                <button class='btn btn-lg btn-success' type='submit'><i class='glyphicon glyphicon-ok-sign'></i> Guardar</button>
                                                 <button class='btn btn-lg' type='reset'><i class='glyphicon glyphicon-repeat'></i> Reestablecer    </button>
                                          </div>
                                    </div>
                                </form>
                            
                            <hr>
                            
                           </div>
              
                      </div>
                  </div>
                    </div>
                    </div>              



                </div>
                <div>
                   
                </div>
            </div>
        </div>
    </div>
    <!--/ fin de div para descargar la app  -->

    <!-- Aquí inicia el pie de pagina -->
    <footer class='footer'>
        <div class='footer_top'>
            <div class='container'>
                <div class='row'>
                    <div class='col-xl-4 col-md-6 col-lg-4'>
                        <div class='footer_widget'>
                            <div class='footer_logo'>
                                <a href='#'>
                                    <p>Distribuidora</p>
                                </a>
                            </div>
                            <p>
                                Más de 20 años cumpliento con las necesitades de las personas.
                            </p>
                            <div class='socail_links'>
                                <ul>
                                    <li>
                                        <a href='#'>
                                            <i class='ti-facebook'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            <i class='ti-twitter-alt'></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            <i class='fa fa-instagram'></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class='col-xl-2 offset-xl-1 col-md-6 col-lg-3'>
                        <div class='footer_widget'>
                            <h3 class='footer_title'>
                                    Services
                            </h3>
                            <ul>
                                <li><a >Administración</a></li>
                                <li><a >Atención al cliente</a></li>
                                <li><a >Chat</a></li>
                            </ul>

                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
        <div class='copy-right_text'>
            <div class='container'>
                <div class='footer_border'></div>
                <div class='row'>
                    <div class='col-xl-12'>
                        <p class='copy_right text-center'>
                            Copyright &copy; Realizado por John Rios & Jorge Pineda 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ fin del pie de pagina  -->

    <!-- js para movimiento de navbar -->
    <script src='js/vendor/jquery-1.12.4.min.js'></script>
    
    <script src='js/jquery.slicknav.min.js'></script>
    <script src='js/jquery.magnific-popup.min.js'></script>
    <script src='js/main.js'></script>
</body>

</html>
        ";
?>