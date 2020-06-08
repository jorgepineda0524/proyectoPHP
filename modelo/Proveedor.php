<?php
    class Proveedor{
        var $codigo;
        var $nombre;
        var $tipoProveedor;
        var $telefono;
        var $email;
        var $imagen;
        var $fechaRegistro;
        var $fecharInactivo;
        var $pagina;
        //var $idpersona;
        
    function __construct($codigo,$nombre,$fechaRegistro,$tipoProveedor,$email,$telefono,$imagen,$pagina){
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->tipoProveedor=$tipoProveedor;  
        $this->email=$email;  
        $this->telefono=$telefono;
        $this->fechaRegistro=$fechaRegistro;
        $this->imagen=$imagen;
        $this->fecharInactivo=null;
        $this->pagina=$pagina;
     }

    function setCodigo($codigo) { $this->codigo = $codigo; }
    function getCodigo() { return $this->codigo; }

    function setNombre($nombre) { $this->nombre = $nombre; }
    function getNombre() { return $this->nombre; }

    function setTipoProveedor($tipoProveedor) { $this->tipoProveedor = $tipoProveedor; }
    function getTipoProveedor() { return $this->tipoProveedor; }

    function setTelefono($telefono) { $this->telefono = $telefono; }
    function getTelefono() { return $this->telefono; }

    function setImagen($imagen) { $this->imagen = $imagen; }
    function getImagen() { return $this->imagen; }

    function setFechaRegistro($fechaRegistro) { $this->fechaRegistro = $fechaRegistro; }
    function getFechaRegistro() { return $this->fechaRegistro; }

    function setFechaInactivo($fecharInactivo) { $this->fecharInactivo = $fecharInactivo; }
    function getFechaInactivo() { return $this->fecharInactivo; }

    function setEmail($email) { $this->email = $email; }
    function getEmail() { return $this->email; }

    function setPagina($pagina) { $this->pagina = $pagina; }
    function getPagina() { return $this->pagina; }

    }
?>