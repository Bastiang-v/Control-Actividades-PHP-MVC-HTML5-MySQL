<?php
/**
 * Clase Clogin
 */
class clogin{
	
		public function __construct(){
			
		}
		
		public function login($rut,$password){
			
			require_once '../modell/mlogin.php'; 
					
			
			$ins   = new funciones_BD();
			if(is_string($ins->login($rut,$password)))
		    {
				session_start();
				$_SESSION['perfil']=$ins->login($rut,$password);
				$_SESSION['rut']  = $rut;
				$_SESSION['hora']    = time();
				switch ($_SESSION['perfil']) {
					case 'Administrador':
						/* require_once '../controller/cactividad.php'; 
						$prueba = new cactividad();
						$usuarios = $prueba->mostrar_actividad(); */
						echo "<meta http-equiv='refresh' content='0;url=../view/actividades.php'>";
						break;

						case 'Operador':
						echo "<meta http-equiv='refresh' content='0;url=../view/ingresar.php'>";
						break;

					default:
						echo 'error';
						break;
				}
			}
			else
			{	
                
				echo "<center><h1>Rut o Contraseña incorrectos</h1>";	
				echo "<img src='../view/img/logo.png'><center>";
				echo "<meta http-equiv='refresh' content='2;url=../view/index.php'>";
			}		
		}
}
?>