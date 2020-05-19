<?php
 class Usuario{

        var $nomUsuario;
        var $contrasena;
        var $tipoUsuario;
        var $estado;
        var $pagina;

    function __construct($nomUsuario,$contrasena,$tipoUsuario,$pagina){
	    $this->nomUsuario= $nomUsuario;
        $this->contrasena = $contrasena;	
        $this->tipoUsuario = $tipoUsuario;
        $this->estado="Activo";
        $this->pagina=$pagina;
     }


    function getContrasena() {return $this->contrasena;}
    function setContrasena($contrasena) {$this->contrasena = $contrasena;}

    function getNomUsuario() {return $this->nomUsuario;}
    function setNomUsuario($nomUsuario) {$this->nomUsuario = $nomUsuario;}

    function getTipoUsuario() {return $this->tipoUsuario;}
    function setTipoUsuario($tipoUsuario) {$this->tipoUsuario = $tipoUsuario;}

    function getEstado() {return $this->estado;}
    function setEstado($estado) {$this->estado = $estado;}

    function getPagina() {return $this->pagina;}
    function setPagina($pagina) {$this->pagina = $pagina;}
}
    
?>