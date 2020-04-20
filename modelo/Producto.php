<?php
    class Producto{
        var $codigo;
        var $nombre;
        var $imagen;

        function __construct($codigo,$nombre,$imagen){
            $this->codigo= $codigo;
            $this->nombre = $nombre;	
            $this->imagen = $imagen;
         }
    
        function getCodigo() {return $this->codigo;}
        function setCodigo($codigo) {$this->codigo = $codigo;}

        function getNombre() {return $this->nombre;}
        function setNombre($nombre) {$this->nombre = $nombre;}

        function getImagen() {return $this->imagen;}
        function setImagen($imagen) {$this->imagen = $imagen;}
    }
?>