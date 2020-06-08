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
    include('../modelo/Empleado.php');
    include('../control/ControlEmpleado.php');
    include('../control/ControlConexion.php');

    $documentoId= $_GET['id'];

    if($documentoId!=null){
        $objEmpleado3=new Empleado($documentoId,"","","","","","","","","","");
        $objCtrEmpleado3 =new ControlEmpleado($objEmpleado3);
        $objEmpleado3=$objCtrEmpleado3->consultar();
        $documento=$objEmpleado3->getCodigo();
        $nombre=$objEmpleado3->getNombre();
        $fechaIngreso=$objEmpleado3->getFechaIngreso();
        $salario=$objEmpleado3->getSalarioBasico();
        $deduccion=$objEmpleado3->getDeduccion();
        $foto=$objEmpleado3->getFoto();
        $hojaDeVida=$objEmpleado3->getHojaDeVida();
        $email=$objEmpleado3->getEmail();
        $telefono=$objEmpleado3->getTelefono();
        $celular=$objEmpleado3->getCelular();
    }

    try{
        $buscarDocumento=$_POST['txtDocumentoBusc'];
        $documento=$_POST['txtDocumento'];
        $nombre=$_POST['txtNombre'];
        $fecha_regis=$_POST['txtFechaIngreso'];
        $salario=$_POST['txtSalario'];
        $deduccion=$_POST['txtDeduccion'];
        //$f_inac=$_POST['txtFechaInactivo'];
        $foto=$_FILES['fileFoto']['name'];
        $ruta=$_FILES['fileFoto']['tmp_name'];
        $hv=$_FILES['fileHv']['name'];
        $rutahv=$_FILES['fileHv']['tmp_name'];
        $destinofoto='fotoEmpleado/'.$foto;
        move_uploaded_file($ruta,$destinofoto);
        $destinoHV='fotoEmpleado/'.$hv;
        move_uploaded_file($rutahv,$destinoHV);
        $email=$_POST['txtEmail'];
        $tel=$_POST['txtTelefono'];
        $celular=$_POST['txtCelular'];
    
        $boton=$_POST['btn'];


        if($documentoId!=null){
            $objEmpleado3=new Empleado($documentoId,"","","","","","","","","","");
            $objCtrEmpleado3 =new ControlEmpleado($objEmpleado3);
            $objEmpleado3=$objCtrEmpleado3->consultar();
            $documento=$objEmpleado3->getCodigo();
            $nombre=$objEmpleado3->getNombre();
            $fechaIngreso=$objEmpleado3->getFechaIngreso();
            $salario=$objEmpleado3->getSalarioBasico();
            $deduccion=$objEmpleado3->getDeduccion();
            $foto=$objEmpleado3->getFoto();
            $hojaDeVida=$objEmpleado3->getHojaDeVida();
            $email=$objEmpleado3->getEmail();
            $telefono=$objEmpleado3->getTelefono();
            $celular=$objEmpleado3->getCelular();
        }

        
        if($boton=="lista de Empleados"){
            header('Location: listaEmpleados.php');
                  
            }
     
        if($boton=="Registrar"){
        $objEmpleado=new Empleado($documento,$nombre,$fecha_regis,$salario,$deduccion,$destinofoto,$destinoHV,$email,$tel,$celular,"");
        $objCtrEmpleado =new ControlEmpleado($objEmpleado);
        $objCtrEmpleado->guardar();
              
        }


        /*-----------------------Nuevo codigo-----------------------------------------*/
        if($boton=="Buscar"){
            $objEmpleado=new Empleado($buscarDocumento,"","","","","","","","","","");
            $objCtrEmpleado =new ControlEmpleado($objEmpleado);
            $objEmpleado=$objCtrEmpleado->consultar();
            $documento=$objEmpleado->getCodigo();
            $nombre=$objEmpleado->getNombre();
            $fechaIngreso=$objEmpleado->getFechaIngreso();
            $salario=$objEmpleado->getSalarioBasico();
            $deduccion=$objEmpleado->getDeduccion();
            $foto=$objEmpleado->getFoto();
            $hojaDeVida=$objEmpleado->getHojaDeVida();
            $email=$objEmpleado->getEmail();
            $telefono=$objEmpleado->getTelefono();
            $celular=$objEmpleado->getCelular();
        }
        if($boton=="Actualizar"){
            $objEmpleado=new Empleado($documento,$nombre,$fecha_regis,$salario,$deduccion,$destinofoto,$destinoHV,$email,$tel,$celular,"");
            $objCtrEmpleado =new ControlEmpleado($objEmpleado);
            $objCtrEmpleado->modificar();
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
   <form method='post' action='GestionEmpleado.php' enctype='multipart/form-data'>
    <div class='productivity_area'>
        <div class='container'>
            <div class='row align-items-center'>
                <div class='container register'>
                    <div class='row'>
                        <div class='col-md-3 register-left'>
                            <img src='https://www.pinclipart.com/picdir/big/90-900518_subscribe-now-employees-provident-fund-organisation-clipart.png' alt='' />

                            <h3>Formulario Admin</h3>
                            <p style='color: white'>Formulario para ingreso o actualizacion de Empleados, Empleados, Proveedores y Productos</p>

                        </div>
                        <div class='col-md-9 register-right'>

                            <div class='tab-content' id='myTabContent'>
                                <div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'>
                                
                                <div style='width: 200px; float: right'>
                                
                                <input type='submit' class='btnRegister'  value='Buscar' name='btn' style='background: #2ad482'/>
                                <input type='text' class='form-control' placeholder='Busqueda documento' name='txtDocumentoBusc'/>
                                
                                </div> 
                                    <h3 class='register-heading' style='color: black'>Datos Empleado</h3>
                                    <div class='row register-form'>
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <input type='text' class='form-control' placeholder='Documento *' name='txtDocumento' value =\"".$documento."\"/>
                                            </div>
                                            <div class='form-group'>
                                                <input type='text' class='form-control' placeholder='Nombre y apellido*' name='txtNombre' value =\"".$nombre."\"/>
                                            </div>
                                            <div class='form-group'>
                                                <div>
                                                    <h6>Fecha de ingreso:</h6>
                                                </div>
                                                <input type='date' class='form-control' name='txtFechaIngreso' value =\"".$fechaIngreso."\">
                                            </div>
                                            <div class='form-group'>
                                                <input type='text' class='form-control' placeholder='Salario Básico' name='txtSalario' value =\"".$salario."\"/>
                                            </div>
                                            <div class='form-group'>
                                                <input type='text' class='form-control' placeholder='Deducción' name='txtDeduccion' value =\"".$deduccion."\"/>
                                            </div>
                                        </div>
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <input type='email' class='form-control' placeholder='Email *' name='txtEmail' value =\"".$email."\"/>
                                            </div>
                                            <div class='form-group'>
                                                <input type='text' name='txtTelefono' class='form-control' placeholder='Telefono *'value =\"".$telefono."\" />
                                            </div>
                                            <div class='form-group'>
                                                <input type='text' name='txtCelular' class='form-control' placeholder='Celular' value =\"".$celular."\"/>
                                            </div>

                                            <div class='form-group'>
                                                <h6>Adjuntar foto:</h6>
                                                <input type='file' name='fileFoto' accept='.jpg,.png' value =\"".$foto."\">
                                            </div>
                                            <div class='form-group'>
                                                <h6>Adjuntar hoja de vida:</h6>
                                                <input type='file' name='fileHv' accept='.doc,.docx,.pdf' value =\"".$hojaDeVida."\">
                                            </div>
                                            <input type='submit' class='btnRegister' value='Registrar' name='btn'/>
                                            <input type='submit' class='btnRegister' value='Actualizar' style='background: red' name='btn'/>
                                            <input type='submit' class='btnRegister'  value='lista de Empleados' name='btn' style='background: #2ad482; width: 250px'/>
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