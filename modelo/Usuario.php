<?php
 class Usuario{

        var $nomUsuario;
        var $contrasena;

    function __construct($nomUsuario,$contrasena){
	    $this->nomUsuario= $nomUsuario;
        $this->contrasena = $contrasena;	
     }


    function getContrasena() {
        return $this->contrasena;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function getNomUsuario() {
        return $this->nomUsuario;
    }

    function setNomUsuario($nomUsuario) {
        $this->nomUsuario = $nomUsuario;
    }
}
    
?>