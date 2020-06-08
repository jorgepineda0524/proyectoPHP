<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');
if($_SESSION['per'] != "admin"){
    echo "<script>alert('Usted no tiene acceso a esta área')</script>";
    header('Location: menuGeneral.php');
}
if(!$_GET){
    header('Location: listaEmpleados.php?pagina=1');
}

include('../control/configBd.php');
include('../modelo/Empleado.php');
include('../control/ControlEmpleado.php');
include('../control/ControlConexion.php');


$boton=$_POST['btn'];

if($boton=="Editar"){
    header('Location: GestionEmpleado.php');
}
$buscarXdocumento=$_POST['txtDocumentoBusc'];

if($buscarXdocumento==null){
    $objEmpleado=new Empleado('','','','','','','','','','','','');
    $objCtrEmpleado =new ControlEmpleado($objEmpleado);
    $resuladoConsulta=$objCtrEmpleado->listarEmpleados();
}else {
    $objEmpleado1=new Empleado($buscarXdocumento,'','','','','','','','','','');
    $objCtrEmpleado1 =new ControlEmpleado($objEmpleado1);
    $resuladoConsulta=$objCtrEmpleado1->consultar();
}
    $Empleados_x_pagina = 5;
    

    $iniciar= (string)(($_GET['pagina']-1)*$Empleados_x_pagina);

    $objEmpleado2=new Empleado('','','','','','','','','','',$iniciar);
    $objCtrEmpleado2 =new ControlEmpleado($objEmpleado2);
    $result_pagina = $objCtrEmpleado2->consultarPagina();

    //$result_usuarios = $result_pagina->fetchAll();

    $codigo=1;

    $totalEmpleado_db = mysqli_num_rows($resuladoConsulta);
    $paginas = $totalEmpleado_db/5;
    $paginas = ceil($paginas);

echo "
<!DOCTYPE html>
<html class='no-js' lang='zxx'>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>
    <title>Distribuidora</title>
    <meta name='description' content=''>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'></script>
    <script src='//code.jquery.com/jquery-1.11.1.min.js'></script>
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    


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

    <!-- div formulario de gestion de administrado  -->

    



    <form method='post' action='listaEmpleados.php'>
    
    <div class='productivity_area'>
        <div class='container'>
        <div class='row'  style='margin-top: 50px;'>
                <div class='col-md-12 text-center'>
                    <div style='width: 200px; float: right'>
                        <div class='input-group input-group-sm mb-3'>
                            <input type='text' class='form-control' placeholder='Número de documento' name='txtDocumentoBusc'/>
                            <input type='submit' class='btn btn-success'  value='Buscar' name='btn' />
                        </div>
                      </br>
                        </div>
                        <div class='outer-form'>
                        
                    <table class='table-striped table table-bordered vertical' style='font-size:15px'>
                          <thead style='color: white; font-weight: normal; background-color: black;' >
                            <tr>
                            <th  class='head'>Nombre</th>
                            <th  class='head'>Documento</th>
                            <th  class='head'>Fecha de Ingreso</th>
                            <th  class='head'>Salario</th>
                            <th  class='head'>Email</th>
                            <th  class='head'>Celular</th>
                            <th  class='head'>Telefono</th>
                            <th  class='head'></th>
                            <th  class='head'>Acción  </th>
                            </tr>
                          </thead>";
                                
                                
                                
                                while($registros=$result_pagina->fetch_array()){
                                

                            echo "

                          <tbody style='border:1px solid #807e7e; background-color:#242424; color:#A1A6AB; text-align: left;'>
                            <tr>
                              <td style='text-align: center;'>";echo $registros['nombre']."</td>
                              <td style='text-align: center;'>";echo $registros['documento']."</td>
                              <td style='text-align: center;'>";echo $registros['fecha_ingreso']."</td>
                              <td style='text-align: center;'>";echo $registros['salario_basico']."</td>
                              <td style='text-align: center;'>";echo $registros['email']."</td>
                              <td style='text-align: center;'>";echo $registros['telefono']."</td>
                              <td style='text-align: center;'>";echo $registros['celular']."</td>
                              <td style='text-align: center;'>
                               <span class='slider round'></span>
                               </label>
                              </td>
                              <td style='text-align: center;'>
                              
                                <a class ='glyphicon glyphicon-edit btn btn-primary' href='GestionEmpleado.php?id=";echo $registros['documento']."'></a>
                                <i class='glyphicon glyphicon-trash btn btn-danger' title='Eliminar'></i>
                              </td>
                            </tr>";
                                
                                }
                                echo "
                                
                          </tbody>
                        </table>
                        <nav aria-label='Page navigation example'>
                            <ul class='pagination'>
                                <li class='page-item "; echo $_GET['pagina']<=1 ? 'disabled' : ''; echo "'>
                                    <a class='page-link' href='listaEmpleados.php?pagina=";echo $_GET['pagina']-1;echo "' aria-label='Anterior'>
                                        <span aria-hidden='true'>&laquo;</span>
                                    </a>
                                </li>";
                                
                                for($i=0;$i<$paginas;$i++){

                                echo "
                                <li class='page-item "; echo $_GET['pagina']==$i+1 ? 'active' : ''; echo "'>
                                    <a class='page-link' href='listaEmpleados.php?pagina="; echo $i+1; echo "'>"; echo $i+1; echo "</a>
                                </li>";
                                }
                                echo "
                                <li class='page-item "; echo $_GET['pagina']>=$paginas ? 'disabled' : ''; echo "'>
                                    <a class='page-link' href='listaEmpleados.php?pagina=";echo $_GET['pagina']+1;echo "' aria-label='Siguiente'>
                                        <span aria-hidden='true'>&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                      </div>
                      
                  </div>
              </div>
        </div>
    </div>

    

    </form>


    

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

    <script src='jquery-3.5.1.min.js'></script>

    
</body>



</html>
";
?>