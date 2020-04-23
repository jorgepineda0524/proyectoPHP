<?php
    class ControlUsuario{
	  var $objUsuario;
        function __construct($objUsuario){
         $this->objUsuario=$objUsuario;

        }

       function  validarIngreso(){
            //$esValido=false;
            $objUsuario1 = new Usuario('','','');
			$usu= $this->objUsuario->getNomUsuario();
			$con=$this->objUsuario->getContrasena();
			$objConexion = new ControlConexion();
			try{
				$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
				$comandoSql="SELECT * FROM USUARIO  WHERE NOMBRE='".$usu."' AND CONTRASENA='".$con."'";
				$recordSet=$objConexion->ejecutarSelect($comandoSql);
				$registro = $recordSet->fetch_array(MYSQLI_BOTH);
				$objUsuario1->setNomUsuario($registro['nombre']);
        $objUsuario1->setContrasena($registro['contrasena']);
        $this->objUsuario->setTipoUsuario($registro['perfil']);
      } catch (Exception $e){
            	echo "ERROR ".$e->getMessage()."\n";
          }
      $objConexion->cerrarBd();

      return $this->objUsuario->getNomUsuario()==$objUsuario1->getNomUsuario() &&
      $this->objUsuario->getContrasena()==$objUsuario1->getContrasena()  &&
      $this->objUsuario->getNomUsuario() != "" &&
      $this->objUsuario->getContrasena() != "";
      }


      function guardar(){
      $usu= $this->objUsuario->getNomUsuario();
      $con=$this->objUsuario->getContrasena();
      $tusu= $this->objUsuario->getTipoUsuario();

      try{
        $objConexion = new ControlConexion();
        $cmdSql="INSERT INTO usuario(nombre,contrasena,perfil) values('".$usu."','".$con."','".$tusu."')";
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        //$objConexion->abrirBd("localhost","root","","bdproyectoaula");
        $objConexion->ejecutarComandoSql($cmdSql);
        $objConexion->cerrarBd();
        
      }
      catch(Exception $objExp){
        echo $objExp->getMessage();
      }

    }
 }
?>