<?php
    class Empleado{
        var $codigo;
        var $nombre;
        var $fechaIngreso;
        var $fechaRetiro;
        var $salarioBasico;
        var $deduccion;
        var $foto;
        var $hojaDeVida;
        var $email;
        var $telefono;
        var $celular;

        function __construct($codigo,$nombre,$fechaIngreso,$salarioBasico,$deduccion,$foto,$hojaDeVida,$email,$telefono,$celular)
        {
            $this->codigo=$codigo;
            $this->nombre=$nombre;
            $this->fechaIngreso=$fechaIngreso;
            $this->fechaRetiro=null;
            $this->salarioBasico=$salarioBasico;
            $this->deduccion=$deduccion;
            $this->foto=$foto;
            $this->hojaDeVida=$hojaDeVida;
            $this->email=$email;
            $this->telefono=$telefono;
            $this->celular=$celular;            
        }

        function setCodigo($codigo) { $this->codigo = $codigo; }
        function getCodigo() { return $this->codigo; }
        
        function setNombre($nombre) { $this->nombre = $nombre; }
        function getNombre() { return $this->nombre; }
        
        function setFechaIngreso($fechaIngreso) { $this->fechaIngreso = $fechaIngreso; }
        function getFechaIngreso() { return $this->fechaIngreso; }

        function setFechaRetiro($fechaRetiro) { $this->fechaRetiro = $fechaRetiro; }
        function getFechaRetiro() { return $this->fechaRetiro; }

        function setSalarioBasico($salarioBasico) { $this->salarioBasico = $salarioBasico; }
        function getSalarioBasico() { return $this->salarioBasico; }
        
        function setDeduccion($deduccion) { $this->deduccion = $deduccion; }
        function getDeduccion() { return $this->deduccion; }
        
        function setFoto($foto) { $this->foto = $foto; }
        function getFoto() { return $this->foto; }

        function setHojaDeVida($hojaDeVida) { $this->hojaDeVida = $hojaDeVida; }
        function getHojaDeVida() { return $this->hojaDeVida; }
        
        function setEmail($email) { $this->email = $email; }
        function getEmail() { return $this->email; }
        
        function setTelefono($telefono) { $this->telefono = $telefono; }
        function getTelefono() { return $this->telefono; }
        
        function setCelular($celular) { $this->celular = $celular; }
        function getCelular() { return $this->celular
            ; }


    }

?>