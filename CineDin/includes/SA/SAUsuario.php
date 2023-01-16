<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAOUsuario.php';


class SAUsuario{
	
    private static $daoUsuario;

    public static function login($idUsuario, $password) {
        $daoUsuario = new DAOUsuario();
        $user = $daoUsuario->buscaUsuarioDAO($idUsuario);
        if ($user && $user->compruebaPassword($password)) {
            return $user;
        }
        return NULL;
    }

    public static function buscaUsuarioSA($idUsuario) {
        $daoUsuario = new DAOUsuario();
        return $daoUsuario->buscaUsuarioDAO($idUsuario);
    }
    
    
    public static function crea($idUsuario, $nombre, $contrasena, $fecha, $correo, $tipo, $nivel, $foto){
        $daoUsuario = new DAOUsuario();
        $user = $daoUsuario->buscaUsuarioDAO($idUsuario);
        if ($user) {
            return NULL;
        }
		$daoUsuario->anadirUsuarioDAO($idUsuario, $nombre, $contrasena, $fecha, $correo, $tipo, $nivel, $foto);
        return $user;
    }

}
?>