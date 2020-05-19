<?php

    class ControlUsuario{
	  var $objUsuario;
        function __construct($objUsuario){
         $this->objUsuario=$objUsuario;

        }

       function  validarIngreso(){
            //$esValido=false;
                  $objUsuario1 = new Usuario('','','','');
			      $usu= $this->objUsuario->getNomUsuario();
            $con=$this->objUsuario->getContrasena();
            $est=$this->objUsuario->getEstado();
			      $objConexion = new ControlConexion();
            
                  try{
                    $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                    $comandoSql="SELECT * FROM USUARIO  WHERE NOMBRE='".$usu."'";
                    $recordSet=$objConexion->ejecutarSelect($comandoSql);
                    $registro = $recordSet->fetch_array(MYSQLI_BOTH);
                    $objUsuario1->setNomUsuario($registro['nombre']);
                    $objUsuario1->setContrasena($registro['contrasena']);
                    $this->objUsuario->setTipoUsuario($registro['estado']);
                    $this->objUsuario->setTipoUsuario($registro['perfil']);
            
                   /* if(!password_verify($this->objUsuario->getContrasena(),$objUsuario1->getContrasena())){
                        return false;
                    }
                     if($this->objUsuario->getNomUsuario()!=$objUsuario1->getNomUsuario() || $this->objUsuario->getNomUsuario() == "" ||
                          $this->objUsuario->getContrasena() == ""){
                              return false;
                        }*/
    
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
          $est=$this->objUsuario->getEstado();

          try{
              $objConexion = new ControlConexion();
              $cmdSql="INSERT INTO usuario(nombre,contrasena,perfil,estado) values('".$usu."','".$con."','".$tusu."','".$est."')";
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
        
        /* $usuario= $this->objUsuario->getNomUsuario();
        $contraseña=$this->objUsuario->getContrasena();
        $perfil=$this->objUsuario->getTipoUsuario(); */
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

    function consultar(){

      $nombre=$this->objUsuario->getNomUsuario();
      $objConexion = new ControlConexion();
      try{
          $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
          $comandoSql="SELECT * FROM USUARIO  WHERE NOMBRE='".$nombre."'";
          $recordSet=$objConexion->ejecutarSelect($comandoSql);
      } catch (Exception $e){
        echo "ERROR ".$e->getMessage()."\n";
        }
      
      
      $objConexion->cerrarBd();
      return $recordSet;
    }

    function cambiarEstado($est,$nom){
      $this->estado=$est;
      $this->nombre=$nom;

      /* $nombre=$this->objUsuario->getNomUsuario(); */
      $objConexion = new ControlConexion();
      try{
          $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
          $comandoSql="UPDATE USUARIO SET ESTADO='".$this->estado."' WHERE NOMBRE ='".$this->nombre."'";
          $recordSet=$objConexion->ejecutarSelect($comandoSql);
      } catch (Exception $e){
        echo "ERROR ".$e->getMessage()."\n";
        }
      
      
      $objConexion->cerrarBd();
      return $recordSet;
    }

    function consultarPagina(){
  
    
      $pagina= $this->objUsuario->getPagina();
      $objConexion = new ControlConexion();
      
      try{
          $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
          $comandoSql="SELECT * FROM USUARIO LIMIT $pagina,3";
          $recordSet=$objConexion->ejecutarSelect($comandoSql);
          
  
      } catch (Exception $e){
        echo "ERROR ".$e->getMessage()."\n";
        }
        
        $objConexion->cerrarBd();
  
        return $recordSet;
          
    }

 }
?>