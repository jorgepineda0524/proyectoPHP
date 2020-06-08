<?php
    class ControlProducto{
        var $objProducto;

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
            $comandoSql="UPDATE PRODUCTO SET NOMBRE='".$nombre."',IMAGEN='".$imagen."' WHERE CODIGO='".$codigo."'";
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
            $comandoSql="SELECT P.codigo, P.nombre,P.imagen, PR.nombre as nombreProveedor 
                        FROM PRODUCTO P
                        INNER JOIN PRODUCTO_PROVEEDOR PP ON PP.producto=P.codigo 
                        INNER JOIN PROVEEDOR PR ON PR.documento=PP.documento_proveedorcol 
                        WHERE CODIGO='".$codigo."'";
            $recordSet=$objConexion->ejecutarSelect($comandoSql);
            $registro = $recordSet->fetch_array(MYSQLI_BOTH);
            $this->objProducto->setNombre($registro["nombre"]);
            $this->objProducto->setCodigo($registro["codigo"]);
            $this->objProducto->setImagen($registro["imagen"]);
            $objConexion->cerrarBd();
            return $this->objProducto;
        }

        function  listarProductos(){
        
            $objConexion = new ControlConexion();
            
            try{
                $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                $comandoSql="SELECT P.codigo, P.nombre,P.imagen, PR.nombre as nombreProveedor 
                FROM PRODUCTO P
                INNER JOIN PRODUCTO_PROVEEDOR PP ON PP.producto=P.codigo 
                INNER JOIN PROVEEDOR PR ON PR.documento=PP.documento_proveedorcol";
                $recordSet=$objConexion->ejecutarSelect($comandoSql);
                
    
            } catch (Exception $e){
              echo "ERROR ".$e->getMessage()."\n";
              }
              
              $objConexion->cerrarBd();
    
              return $recordSet;
                
      }

      function consultarPagina(){
  
    
        $pagina= $this->objProducto->getPagina();
        $objConexion = new ControlConexion();
        
        try{
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql="SELECT P.codigo, P.nombre,P.imagen, PR.nombre as nombreProveedor 
                        FROM PRODUCTO P
                        INNER JOIN PRODUCTO_PROVEEDOR PP ON PP.producto=P.codigo 
                        INNER JOIN PROVEEDOR PR ON PR.documento=PP.documento_proveedorcol LIMIT $pagina,5";
            $recordSet=$objConexion->ejecutarSelect($comandoSql);
            
    
        } catch (Exception $e){
          echo "ERROR ".$e->getMessage()."\n";
          }
          
          $objConexion->cerrarBd();
    
          return $recordSet;
            
      }


      


    }
?>