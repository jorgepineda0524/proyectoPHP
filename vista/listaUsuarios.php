<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Distribuidora</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styleListaUsuarios.css">


                 <!-- archivos CSS -->
    <!-- navbar -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--css para la animacion de los div deslizantes-->
    <link rel="stylesheet" href="css/animate.min.css">
    <!--manejo para autoajustar navbar-->
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/slick.css">
    <!--css estilo general de la pagina-->
    <link rel="stylesheet" href="css/style.css">
    <!--css para los icones de redes sociales-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">

    
</head>

<body>

    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <h1 style="color: white">Distribuidora</h1>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        
                                    <li><a href='#'>Gestión usuario <i class='ti-angle-down'></i></a>
                                    <ul class='submenu'>
                                         <li><a href='GestionUsuario.php'>Nuevo usuario</a></li>
                                         <li><a href='listaUsuarios.php'>Lista de usuarios</a></li>
                                    </ul>
                                    <li><a href="#">Gestión Admin <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                 <li><a href="GestionEmpleado.php">Empleado</a></li>
                                                 <li><a href="GestionProveedor.php">Proveedor</a></li>
                                                 <li><a href="GestionCliente.php">Cliente</a></li>
                                                 <li><a href="GestionProducto.php">Producto</a></li>
                                            </ul>
                                    </li>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                    <a  href="#">Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>


    <!-- div formulario de gestion de administrado  -->
    <form method="post" action="GestionUsuario.php">
    
    <div class="productivity_area">
        <div class="container">
        <div class="row"  style="margin-top: 50px;">
                <div class="col-md-12 text-center">
                          <div class="outer-form">
                    <table class="table-striped table table-bordered vertical">
                          <thead style="color: white; font-weight: normal; background-color: black;" >
                            <tr>
                              <th  class="head">Código</th>
                              <th  class="head">Nombre de Usuario</th>
                              <th  class="head">Status</th>
                            </tr>
                          </thead>

                            <?php
                                include('../control/configBd.php');
                                include('../modelo/Usuario.php');
                                include('../control/ControlUsuario.php');
                                include('../control/ControlConexion.php');

                                $objUsuario=new Usuario("","","");
                                $objCtrUsuario =new ControlUsuario($objUsuario);
                                $listaUsuarios=$objCtrUsuario->listarUsuarios();
                                $codigo=1;
                                while($registros=$listaUsuarios->fetch_assoc()){
                                
                            ?>

                          <tbody style="border:1px solid #807e7e; background-color:#242424; color:#A1A6AB; text-align: left;">
                            <tr>
                              <td style="padding: 14px; text-align: center;"><?php echo $codigo ?></td>
                              <td style="text-align: center;"><?php echo $registros['nombre'] ?></td>
                              <td style="text-align: center;">
                               <label class="switch">
                               <input type="checkbox" checked>
                               <span class="slider round"></span>
                               </label>
                              </td>
                            </tr>
                            
                            <?php
                                $codigo++;
                                }
                            ?>

                          </tbody>
                        </table>
                      </div>
                  </div>
              </div>
        </div>
    </div>
    </form>
    <!--/ fin de div para descargar la app  -->

    <!-- Aquí inicia el pie de pagina -->
    <footer class="footer">
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
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
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>