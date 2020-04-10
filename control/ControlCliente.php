<?php 

class ControlCliente {
    var $objCliente;

	function __construct($objCliente){
	$this->objCliente=$objCliente;

	}

	function guardar(){
		$cod=$this->objCliente->getCodigo();
		$nom=$this->objCliente->getNombre();
		$cre=$this->objCliente->getCredito();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO CLIENTE(CODIGO,NOMBRE,CREDITO) VALUES('".$cod."','".$nom."',".$cre.")";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}

	function modificar(){
		$cod=$this->objCliente->getCodigo();
		$nom=$this->objCliente->getNombre();
		$cre=$this->objCliente->getCredito();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE CLIENTE SET NOMBRE='".$nom."',CREDITO=".$cre." WHERE CODIGO='".$cod."'";
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
        $this->objCliente->setCredito($registro["credito"]);
		$objConexion->cerrarBd();
		return $this->objCliente;
	}
}
?>