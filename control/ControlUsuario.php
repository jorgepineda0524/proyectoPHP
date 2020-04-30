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

                $contrasena1=password_verify($this->objUsuario->getContrasena(),$objUsuario1->getContrasena());
        
                if(!$contrasena1){
                    if($this->objUsuario->getNomUsuario()!=$objUsuario1->getNomUsuario() && $this->objUsuario->getNomUsuario() == "" &&
                      $this->objUsuario->getContrasena() == ""){
                          return false;
                    }
                }

            } catch (Exception $e){
            	echo "ERROR ".$e->getMessage()."\n";
              }
              
              $objConexion->cerrarBd();

              return true;

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
        
          } catch(Exception $objExp){
                echo $objExp->getMessage();
            }

      }


      function  listarUsuarios(){
        //$esValido=false;
        
        $usuario= $this->objUsuario->getNomUsuario();
        $contraseña=$this->objUsuario->getContrasena();
        $perfil=$this->objUsuario->getTipoUsuario();
        $objConexion = new ControlConexion();
        
        try{
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="SELECT * FROM USUARIO";
            $recordSet=$objConexion->ejecutarSelect($comandoSql);
            

        } catch (Exception $e){
          echo "ERROR ".$e->getMessage()."\n";
          }
          
          $objConexion->cerrarBd();

          return $recordSet;
            
  }

  function  consultarPerfil(){
  
    
    $usuario= $this->objUsuario->getNomUsuario();
    $objConexion = new ControlConexion();
    
    try{
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="SELECT perfil FROM USUARIO WHERE NOMBRE='".$usuario."'";
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        

    } catch (Exception $e){
      echo "ERROR ".$e->getMessage()."\n";
      }
      
      $objConexion->cerrarBd();

      return $recordSet;
        
    }

 }
?>