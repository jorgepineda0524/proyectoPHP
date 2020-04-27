<?php
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');
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
                                        <li><a href='features.html'>Empleado</a></li>
                                        <li><a href='Pricing.html'>Cliente</a></li>
                                        <li><a href='#'>Proveedor <i class='ti-angle-down'></i></a>
                                            <ul class='submenu'>
                                                <li><a href='blog.html'>Datos</a></li>
                                                <li><a href='single-blog.html'>Actualizar datos</a></li>
                                            </ul>
                                        </li>
                                        <li><a href='#'>Producto <i class='ti-angle-down'></i></a>
                                            <ul class='submenu'>
                                                 <li><a href='elements.html'>Nuevo</a></li>
                                                 <li><a href='elements.html'>Borrar</a></li>
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

    <!-- control deslizante azul -->
    <div class='slider_area'>
        <div class='single_slider  d-flex align-items-center slider_bg_1'>
            <div class='container'>
                <div class='row align-items-center'>
                    <div class='col-xl-7 col-md-6'>
                        <div class='slider_text '>
                            <h3 class='wow fadeInDown' data-wow-duration='1s' data-wow-delay='.1s' >Bienvenido a Distribuidora <br>
                            </h3>
                            <p class='wow fadeInLeft' data-wow-duration='1s' data-wow-delay='.1s'>Maneja todas tus solicitudes de forma rápida y segura.</p>
                            
                        </div>
                    </div>
                    <div class='col-xl-5 col-md-6'>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin control deslizante -->

    <!-- div de los servicios de la pagina  -->
    <div class='service_area'>
        <div class='container'>
            <div class='row'>
                <div class='col-xl-12'>
                    <div class='section_title text-center  wow fadeInUp' data-wow-duration='.5s' data-wow-delay='.3s'>
                        <h3>Sistema de gestión web</h3>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-4 col-md-4'>
                    <div class='single_service text-center wow fadeInUp' data-wow-duration='.6s' data-wow-delay='.4s'>
                        <div class='thumb'>
                                <img src='img/icon/2.svg' alt=''>
                        </div>
                        <h3>Ubicación de clientes, proveedores y empleados</h3>
                    </div>
                </div>
                <div class='col-lg-4 col-md-4'>
                        <div class='single_service text-center wow fadeInUp' data-wow-duration='.7s' data-wow-delay='.5s'>
                                <div class='thumb'>
                                        <img src='img/icon/1.svg' alt=''>
                                </div>
                                <h3>Manejo de información</h3>
                            </div>
                </div>
                <div class='col-lg-4 col-md-4'>

                            <div class='single_service text-center wow fadeInUp ' data-wow-duration='.8s' data-wow-delay='.6s'>
                                <div class='thumb'>
                                        <img src='img/icon/3.svg' alt=''>
                                </div>
                                <h3>Notificaciones de solicitudes pendientes</h3>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ fin del div de servicios  -->

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

    <!-- js para movimiento de navbar -->
    <script src='js/vendor/jquery-1.12.4.min.js'></script>
    
    <script src='js/jquery.slicknav.min.js'></script>
    <script src='js/jquery.magnific-popup.min.js'></script>
    <script src='js/main.js'></script>
</body>

</html>
        ";
?>