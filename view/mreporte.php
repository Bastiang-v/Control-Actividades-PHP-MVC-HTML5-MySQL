 <?php
try {
    session_start();
    $session = isset($_SESSION['perfil'])?$_SESSION['perfil']:isset($_SESSION['perfil']);
    if($session=='Administrador')
    {
        require_once '../controller/cactividad.php';
        $lista = new cactividad(); 
        $tipo_actividad   = trim($_REQUEST['tipo_actividad']);
        $Operador   = trim($_REQUEST['Operador']);
        $nuevo = $lista->rut($Operador);
        require 'header.php';
            $ver_reporte = new cactividad();
            $mostrar = $ver_reporte->mostrar_actividad($tipo_actividad,$Operador);
            if ($mostrar) {
                ?>
<br>
 <div class="row">
<div class="col-8 mx-auto text-center">
<br>
<h1>Reporte Generado con exito</h1>
<br>
<button type="buttom" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#miventana" name="opcion" value="ver_reporte">Ver Reporte <span class="fa fa-list-alt"></span></button><br>
<p></p><a href="actividades.php" class="btn btn-danger btn-lg">Volver</a>
<div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md">
<div class="modal-content">
 <h1>Reporte</h1>
 <table class="table table-striped">   
<tr> 
<p>Rut Operador: <?php echo $nuevo ?></p>
</tr>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Horas</th>
                </tr>
                <?php
                 $sumado = 0;
                    foreach($mostrar as $obj => $o)
                    {
                        $ntipo=$o['tipo'];
                        $nombreoperador=$o['noperador'];
                        ?>
                        <tr>    
                            <td><?php echo $o['nombre']?></td>
                            <td><?php echo $o['descripcion']?></td>
                            <td><?php echo $o['fecha_actividad']?></td>
                            <td><?php echo $o['total_hora']?></td>
                        </tr>
                        <?php
                        $sumado += (int) $o['total_hora'];
                    }
                    echo '<p> Nombre : '.$nombreoperador.'</p>';
                    echo '<p class=""> Tipo : '.$ntipo.'<br> Total Horas : '.$sumado.'</p>'
                ?>
            </table>
</div>

</div>
</div> 
</div>
</div>
<?php
            } else {
                ?>
                <div class="row">
<div class="col-8 mx-auto text-center">
<br>
<h1>Error Actividad Seleccionada no compatible con el operador</h1><br>
<p>Esta Siendo Redireccionado</p>
<meta http-equiv="Refresh" content="2;url=actividades.php">
</div>
</div>
<?php
}
require 'footer.php';
    }
    else
    {
        echo "a";
    }
}
catch (Exception $e) {
	
	echo "<meta http-equiv='refresh' content='0;url=../view/index.php'>";
}
?>