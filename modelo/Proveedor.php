<?php
    class Proveedor {
        var $codigo;
        var $nombre;
        var $tipoProveedor;
        var $email;
        var $telefono;
        var $productos;
        
    function __construct($codigo,$nombre,$tipoProveedor,$email,$telefono,$productos)
    {
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->tipoProveedor=$tipoProveedor;  
        $this->email=$email;
        $this->telefono=$telefono;
        $this->productos=$productos;
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

    function setProductos($productos) { $this->productos = $productos; }
    function getProductos() { return $this->productos; }


    }
?>