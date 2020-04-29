<?php
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');
if($_SESSION['per'] != "admin"){
    echo "<script>alert('Usted no tiene acceso a esta área')</script>";
    header('Location: menuGeneral.php');
}
include("../control/configBd.php");
include("../modelo/Cliente.php");
include("../control/ControlCliente.php");
include("../control/ControlConexion.php");
try{
    $cod=$_POST["txtCodigo"];
    $nom=$_POST["txtNombre"];
    $cre=$_POST["txtCredito"];
    $bot=$_POST["btn"];
 switch ($bot) {
    case "Guardar":
        $objCliente= new Cliente($cod,$nom,$cre);
        $objControlCliente= new ControlCliente($objCliente);
        $objCliente=$objControlCliente->guardar();
        break;
    case "Consultar":
        $objCliente= new Cliente($cod,"",0);
        $objControlCliente= new ControlCliente($objCliente);
        $objCliente=$objControlCliente->consultar();
        $nom=$objCliente->getNombre();
		$cre=$objCliente->getCredito();
        //echo phpinfo();
        break;
    case "Modificar":
        $objCliente= new Cliente($cod,$nom,$cre);
        $objControlCliente= new ControlCliente($objCliente);
        $objCliente=$objControlCliente->modificar();
        break;
    case "Borrar":
        $objCliente= new Cliente($cod,"",0);
        $objControlCliente= new ControlCliente($objCliente);
        $objCliente=$objControlCliente->borrar();
        break;        
} 
}
catch (Exception $objExp) {
    echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
}
echo"
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
    <body>
        <form method='post' action='vistaCliente.php'>
            <table>
                <tr>
                <td colspan='2'>Clientes</td>
                </tr>
                <tr>
                <td>Código</td><td><input type='text' name='txtCodigo' value='".$cod."'></td>
                </tr>
                <tr>
                <td>Nombre</td><td><input type='text' name='txtNombre' value='".$nom."'></td>
                </tr>
                <tr>
                <td>Crédito</td><td><input type='text' name='txtCredito' value='".$cre."'></td>
                </tr>
            </table>
            <table>
            <tr>
                <td><input type='submit' name='btn' value='Guardar'></td>
                <td><input type='submit' name='btn' value='Consultar'></td>
                <td><input type='submit' name='btn' value='Modificar'></td>
                <td><input type='submit' name='btn' value='Borrar'></td>
            </tr>
            </table>
        </form>
    </body>
</html>
";
?>