<?php
    class Proveedor {
        var $codigo;
        var $nombre;
        var $tipoProveedor;
        var $email;
        var $telefono;
        var $imagen;
        var $fechaRegistro;
        var $fecharInactivo
        
    function __construct($codigo,$nombre,$tipoProveedor,$email,$telefono,$fechaRegistro,$imagen)
    {
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->tipoProveedor=$tipoProveedor;  
        $this->email=$email;
        $this->telefono=$telefono;
        $this->fechaRegistro=$fecharRegistro;
        $this->imagen=$imagen;
        $this->fechaInactivo=null;
    }

    function setCodigo($codigo) { $this->codigo = $codigo; }
    function getCodigo() { return $this->codigo; }

    function setNombre($nombre) { $this->nombre = $nombre; }
    function getNombre() { return $this->nombre; }

    function setTipoProveedor($tipoCliente) { $this->tipoCliente = $tipoCliente; }
    function getTipoProveedor() { return $this->tipoCliente; }

    function setEmail($email) { $this->email = $email; }
    function getEmail() { return $this->email; }

    function setTelefono($telefono) { $this->telefono = $telefono; }
    function getTelefono() { return $this->telefono; }

    function setImagen($imagen) { $this->imagen = $imagen; }
    function getImagen() { return $this->imagen; }

    function setFechaRegistro($fecharRegistro) { $this->fecharRegistro = $fecharRegistro; }
    function getFechaRegistro() { return $this->fecharRegistro; }

    function setFechaInactivo($fecharInactivo) { $this->fecharInactivo = $fecharInactivo; }
    function getFechaInactivo() { return $this->fecharInactivo; }

    }
?>