<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');
if($_SESSION['per'] != "admin"){
    echo "<script>alert('Usted no tiene acceso a esta área')</script>";
    header('Location: menuGeneral.php');
}
    /* Aquí empieza el recibepost */
    include('../control/configBd.php');
    include('../modelo/Producto.php');
    include('../control/ControlProducto.php');
    include('../modelo/Proveedor.php');
    include('../control/ControlProveedor.php');
    include('../control/ControlConexion.php');

    $documentoId= $_GET['id'];

    if($documentoId!=null){
        $objProducto3=new Producto($documentoId,"","","","","","","","","","");
        $objCtrProducto3 =new ControlProducto($objProducto3);
        $objProducto3=$objCtrProducto3->consultar();
        $documento=$objProducto3->getCodigo();
        $nombre=$objProducto3->getNombre();
        $fechaIngreso=$objProducto3->getImagen();
    }

    try{
        $buscarDocumento=$_POST['txtDocumentoBusc'];
        $documento=$_POST['txtCodigo'];
        $nombre=$_POST['txtNombre'];
        //$f_inac=$_POST['txtFechaInactivo'];
        $foto=$_FILES['fileFoto']['name'];
        $ruta=$_FILES['fileFoto']['tmp_name'];
        $destinofoto='fotoProducto/'.$foto;
        move_uploaded_file($ruta,$destinofoto);
    
        $boton=$_POST['btn'];


        if($documentoId!=null){
            $objProducto3=new Producto($documentoId,"","","");
            $objCtrProducto3 =new ControlProducto($objProducto3);
            $objProducto3=$objCtrProducto3->consultar();
            $documento=$objProducto3->getCodigo();
            $nombre=$objProducto3->getNombre();;
            $foto=$objProducto3->getImagen();
        }

        
        if($boton=="lista de Productos"){
            header('Location: listaProductos.php');
                  
            }
     
        if($boton=="Registrar"){
        $objProducto=new Producto($documento,$nombre,$destinofoto,"");
        $objCtrProducto =new ControlProducto($objProducto);
        $objCtrProducto->guardar();
              
        }


        /*-----------------------Nuevo codigo-----------------------------------------*/
        if($boton=="Buscar"){
            $objProducto=new Producto($buscarDocumento,"","","");
            $objCtrProducto =new ControlProducto($objProducto);
            $objProducto=$objCtrProducto->consultar();
            $documento=$objProducto->getCodigo();
            $nombre=$objProducto->getNombre();
            $foto=$objProducto->getImagen();
        }
        if($boton=="Actualizar"){
            $objProducto=new Producto($documento,$nombre,$destinofoto,"");
            $objCtrProducto =new ControlProducto($objProducto);
            $objCtrProducto->modificar();
        }
        /*------------------------------------------------------------------------------*/
    }
    catch (Exception $objExp) {
        echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
    }


    /* Aquí termina el recibe post */
echo "
<!doctype html>
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
                                        
                                        <li><a href='#'>Gestión de usuarios</a></li>
                                        <li><a href='index.php'>Gestión Admin <i class='ti-angle-down'></i></a>
                                            <ul class='submenu'>
                                                 <li><a href='GestionEmpleado.php'>Empleado</a></li>
                                                 <li><a href='GestionProveedor.php'>Proveedor</a></li>
                                                 <li><a href='GestionEmpleado.php'>Empleado</a></li>
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

    <!-- div formulario de gestion de administrador  -->
   <form method='post' action='GestionProducto.php' enctype='multipart/form-data'>
    <div class='productivity_area'>
        <div class='container'>
            <div class='row align-items-center'>
                <div class='container register'>
                    <div class='row'>
                        <div class='col-md-3 register-left'>
                            <img src='https://www.pinclipart.com/picdir/big/90-900518_subscribe-now-employees-provident-fund-organisation-clipart.png' alt='' />

                            <h3>Formulario Admin</h3>
                            <p style='color: white'>Formulario para ingreso o actualizacion de Empleados, Clientes, Proveedores y Productos</p>

                        </div>
                        <div class='col-md-9 register-right'>

                            <div class='tab-content' id='myTabContent'>
                                <div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'>
                                
                                <div style='width: 200px; float: right'>
                                
                                <input type='submit' class='btnRegister'  value='Buscar' name='btn' style='background: #2ad482'/>
                                <input type='text' class='form-control' placeholder='Busqueda por código' name='txtDocumentoBusc'/>
                                
                                </div> 
                                    <h3 class='register-heading' style='color: black'>Datos Producto</h3>
                                    <div class='row register-form'>
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <input type='text' class='form-control' placeholder='Código*' name='txtCodigo' value =\"".$documento."\"/>
                                            </div>
                                            <div class='form-group'>
                                                <input type='text' class='form-control' placeholder='Nombre*' name='txtNombre' value =\"".$nombre."\"/>
                                            </div>
                                            
                                        </div>
                                        <div class='col-md-6'>

                                            <div class='form-group'>
                                                <h6>Adjuntar foto:</h6>
                                                <input type='file' name='fileFoto' accept='.jpg,.png' value =\"".$foto."\">
                                            </div>

                                            <div class='form-group'>
                                            <label></label>
                                                <select>
                                                <option>Seleccione un proveedor</option>";
                                                $objProveedor=new Proveedor("","","","","","","","");
                                                $objCtrProveedor =new ControlProveedor($objProveedor);
                                                $resuladoConsulta=$objCtrProveedor->listarProveedores();
                                                while($registros=$resuladoConsulta->fetch_array()){
                                                
                                            echo "
                                                <option value='";echo $registros['documento']."'>";echo $registros['nombre']."</option>";
                                            }
                                            echo "
                                                </select>
                                            </div>
                                            
                                            <input type='submit' class='btnRegister' value='Registrar' name='btn'/>
                                            <input type='submit' class='btnRegister' value='Actualizar' style='background: red' name='btn'/>
                                            <input type='submit' class='btnRegister'  value='lista de Productos' name='btn' style='background: #2ad482; width: 250px'/>
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