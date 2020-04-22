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
            $email=$this->objProveedor->getEmail();
            $telefono=$this->objProveedor->getTelefono();
            $fechaRegistro=$this->objProveedor->getFechaRegistro();
            $imagen=$this->objProveedor->getImagen();
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="INSERT INTO PROVEEDOR(DOCUMENTO,NOMBRE,TIPO,EMAIL,IMAGEN,FECHA_REGISTRO
                TELEFONO) VALUES('".$codigo."','".$nombre."','".$tipoProveedor."','".$email."','".$imagen."',
                '".$fechaRegistro."','".$telefono."')";
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
                EMAIL='".$email."',FECHA_REGISTRO='".$fechaRegistro."',TELEFONO='".$telefono."' 
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
            $comandoSql="SELECT * FROM PROVEEDOR  WHERE CODIGO='".$codigo."'";
            $recordSet=$objConexion->ejecutarSelect($comandoSql);
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);
            $this->objProveedor->setNombre($registro["nombre"]);
            $this->objProveedor->setTipoProveedor($registro["tipo"]);
            $this->objProveedor->setFechaRegistro($registro["fecha_Registro"]);
            $this->objProveedor->setImagen($registro["imagen"]);
            $this->objProveedor->setEmail($registro["email"]);
            $this->objProveedor->setTelefono($registro["telefono"]);
            $this->objProveedor->setCredito($registro["credito"]);
            $this->objProveedor->setFechaInactivo($registro["fecha_inactivo"])
            $objConexion->cerrarBd();
            return $this->objProveedor;
        }
    }
?>