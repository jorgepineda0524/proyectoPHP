<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
//if($_SESSION['Usu']==  null)header('Location: ../index.php');
if($_SESSION['per'] != ""){
    echo "<script>alert('Usted no tiene acceso a esta área')</script>";
    header('Location: menuGeneral.php');
}
include('../control/configBd.php');
include('../modelo/Usuario.php');
include('../control/ControlUsuario.php');
include('../control/ControlConexion.php');

try{
    $nomUusario=$_POST['txtNomUsu'];
    $contrasena=$_POST['txtContrasena'];
    //$contra_cifrada=password_hash($contrasena, PASSWORD_DEFAULT);
    $perfil=$_POST['txtPerfil'];
    $boton=$_POST['btn'];
 
    if($boton=="Registrar"){
    $objUsuario=new Usuario($nomUusario,/*$contra_cifrada*/$contrasena,$perfil);
    $objCtrUsuario =new ControlUsuario($objUsuario);
    $objCtrUsuario->guardar();
    header('Location: usuarioGuardado.php');
          
    }
}
catch (Exception $objExp) {
    echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
}

echo "
<!DOCTYPE html>
<html class='no-js' lang='zxx'>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>
    <title>Distribuidora</title>
    <meta name='description' content=''>
    <meta name='viewport' content='width=device-width, initial-scale=1'>


    <link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel='stylesheet' type='text/css' href='styleGestion.css'>


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
                                <a href='index.php'>
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
                                    <li><a href='#'>Gestión Admin <i class='ti-angle-down'></i></a>
                                            <ul class='submenu'>
                                                 <li><a href='GestionEmpleado.php'>Empleado</a></li>
                                                 <li><a href='GestionProveedor.php'>Proveedor</a></li>
                                                 <li><a href='GestionCliente.php'>Cliente</a></li>
                                                 <li><a href='GestionProducto.php'>Producto</a></li>
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


    <!-- div formulario de gestion de administrado  -->
    <form method='post' action='GestionUsuario.php'>
    <div class='productivity_area'>
        <div class='container'>
            <div class='row align-items-center'>
                <div class='container register'>
                <div class='row'>
                    <div class='col-md-3 register-left'>
                        <img src='https://www.pinclipart.com/picdir/big/90-900518_subscribe-now-employees-provident-fund-organisation-clipart.png' alt=''/>

                        <h3>Formulario Admin</h3>
                        <p style='color: white'>Formulario para ingreso o actualizacion de Clientes, Empleados, Proveedores y Productos</p>
                        
                    </div>
                    <div class='col-md-9 register-right'>
               

                    
                            
                        <div class='tab-content' id='myTabContent' >
                            <div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'>
                                <h3 class='register-heading' style='color: black'>Crear usuario</h3>
                                <div class='row register-form'>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <input type='text' class='form-control' placeholder='Nombre de usuario *' name='txtNomUsu' required />
                                        </div>
                                        <div class='form-group'>
                                            <input type='text' class='form-control' placeholder='Contraseña *' name='txtContrasena' required />
                                        </div>
                                        <div class='form-group'>
                                            <h5>Tipo de perfil:</h5>
                                            <select class='form-control' name='txtPerfil' required>
                                                <option value=''></option>
                                                <option value='admin'>Administrador</option>
                                                <option value='clie'>Cliente</option>
                                                <option value='empl'>Empleado</option>
                                                <option value='prov'>Proveedor</option>
                                            </select>
                                        </div>
                                        <input type='submit' class='btnRegister'  value='Registrar' name='btn' />
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
    </form>
    <!--/ fin de div para descargar la app  -->

    <!-- Aquí inicia el pie de pagina -->
    <footer class='footer'>
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
?>