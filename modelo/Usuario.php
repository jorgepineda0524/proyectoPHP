<?php
 class Usuario{

        var $nomUsuario;
        var $contrasena;
        var $tipoUsuario;

    function __construct($nomUsuario,$contrasena,$tipoUsuario){
	    $this->nomUsuario= $nomUsuario;
        $this->contrasena = $contrasena;	
        $this->tipoUsuario = $tipoUsuario;
     }


    function getContrasena() {return $this->contrasena;}
    function setContrasena($contrasena) {$this->contrasena = $contrasena;}

    function getNomUsuario() {return $this->nomUsuario;}
    function setNomUsuario($nomUsuario) {$this->nomUsuario = $nomUsuario;}

    function getTipoUsuario() {return $this->tipoUsuario;}
    function setTipoUsuario($tipoUsuario) {$this->tipoUsuario = $tipoUsuario;}
}
    
?>