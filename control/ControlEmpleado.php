<?php
class ControlEmpleado{
    var $objEmpleado;
    function __construct($objEmpleado){
        $this->objEmpleado=$objEmpleado;
   }

   function guardar(){
    $this->codigo=$this->objEmpleado->getCodigo();
    $this->nombre=$this->objEmpleado->getNombre();
    $this->fechaIngreso=$this->objEmpleado->getFechaIngreso();
    $this->salario=$this->objEmpleado->getSalarioBasico();
    $this->deducciones=$this->objEmpleado->getDeducciones();
    $this->foto=$this->objEmpleado->getFoto();
    $this->hojaDeVida=$this->objEmpleado->getHojaDeVida();
    $this->email=$this->objEmpleado->getEmail();
    $this->telefono=$this->objEmpleado->getTelefono();
    $this->celular=$this->objEmpleado->getCelular();

    $objConexion = new ControlConexion();
    $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
    $comandoSql="INSERT INTO EMPLEADO(DOCUMENTO,NOMBRE,EMAIL,FOTO,FECHA_INGRESO,SALARIO_BASICO,DEDUCCION,HOJA_VIDA
        TELEFONO,CELULAR) VALUES('".$codigo."','".$nombre."','".$email."','".$imagen."',
        '".$fechaIngreso."','".$salario."','".$deducciones."','".$hojaDeVida."','".$telefono."','".$celular."')";
    $objConexion->ejecutarComandoSql($comandoSql);
    $objConexion->cerrarBd();
    }

    function modificar(){
        $this->codigo=$this->objEmpleado->getCodigo();
        $this->nombre=$this->objEmpleado->getNombre();
        $this->fechaIngreso=$this->objEmpleado->getFechaIngreso();
        $this->salario=$this->objEmpleado->getSalarioBasico();
        $this->deducciones=$this->objEmpleado->getDeducciones();
        $this->foto=$this->objEmpleado->getFoto();
        $this->hojaDeVida=$this->objEmpleado->getHojaDeVida();
        $this->email=$this->objEmpleado->getEmail();
        $this->telefono=$this->objEmpleado->getTelefono();
        $this->celular=$this->objEmpleado->getCelular();

        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE EMPLEADO SET NOMBRE='".$nombre."',FECHA_INGRESO='".$fechaRegistro."',FOTO='".$imagen."',
            SALARIO_BASICO='".$salario."',DEDUCCION='".$deducciones."',EMAIL='".$email."',TELEFONO='".$telefono."',
            HOJA_VIDA='".$hojaDeVida."',CELULAR='".$celular."' WHERE DOCUMENTO='".$codigo."'";
        $objConexion->ejecutarComandoSql($comandoSql);
        $objConexion->cerrarBd();
    }

    function borrar(){
        $codigo=$this->objEmpleado->getCodigo();
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="DELETE FROM EMPLEADO  WHERE DOCUMENTO='".$codigo."'";
        $objConexion->ejecutarComandoSql($comandoSql);
        $objConexion->cerrarBd();
    }

    function consultar(){

        $codigo=$this->objEmpleado->getCodigo();
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="SELECT * FROM EMPLEADO  WHERE DOCUMENTO='".$codigo."'";
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $registro = $recordSet->fetch_array(MYSQLI_BOTH);
        $this->objEmpleado->setNombre($registro["nombre"]);
        $this->objEmpleado->setFechaIngreso($registro["fecha_Registro"]);
        $this->objEmpleado->setImagen($registro["foto"]);
        $this->objEmpleado->setSalarioBasico($registro["salario_basico"]);
        $this->objEmpleado->setDeduccion($registro["deduccion"])
        $this->objEmpleado->setEmail($registro["email"]);
        $this->objEmpleado->setTelefono($registro["telefono"]);
        $this->objEmpleado->setCelular($registro["celular"]);
        $this->objEmpleado->setFechaInactivo($registro["fecha_registro"])
        $this->objEmpleado->setHojaDeVida($registro["hoja_vida"])
        $objConexion->cerrarBd();
        return $this->objEmpleado;
    }
}
?>