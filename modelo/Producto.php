<?php
    class Producto{
        var $codigo;
        var $nombre;
        var $imagen;
        var $pagina;

        function __construct($codigo,$nombre,$imagen,$pagina){
            $this->codigo= $codigo;
            $this->nombre = $nombre;	
            $this->imagen = $imagen;
            $this->pagina = $pagina;
         }
    
        function getCodigo() {return $this->codigo;}
        function setCodigo($codigo) {$this->codigo = $codigo;}

        function getNombre() {return $this->nombre;}
        function setNombre($nombre) {$this->nombre = $nombre;}

        function getImagen() {return $this->imagen;}
        function setImagen($imagen) {$this->imagen = $imagen;}

        function setPagina($pagina) { $this->pagina = $pagina; }
        function getPagina() { return $this->pagina; }
    }
?>