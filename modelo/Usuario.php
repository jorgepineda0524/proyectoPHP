<?php
 class Usuario{

        var $nomUsuario;
        var $contrasena;
        var $tipoUsuario;
        var $estado;

    function __construct($nomUsuario,$contrasena,$tipoUsuario){
	    $this->nomUsuario= $nomUsuario;
        $this->contrasena = $contrasena;	
        $this->tipoUsuario = $tipoUsuario;
        $this->estado="Activo";
     }


    function getContrasena() {return $this->contrasena;}
    function setContrasena($contrasena) {$this->contrasena = $contrasena;}

    function getNomUsuario() {return $this->nomUsuario;}
    function setNomUsuario($nomUsuario) {$this->nomUsuario = $nomUsuario;}

    function getTipoUsuario() {return $this->tipoUsuario;}
    function setTipoUsuario($tipoUsuario) {$this->tipoUsuario = $tipoUsuario;}

    function getEstado() {return $this->estado;}
    function setEstado($estado) {$this->estado = $estado;}
}
    
?>