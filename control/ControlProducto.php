<?php
    class ControlProducto{
        var objProducto;

        function __construct($objProducto){
            $this->objProducto=$objProducto;        
        }

        function guardar(){
            $codigo=$this->objProducto->getCodigo();
            $nombre=$this->objProducto->getNombre();
            $imagen=$this->objProducto->getImagen();
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="INSERT INTO PRODUCTO(CODIGO,NOMBRE,IMAGEN) VALUES('".$codigo."','".$nombre."','".$imagen."')";
            $objConexion->ejecutarComandoSql($comandoSql);
            $objConexion->cerrarBd();
        }

        function modificar(){
            $codigo=$this->objProducto->getCodigo();
            $nombre=$this->objProducto->getNombre();
            $imagen=$this->objProducto->getImagen();
    
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="UPDATE PRODUCTO SET NOMBRE='".$nombre."',IMAGEN='".$imagen"' WHERE CODIGO='".$codigo."'";
            $objConexion->ejecutarComandoSql($comandoSql);
            $objConexion->cerrarBd();
        }

        function borrar(){
            $codigo=$this->objProducto->getCodigo();
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="DELETE FROM PRODUCTO  WHERE CODIGO='".$codigo."'";
            $objConexion->ejecutarComandoSql($comandoSql);
            $objConexion->cerrarBd();
        }

        function consultar(){
            $codigo=$this->objProducto->getCodigo();
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="SELECT * FROM PRODUCTO  WHERE CODIGO='".$codigo."'";
            $recordSet=$objConexion->ejecutarSelect($comandoSql);
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);
            $this->objProducto->setNombre($registro["nombre"]);
            $this->objProducto->setTipoProducto($registro["tipoProducto"]);
            $this->objProducto->setFechaRegistro($registro["fechaRegistro"]);
            $this->objProducto->setImagen($registro["imagen"]);
            $this->objProducto->setEmail($registro["email"]);
            $this->objProducto->setTelefono($registro["telefono"]);
            $this->objProducto->setCredito($registro["credito"]);
            $objConexion->cerrarBd();
            return $this->objProducto;
        }
    }
?>