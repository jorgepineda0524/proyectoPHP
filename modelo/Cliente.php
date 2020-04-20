<?php
class Cliente{
    var $codigo;
    var $nombre;
    var $tipoCliente;
    var $fechaRegistro;
    var $fechaInactivo;
    var $imagen;
    var $email;
    var $telefono;
    var $credito;
    
    function __construct($codigo,$nombre,$tipoCliente,$fechaRegistro,$imagen,$email,$telefono,$credito)
    {
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->tipoCliente=$tipoCliente
        $this->fechaRegistro=$fechaRegistro;
        $this->imagen=$imagen;
        $this->email=$email;
        $this->telefono=$telefono;
        $this->credito=$credito;
    }
    function setCodigo($codigo) { $this->codigo = $codigo; }
    function getCodigo() { return $this->codigo; }

    function setNombre($nombre) { $this->nombre = $nombre; }
    function getNombre() { return $this->nombre; }

    function setTipoCliente($tipoCliente) { $this->tipoCliente = $tipoCliente; }
    function getTipoCliente() { return $this->tipoCliente; }

    function setFechaRegistro($fechaRegistro) { $this->fechaRegistro = $fechaRegistro; }
    function getFechaRegistro() { return $this->fechaRegistro; }

    function setImagen($imagen) { $this->imagen = $imagen; }
    function getImagen() { return $this->imagen; }

    function setEmail($email) { $this->email = $email; }
    function getEmail() { return $this->email; }

    function setTelefono($telefono) { $this->telefono = $telefono; }
    function getTelefono() { return $this->telefono; }

    function setCredito($credito) { $this->credito = $credito; }
    function getCredito() { return $this->credito; }

    
}
?>