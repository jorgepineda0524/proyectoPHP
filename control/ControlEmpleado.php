<?php
class ControlEmpleado {
    var $objEmpleado;
    function __construct($objEmpleado){
        $this->objEmpleado=$objEmpleado;
   }

   function guardar(){
    $codigo=$this->objEmpleado->getCodigo();
    $nombre=$this->objEmpleado->getNombre();
    $fechaIngreso=$this->objEmpleado->getFechaIngreso();
    $salario=$this->objEmpleado->getSalarioBasico();
    $deduccion=$this->objEmpleado->getDeduccion();
    $foto=$this->objEmpleado->getFoto();
    $hojaDeVida=$this->objEmpleado->getHojaDeVida();
    $email=$this->objEmpleado->getEmail();
    $telefono=$this->objEmpleado->getTelefono();
    $celular=$this->objEmpleado->getCelular();

    $objConexion = new ControlConexion();
    $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
    $comandoSql="INSERT INTO EMPLEADO(DOCUMENTO,NOMBRE,FECHA_INGRESO,SALARIO_BASICO,DEDUCCION,FOTO,HOJA_VIDA,
    EMAIL,TELEFONO,CELULAR,IDPERSONA) VALUES('".$codigo."','".$nombre."','".$fechaIngreso."','".$salario."',
    '".$deduccion."','".$foto."','".$hojaDeVida."','".$email."','".$telefono."','".$celular."',1)";
    $objConexion->ejecutarComandoSql($comandoSql);
    $objConexion->cerrarBd();
    }

    function modificar(){
        $codigo=$this->objEmpleado->getCodigo();
        $nombre=$this->objEmpleado->getNombre();
        $fechaIngreso=$this->objEmpleado->getFechaIngreso();
        $salario=$this->objEmpleado->getSalarioBasico();
        $deducciones=$this->objEmpleado->getDeduccion();
        $foto=$this->objEmpleado->getFoto();
        $hojaDeVida=$this->objEmpleado->getHojaDeVida();
        $email=$this->objEmpleado->getEmail();
        $telefono=$this->objEmpleado->getTelefono();
        $celular=$this->objEmpleado->getCelular();

        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE EMPLEADO SET NOMBRE='".$nombre."',FECHA_INGRESO='".$fechaIngreso."',FOTO='".$foto."',
            SALARIO_BASICO='".$salario."',DEDUCCION='".$deducciones."',EMAIL='".$email."',TELEFONO='".$telefono."',
            HOJA_VIDA='".$hojaDeVida."',CELULAR='".$celular."',IDPERSONA=1 WHERE DOCUMENTO='".$codigo."'";
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
        $this->objEmpleado->setCodigo($registro["documento"]);
        $this->objEmpleado->setFechaIngreso($registro["fecha_ingreso"]);
        $this->objEmpleado->setFoto($registro["foto"]);
        $this->objEmpleado->setSalarioBasico($registro["salario_basico"]);
        $this->objEmpleado->setDeduccion($registro["deduccion"]);
        $this->objEmpleado->setEmail($registro["email"]);
        $this->objEmpleado->setTelefono($registro["telefono"]);
        $this->objEmpleado->setCelular($registro["celular"]);
        //$this->objEmpleado->setFechaIngreso($registro["fecha_ingreso"]);
        $this->objEmpleado->setHojaDeVida($registro["hoja_vida"]);
        $objConexion->cerrarBd();
        return $this->objEmpleado;
    }
}
?>