<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');
/*if($_SESSION['per'] != "admin"){
    echo "<script>alert('Usted no tiene acceso a esta área')</script>";
    header('Location: menuGeneral.php');
}*/
include('../control/configBd.php');
include('../modelo/Producto.php');
include('../control/ControlProducto.php');
include('../modelo/Proveedor.php');
include('../control/ControlProveedor.php');
include('../control/ControlConexion.php');

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

    <!------ estilo de imagen ---------->
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <!------ diseño de los botones de páginas ---------->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='css/styleProductos.css'>

    <!------ diseño barra de busqueda ---------->
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>


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
                                    <a href='cerrarSesion.php' style='border-color: white'>Cerrar sesión</a>
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

    <!-- Tabla de productos  -->




    
    <div class='productivity_area'>
    <div class='container-fluid bg-light'>
	<div class='row align-items-center justify-content-center' style='background: #13bfeb'>
            	        <div class='col-md-2 pt-3'>
                           <div class='form-group '>
                              <select id='inputState ' class='form-control'>
                              <option>Todos</option>";

                              $objProveedor=new Proveedor('','','','','','','');
                              $objCtrProveedor =new ControlProveedor($objProveedor);
                              $listaProveedores=$objCtrProveedor->listaProveedores();
                              
                              while($registros=$listaProveedores->fetch_assoc()){
                              

                          echo "


                                
                                <option>"; echo $registros['nombre']."</option>";
                                
                            }
                            echo "
                              </select>
                           </div>
                        </div>
                        <div class='col-md-2'>
            	           <button type='button' class='btn btn-primary btn-block' style='background: #2958f2; border-color: white'>Filtrar</button>
            	        </div>
                	</div>
    </div>
        <div class='container'>
            <div class='row align-items-center'>

                <div class='main-content'>
                    <div class='container mt-7'>

                        
                        <div class='card shadow'>
                            <div class='card-header border-0'>
                                <h3 class='mb-0' style='color: #595959'><strong>Lista de Productos</strong></h3>
                            </div>
                            <div class='table-responsive'>
                                <table class='table align-items-center table-flush'>
                                    <thead class='thead-light'>
                                        <tr>
                                            <th scope='col' style='font-size: 20px'>Imagen</th>
                                            <th scope='col' style='font-size: 20px'>Nombre</th>
                                            <th scope='col' style='font-size: 20px'>Estado</th>
                                            <th scope='col' style='font-size: 20px'>Código</th>
                                            <th scope='col' style='font-size: 20px'></th>
                                            
                                        </tr>
                                    </thead>";

                                    $objProducto=new Producto('','','');
                                    $objCtrProducto =new ControlProducto($objProducto);
                                    $listaProductos=$objCtrProducto->listarProductos();
                                    //$codigo=1;
                                    while($registros=$listaProductos->fetch_assoc()){
                                    
                                    echo "
                                    <tbody>
                                        <tr>
                                            <th scope='row'>
                                                <div class='media align-items-center'>
                                                    <a href='#' class='avatar rounded-circle mr-3'>
                                                        <img alt='Image placeholder' src='images/dellci3.jpg'>
                                                    </a>
                                                    <div class='media-body'>
                                                        <span class='mb-0 text-sm'>Dell Company</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td style='font-size: 18px'>";echo $registros['nombre']."</td>
                                            <td>
                                                <span class='badge badge-dot mr-4'>
                                                    <i class='bg-warning'></i> Disponible
                                                </span>
                                            </td>

                                            <td>";echo $registros['codigo']."</td>
                                            <td class='text-right'>
                                                <div class='dropdown'>
                                                    <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                        <i class='fas fa-ellipsis-v' style='color: black'></i>
                                                    </a>
                                                    <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                                        <a class='dropdown-item' href='#'>Detalles</a>
                                                        <a class='dropdown-item' href='#'>Editar</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>";
                                        
                                        }
                                        echo "
                                    </tbody>
                                </table>
                            </div>
                            <div class='card-footer py-4'>
                                <nav aria-label='...'>
                                    <ul class='pagination justify-content-end mb-0'>
                                        <li class='page-item disabled'>
                                            <a class='page-link' href='#' tabindex='-1'>
                                                <i class='fas fa-angle-left'></i>
                                                <span class='sr-only'>Previous</span>
                                            </a>
                                        </li>
                                        <li class='page-item active'>
                                            <a class='page-link' href='#'>1</a>
                                        </li>
                                        <li class='page-item'>
                                            <a class='page-link' href='#'>2 <span class='sr-only'>(current)</span></a>
                                        </li>
                                        <li class='page-item'><a class='page-link' href='#'>3</a></li>
                                        <li class='page-item'>
                                            <a class='page-link' href='#'>
                                                <i class='fas fa-angle-right'></i>
                                                <span class='sr-only'>Siguientet</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--/ fin tabla productos  -->

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
    <script src='https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/jquery/dist/jquery.min.js'></script>
    <script src='https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js'></script>

</body>

</html>";
?>