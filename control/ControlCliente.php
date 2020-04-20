<?php 

class ControlCliente {
    var $objCliente;

	function __construct($objCliente){
	$this->objCliente=$objCliente;

	}

	function guardar(){
		$codigo=$this->objCliente->getCodigo();
		$nombre=$this->objCliente->getNombre();
		$tipoCliente=$this->objCLiente->getTipoCliente();
		$fechaRegistro=$this->objCliente->getFechaRegistro();
		$imagen=$this->objCliente->getImagen();
		$email=$this->objCliente->getEmail();
		$telefono=$this->objCliente->getTelefono();
		$credito=$this->objCliente->getCredito();

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO CLIENTE(CODIGO,NOMBRE,TIPOCLIENTE,FECHAREGISTRO,
		IMAGEN,EMAIL,TELEFONO,CREDITO) VALUES('".$codigo."','".$nombre."','".$tipoCliente"',
		'".$fechaRegistro"','".$imagen"','".$email"','".$telefono"','".$credito."')";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}

	function modificar(){
		$codigo=$this->objCliente->getCodigo();
		$nombre=$this->objCliente->getNombre();
		$tipoCliente=$this->objCLiente->getTipoCliente();
		$fechaRegistro=$this->objCliente->getFechaRegistro();
		$imagen=$this->objCliente->getImagen();
		$email=$this->objCliente->getEmail();
		$telefono=$this->objCliente->getTelefono();
		$credito=$this->objCliente->getCredito();

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE CLIENTE SET NOMBRE='".$nombre."',TIPOCLIENTE='".$tipoCliente"',
			FECHAREGISTRO='".$fechaRegistro"',IMAGEN='".$imagen"',EMAIL='".$email"',
			TELEFONO='".$telefono"',CREDITO='".$credito."' WHERE CODIGO='".$codigo."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}

	function borrar(){
		$cod=$this->objCliente->getCodigo();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="DELETE FROM CLIENTE  WHERE CODIGO='".$cod."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}
	function consultar(){

		$cod=$this->objCliente->getCodigo();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM CLIENTE  WHERE CODIGO='".$cod."'";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		$registro = $recordSet->fetch_array(MYSQLI_BOTH);
		$this->objCliente->setNombre($registro["nombre"]);
		$this->objCliente->setTipoCliente($registro["tipoCliente"]);
		$this->objCliente->setFechaRegistro($registro["fechaRegistro"]);
		$this->objCliente->setImagen($registro["imagen"]);
		$this->objCliente->setEmail($registro["email"]);
		$this->objCliente->setTelefono($registro["telefono"]);
        $this->objCliente->setCredito($registro["credito"]);
		$objConexion->cerrarBd();
		return $this->objCliente;
	}
}
?>