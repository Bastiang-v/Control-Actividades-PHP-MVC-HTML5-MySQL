<?php
try {
	$opcion   = $_REQUEST['opcion'];
	switch($opcion){
	
		/**
		 * Acceso a la Clogin.php, y Mlogin.php
		 */
		case "login":
			
			require_once 'clogin.php';
						
			$rut   = trim($_REQUEST['rut']);
			$password = trim($_REQUEST['password']);
			
			$obj_login =  new Clogin();
					
			try 
			{
				$obj_login->login($rut,$password);
			} 
			catch (Exception $e) 
			{
				
			}
		break;
		case "modificar":
			require_once 'cactividad.php';
			$idt   = trim($_REQUEST['idt']);
			$nombre = trim($_REQUEST['nombre']);
			
			$obj_actividad =  new cactividad();
					
			try 
			{
				$obj_actividad->actualizar_perfil($idt,$nombre);
			} 
			catch (Exception $e) 
			{
				
			}
			break;
			case "ingresar":
				require_once 'cactividad.php';
				$nactividad = trim($_REQUEST['nactividad']);
				$dactividad = trim($_REQUEST['dactividad']);
				$factividad   = trim($_REQUEST['factividad']);
				$h_inicio = trim($_REQUEST['h_inicio']);
				$h_termino = trim($_REQUEST['h_termino']);
				$rut = trim($_REQUEST['rut']);
				$id_tipo = trim($_REQUEST['id_tipo']);
				$obj_actividad =  new cactividad();
						
				try 
				{
					$obj_actividad->ingresar_actividad($id_tipo,$nactividad,$dactividad,$factividad,$h_inicio,$h_termino,$rut);
				} 
				catch (Exception $e) 
				{
					
				}
				break;
	}
}
catch (Exception $e) {
	
	echo "<meta http-equiv='refresh' content='0;url=../view/index.php'>";
}
?>