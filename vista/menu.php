<?php
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');
echo"
<!DOCTYPE html>
<html>
<head>
<style>
.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
  background-color: red;
}
</style>
</head>
<body>

<div class='navbar'>
  <a href='#home'>Home</a>
  <a href='../vista/cerrarSesion.php''>Cerrar Sesión</a>
  <a href='../vista/vistaCliente.php'>Clientes</a>
</div>
<h3>Barra de Menú</h3>
<p>Click en una opción del menú.</p>
</body>
</html>
";
?>