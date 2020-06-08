<?php
    class ControlProveedor{
        var $objProveedor;

        function __construct($objProveedor){
            $this->objProveedor=$objProveedor;
        
        }

        function guardar(){
            $codigo=$this->objProveedor->getCodigo();
            $nombre=$this->objProveedor->getNombre();
            $tipoProveedor=$this->objProveedor->getTipoProveedor();
            
            $telefono=$this->objProveedor->getTelefono();
            $fechaRegistro=$this->objProveedor->getFechaRegistro();
            $imagen=$this->objProveedor->getImagen();
            $email=$this->objProveedor->getEmail();
            //$fechaInactivo=$this->objProveedor->getFechaInactivo();
            //$idpersona=$this->objProveedor->getIdpersona();
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="INSERT INTO PROVEEDOR(DOCUMENTO,NOMBRE,TIPO,IMAGEN,FECHA_REGISTRO,EMAIL,TELEFONO,
            IDPERSONA) VALUES('".$codigo."','".$nombre."','".$tipoProveedor."','".$imagen."',
            '".$fechaRegistro."','".$email."','".$telefono."',3)";
            $objConexion->ejecutarComandoSql($comandoSql);
            $objConexion->cerrarBd();
        }

        function modificar(){
            $codigo=$this->objProveedor->getCodigo();
            $nombre=$this->objProveedor->getNombre();
            $tipoProveedor=$this->objProveedor->getTipoProveedor();
            $email=$this->objProveedor->getEmail();
            $telefono=$this->objProveedor->getTelefono();
            $fechaRegistro=$this->objProveedor->getFechaRegistro();
            $imagen=$this->objProveedor->getImagen();
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="UPDATE PROVEEDOR SET NOMBRE='".$nombre."',TIPO='".$tipoProveedor."',IMAGEN='".$imagen."',
            FECHA_REGISTRO='".$fechaRegistro."',TELEFONO='".$telefono."',EMAIL='".$email."',IDPERSONA=3
            WHERE DOCUMENTO='".$codigo."'";
            $objConexion->ejecutarComandoSql($comandoSql);
            $objConexion->cerrarBd();
        }

        function borrar(){
            $codigo=$this->objProveedor->getCodigo();
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="DELETE FROM PROVEEDOR  WHERE DOCUMENTO='".$codigo."'";
            $objConexion->ejecutarComandoSql($comandoSql);
            $objConexion->cerrarBd();
        }

        function consultar(){

            $codigo=$this->objProveedor->getCodigo();
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="SELECT * FROM PROVEEDOR  WHERE DOCUMENTO='".$codigo."'";
            $recordSet=$objConexion->ejecutarSelect($comandoSql);
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);
            $this->objProveedor->setNombre($registro["nombre"]);
            $this->objProveedor->setTipoProveedor($registro["tipo"]);
            $this->objProveedor->setFechaRegistro($registro["fecha_registro"]);
            $this->objProveedor->setImagen($registro["imagen"]);
            $this->objProveedor->setEmail($registro["email"]);
            $this->objProveedor->setTelefono($registro["telefono"]);
            
            $objConexion->cerrarBd();
            return $this->objProveedor;
        }

        function  listaProveedores(){
        
            $objConexion = new ControlConexion();
            
            try{
                $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                $comandoSql="SELECT * FROM PROVEEDOR";
                $recordSet=$objConexion->ejecutarSelect($comandoSql);
                
    
            } catch (Exception $e){
              echo "ERROR ".$e->getMessage()."\n";
              }
              
              $objConexion->cerrarBd();
    
              return $recordSet;
                
      }

      function  listarProveedores(){
        
        $objConexion = new ControlConexion();
        
        try{
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="SELECT * FROM PROVEEDOR";
            $recordSet=$objConexion->ejecutarSelect($comandoSql);
            

        } catch (Exception $e){
          echo "ERROR ".$e->getMessage()."\n";
          }
          
          $objConexion->cerrarBd();

          return $recordSet;
            
  }

    }
?>