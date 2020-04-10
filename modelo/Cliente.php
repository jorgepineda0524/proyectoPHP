<?php
class Cliente{
    var $codigo;
    var $nombre;
    var $credito;
    function __construct($codigo,$nombre,$credito)
    {
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->credito=$credito;
    }
    function setCodigo($codigo) { $this->codigo = $codigo; }
    function getCodigo() { return $this->codigo; }

    function setNombre($nombre) { $this->nombre = $nombre; }
    function getNombre() { return $this->nombre; }

    function setCredito($credito) { $this->credito = $credito; }
    function getCredito() { return $this->credito; }
}
?>