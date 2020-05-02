<?php
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');
if($_SESSION['per'] != "admin"){
  echo "<script>alert('Usted no tiene acceso a esta área')</script>";
  header('Location: menuGeneral.php');
}else{
echo"
<!doctype html>
<html class='no-js' lang='zxx'>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>
    <title>Distribuidora</title>
    <meta name='description' content=''>
    <meta name='viewport' content='width=device-width, initial-scale=1'>


    


                 <!-- archivos CSS -->
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
                                <li><a href='#'>Gestión usuario <i class='ti-angle-down'></i></a>
                                    <ul class='submenu'>
                                        <li><a href='GestionUsuario.php'>Nuevo usuario</a></li>
                                        <li><a href='listaUsuarios.php'>Lista de usuarios</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>Gestión Admin <i class='ti-angle-down'></i></a>
                                    <ul class='submenu'>
                                        <li><a href='GestionEmpleado.php'>Empleado</a></li>
                                        <li><a href='GestionProveedor.php'>Proveedor</a></li>
                                        <li><a href='GestionCliente.php'>Cliente</a></li>
                                        <li><a href='GestionProducto.php'>Producto</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>Producto <i class='ti-angle-down'></i></a>
                                        <ul class='submenu'>
                                            <li><a href='listaProductos.php'>Catalogo de productos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href='#'>Cliente <i class='ti-angle-down'></i></a>
                                        <ul class='submenu'>
                                            <li><a href='datosCliente.php'>ver datos</a></li>
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
                                                 <li><a href='datosEmpleado.php'>Ver datos</a></li>
                                                 <li><a href=''>Lista de productos</a></li>
                                            </ul>
                                        </li>
                            </ul>
                        </nav>
                            </div>
                        </div>
                        <div class='col-xl-3 col-lg-3 d-none d-lg-block'>
                            <div class='Appointment'>
                                <div class='book_btn d-none d-lg-block'>
                                <label id='nomUsuario' style='color:white'>";
                                echo "👤 ".$_SESSION['Usu']. "   
                                </label>
                                    <a  href='cerrarSesion.php' style='border-color: white'>Cerrar sesión</a>
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

    <!-- control deslizante azul -->
    <div class='slider_area'>
        <div class='single_slider  d-flex align-items-center slider_bg_1'>
            <div class='container'>
                <div class='row align-items-center'>
                    <div class='col-xl-7 col-md-6'>
                        <div class='slider_text '>
                            <h3 class='wow fadeInDown' data-wow-duration='1s' data-wow-delay='.1s' >Ha ingresado como ADMINISTRADOR<br></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- div para descargar aplicacion  -->
    <div class='productivity_area'>
        <div class='container'>
            <div class='row align-items-center'>
                <div class='col-xl-7 col-md-12 col-lg-6'>
                    <h3 class='wow fadeInDown' data-wow-duration='1s' data-wow-delay='.1s'>Obtenla ahora en tu dispositivo <br>
                            e incrementa tu productividad</h3>
                </div>
                <div>
                    <div>
                                <img src='img/ilstrator/play.svg' alt=''>
                    </div>
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

    <!-- JS  -->
    <!-- js para movimiento de navbar -->
    <script src='js/vendor/jquery-1.12.4.min.js'></script>
    
    <script src='js/jquery.slicknav.min.js'></script>
    <script src='js/jquery.magnific-popup.min.js'></script>
    <script src='js/main.js'></script>
</body>

</html>
        ";
}?>