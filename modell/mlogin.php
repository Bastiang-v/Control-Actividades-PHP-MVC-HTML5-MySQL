<?php

header('Content-Type: text/html; charset=UTF-8');
header('Content-Type: text/html; charset=iso-8859-1');

class funciones_BD {
 
    private $db;								
    
    /**
     * constructor de la clase funciones_BD, ejecuta la clase connect.php
     */ 
    function __construct() {
    	
        require_once '../conexion/connect.php'; 
        $this->db = new conexion();	
		
        
    }        
	public function login($rut,$password){
		
		
		$stmt = $this->db->connect()->prepare("SELECT perfil.nombre FROM usuario inner join perfil on
                                usuario.id_perfil=perfil.id_perfil  
								WHERE usuario.rut ='".$rut."' 
								AND usuario.pass = md5('".$password."')");
								$stmt->execute();
                                $rsl=$stmt->fetchColumn();
                                if (is_string($rsl)){
                                    return $rsl;
                                }else{
                                    return false;
                                }
		
	}
}
?>
