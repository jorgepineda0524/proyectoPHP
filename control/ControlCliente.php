<?php 

class ControlCliente {
    var $objCliente;

	function __construct($objCliente){
	$this->objCliente=$objCliente;

	}

	function guardar(){
		$documento=$this->objCliente->getCodigo();
		$nombre=$this->objCliente->getNombre();
		$tipoCliente=$this->objCliente->getTipoCliente();
		$fechaRegistro=$this->objCliente->getFechaRegistro();
		$imagen=$this->objCliente->getImagen();
		$email=$this->objCliente->getEmail();
		$telefono=$this->objCliente->getTelefono();
		$cupo=$this->objCliente->getCredito();

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO CLIENTE(DOCUMENTO,NOMBRE,TIPO,FECHA_REGISTRO,
		IMAGEN,EMAIL,TELEFONO,CUPO,IDPERSONA) VALUES('".$documento."','".$nombre."','".$tipoCliente."','".$fechaRegistro."',
		'".$imagen."','".$email."','".$telefono."','".$cupo."',2)";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}

	function modificar(){
		$documento=$this->objCliente->getCodigo();
		$nombre=$this->objCliente->getNombre();
		$tipoCliente=$this->objCliente->getTipoCliente();
		$fechaRegistro=$this->objCliente->getFechaRegistro();
		$imagen=$this->objCliente->getImagen();
		$email=$this->objCliente->getEmail();
		$telefono=$this->objCliente->getTelefono();
		$cupo=$this->objCliente->getCredito();

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE CLIENTE SET NOMBRE='".$nombre."',TIPO='".$tipoCliente."',
			FECHA_REGISTRO='".$fechaRegistro."',IMAGEN='".$imagen."',EMAIL='".$email."',
			TELEFONO='".$telefono."',CUPO='".$cupo."',IDPERSONA=2  WHERE DOCUMENTO='".$documento."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}

	function borrar(){
		$documento=$this->objCliente->getCodigo();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="DELETE FROM CLIENTE  WHERE DOCUMENTO='".$documento."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}
	function consultar(){

		$documento=$this->objCliente->getCodigo();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM CLIENTE  WHERE DOCUMENTO='".$documento."'";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		$registro = $recordSet->fetch_array(MYSQLI_BOTH);
		$this->objCliente->setCodigo($registro["documento"]);
		$this->objCliente->setNombre($registro["nombre"]);
		$this->objCliente->setTipoCliente($registro["tipo"]);
		$this->objCliente->setFechaRegistro($registro["fecha_registro"]);
		$this->objCliente->setImagen($registro["imagen"]);
		$this->objCliente->setEmail($registro["email"]);
		$this->objCliente->setTelefono($registro["telefono"]);
        $this->objCliente->setCredito($registro["cupo"]);
		$objConexion->cerrarBd();
		return $this->objCliente;
	}
}
?>