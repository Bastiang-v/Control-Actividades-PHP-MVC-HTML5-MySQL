<?php
class funciones_actividad
{
    function __construct(){
        require_once '../conexion/connect.php';
        $this->db = new conexion();
    }
    public function mostrar_actvidiades($tipoactividad,$Operador)
    {
        $stmt = $this->db->connect()->prepare('SELECT  actividad.*,usuario.nombre as noperador,tipo_actividad.nombre as tipo
        FROM actividad
        INNER JOIN usuario ON actividad.rut=usuario.rut
        inner join tipo_actividad on actividad.id_tipoactividad=tipo_actividad.id_tipoactividad
        WHERE actividad.estado=1 and
        usuario.id_perfil=2 and
        usuario.rut=:rut and 
        tipo_actividad.id_tipoactividad=:tipoactividad');
        $stmt->bindParam("tipoactividad", $tipoactividad,PDO::PARAM_STR);
$stmt->bindParam("rut", $Operador,PDO::PARAM_STR);
$stmt->execute();
        $datos =array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $datos[] = $fila;
        }
        return $datos;
    
    } 
    public function mostrar_top()
    {
        $stmt = $this->db->connect()->query('SELECT SUM(actividad.total_hora) AS horas, COUNT(id_actividad) AS total_actividades,usuario.nombre
        FROM actividad
        INNER JOIN usuario ON actividad.rut=usuario.rut
        WHERE actividad.estado=1 and
        usuario.id_perfil=2
        GROUP BY nombre
        ORDER BY horas DESC');
        
        $datos =array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $datos[] = $fila;
        }
        return $datos;
    
    }
    public function select_tipo()
    {
        $stmt = $this->db->connect()->query('select * from tipo_actividad where estado=1');
        
        $datos =array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $datos[] = $fila;
        }
        return $datos;
    
    }
    public function mostrar_tipo()
    {
        $stmt = $this->db->connect()->query('select * from tipo_actividad');
        
        $datos =array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $datos[] = $fila;
        }
        return $datos;
    
    }
    public function select_operador()
    {
        $stmt = $this->db->connect()->query('select usuario.rut,usuario.nombre,usuario.apellido from usuario where id_perfil=2;');
        
        $datos =array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $datos[] = $fila;
        }
        return $datos;
    
    }
    public function desactivar_perfil($id)
    {
        $sql_estado = $this->db->connect()->exec("update tipo_actividad set tipo_actividad.estado=0 where id_tipoactividad = '".$id."'");
        
        if($sql_estado)
        {
            return true;
        }else
        {
            return false;
        }
    }
    public function activar_perfil($idact)
    {
        $sql_estado = $this->db->connect()->exec("update tipo_actividad set tipo_actividad.estado=1 where id_tipoactividad = '".$idact."'");
        
        if($sql_estado)
        {
            return true;
        }else
        {
            return false;
        }
    }
    public function actualizar_perfil($idt,$nombre)
    {
        $sql_estado = $this->db->connect()->exec("update tipo_actividad  set nombre = '".$nombre."' where id_tipoactividad = '".$idt."'");
        
        if($sql_estado)
        {
            return true;
        }else
        {
            return false;
        }
    }
    public function ingresar_actividad($id_tipo,$nactividad,$dactividad,$factividad,$h_inicio,$h_termino,$rut)
    {
        $sql_estado = $this->db->connect()->query("insert into actividad  (id_tipoactividad,nombre,descripcion,fecha_actividad,hora_inicio,hora_termino,rut)
        values
        (
         '".$id_tipo."',
         '".$nactividad."',
         '".$dactividad."',
         '".$factividad."',
         '".$h_inicio."',
         '".$h_termino."',
         '".$rut."'
        )");
        
        if($sql_estado)
        {
            return true;
        }else
        {
            return false;
        }
    }
    public function select_ti()
    {
        $stmt = $this->db->connect()->query('select * from tipo_actividad');
        
        $datos =array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $datos[] = $fila;
        }
        return $datos;
    
    }
}
   /* $prueba = new funciones_actividad;
$a=$prueba->ingresar_actividad('prueba nombre','descripcion prueba','2006-02-20','10%3A00','15%3A00','126717881');
if ($a) {
   echo 'si'
} else {
    echo 'no'
} */
  
?>