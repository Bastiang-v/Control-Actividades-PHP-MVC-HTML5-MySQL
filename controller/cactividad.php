<?php
class cactividad
{
    public function __construct(){
        
        
    }

    public function mostrar_actividad($tipo_actividad,$Operador){
        require_once '../modell/mactividad.php';
        try
        {
            $lista = new funciones_actividad();
            $list = $lista->mostrar_actvidiades($tipo_actividad,$Operador);
            return $list;
            if($list)
            {
                return true;
            }else
            {
                return false;
            }
        }
        catch(Exception $e)
        {
            echo "error";
        }
    }
    public function mostrar_top(){
        require_once '../modell/mactividad.php';
        try
        {
            $lista = new funciones_actividad();
            $list = $lista->mostrar_top();
            return $list;
        }
        catch(Exception $e)
        {
            echo "error";
        }
    }
    public function mostrar_tipo(){
        require_once '../modell/mactividad.php';
        try
        {
            $lista = new funciones_actividad();
            $list = $lista->mostrar_tipo();
            return $list;
        }
        catch(Exception $e)
        {
            echo "error";
        }
    }
    public function select_tipo(){
        require_once '../modell/mactividad.php';
        try
        {
            $lista = new funciones_actividad();
            $list = $lista->select_tipo();
            return $list;
        }
        catch(Exception $e)
        {
            echo "error";
        }
    }
    public function select_operador(){
        require_once '../modell/mactividad.php';
        try
        {
            $lista = new funciones_actividad();
            $list = $lista->select_operador();
            return $list;
        }
        catch(Exception $e)
        {
            echo "error";
        }
    }
    public function  desactivar_perfil($id)
    {
        require_once '../modell/mactividad.php';
        try
        {
            $lista = new funciones_actividad();
            $list = $lista->desactivar_perfil($id);
            if($list)
            {
                return true;
            }else
            {
                return false;
            }
        }
        catch(Exception $e)
        {
            echo "error";
        }
    }
    public function  activar_perfil($idact)
    {
        require_once '../modell/mactividad.php';
        try
        {
            $lista = new funciones_actividad();
            $list = $lista->activar_perfil($idact);
            if($list)
            {
                return true;
            }else
            {
                return false;
            }
        }
        catch(Exception $e)
        {
            echo "error";
        }
    }
    public function  actualizar_perfil($idt,$nombre)
    {
        require_once '../modell/mactividad.php';
        try
        {
            $lista = new funciones_actividad();
            $list = $lista->actualizar_perfil($idt,$nombre);
            if($list)
            {
                echo "<meta http-equiv='refresh' content='0;url=../view/actividades.php'>";
                return true;
            }else
            {
                return false;
            }
        }
        catch(Exception $e)
        {
            echo "error";
        }
        
    }
    public function ingresar_actividad($id_tipo,$nactividad,$dactividad,$factividad,$h_inicio,$h_termino,$rut)
    {
        require_once '../modell/mactividad.php';
        try
        {
            $lista = new funciones_actividad();
            $list = $lista->ingresar_actividad($id_tipo,$nactividad,$dactividad,$factividad,$h_inicio,$h_termino,$rut);
            
            if($list)
            {
                
				echo "<center><h1>Actividad Ingresada Con Exito</h1>";	
				echo "<img src='../view/img/logo.png'><center>";
                echo "<meta http-equiv='refresh' content='2;url=../view/ingresar.php'>";
                return true;
            }else
            {
                echo "<center><h1>Error al Ingresar Actividad</h1>";	
				echo "<img src='../view/img/logo.png'><center>";
                echo "<meta http-equiv='refresh' content='2;url=../view/ingresar.php'>";
                return false;
            }
        }
        catch(Exception $e)
        {
            echo "error";
        }
        
    }
    function rut( $rut ) {
        return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
    }
    
    
    /* public function ingresar_usuario($username,$password,$rut,$nombre,$apellido,$edad,$id_telefono,$id_direccion,$id_correo)
    {
        require_once '../modell/musuario.php';
        try
        {
            $lista = new funciones_usuario();
            $list = $lista->ingresar_usuario($username,$password,$rut,$nombre,$apellido,$edad,
                                             $id_telefono,$id_direccion,$id_correo);
            
            if($lista)
            {
                return true;
            }else
            {
                return false;
            }
        }
        catch(Exception $e)
        {
            echo "error";
        }
        
    }
     public function  actualizar_usuario($username,$password,$rut,$nombre,$apellido,$edad)
    {
        require_once '../modell/musuario.php';
        try
        {
            $lista = new funciones_usuario();
            $list = $lista->actualizar_usuario($username,$password,$rut,$nombre,$apellido,$edad);
            
            if($lista)
            {
                return true;
            }else
            {
                return false;
            }
        }
        catch(Exception $e)
        {
            echo "error";
        }
        
    } */
}
 /* $prueba = new cactividad;
$ob=$prueba->mostrar_actividad(2,126717881);
var_dump($ob);   */
?>