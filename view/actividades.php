<?php
try {
    session_start();
    $session = isset($_SESSION['perfil'])?$_SESSION['perfil']:isset($_SESSION['perfil']);
    if($session=='Administrador')
    {
        require_once '../controller/cactividad.php';
        $lista = new cactividad();
        require 'header.php';
        $id         = isset($_REQUEST['id'])?$_REQUEST['id']:isset($_REQUEST['id']);
        $idact         = isset($_REQUEST['idact'])?$_REQUEST['idact']:isset($_REQUEST['idact']);
        if(is_numeric($id))
        {
            $desactivar = $lista->desactivar_perfil($id);
        }
        if(is_numeric($idact))
        {
            $activar = $lista->activar_perfil($idact);
        }
?>
<br>
<div class="container">
<br>
<div class="row">
<div class="col-lg-4">
<table class="table table-striped">   
<tr>
    <th>Ranking Operadores</th>
</tr>
                <tr>
                    <th> Horas Invertidas</th>
                    <th> Total Actividades</th>
                    <th> Nombre Operador</th>
                </tr>
                <?php
                    $usuarios = $lista->mostrar_top();
                    foreach($usuarios as $obj => $o)
                    {
                        ?>
                        <tr>    
                            <td><?php echo $o['horas'] ?></td>
                            <td><?php echo $o['total_actividades'] ?></td>
                            <td><?php echo $o['nombre'] ?></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
</div>
<!-- div y formulario para query dinamica con select de tipo actividad -->
<div class="col-lg-8">
<br>
<form class="login" action="mreporte.php" method="post">
<br>
<h3>Seleccione los campos para Generar Reporte</h3>
<br>
<select name="tipo_actividad">
 <option value="0">Selecione TipoActividad</option>
 <?php
                    $tipoperfil = $lista->mostrar_tipo();
                    foreach($tipoperfil as $obj => $t)
                    {
                        ?>
	 <option value="<?php echo $t['id_tipoactividad']?>"><?php echo $t['nombre']?></option>
	 <?php 
	}
	  ?>
 </select>
 <br>
 <br>
 <select name="Operador">
 <option value="0">Selecione Operador</option>
 <?php
                    $operador = $lista->select_operador();
                    foreach($operador as $obj => $ope)
                    {
                        ?>
	 <option value="<?php echo $ope['rut']?>"><?php echo $ope['nombre'].' '.$ope['apellido']?></option>
	 <?php 
	}
	  ?>
 </select>
 <br>
 <br>
 <button type="submit" class="btn btn-primary btn-sm">Crear Reporte</button>
                        </form>
                        <br>
</div>
</div>
<br>
<div class="row">
<br>
<div class="col-lg-6 mx-auto">
<table class="table table-striped">   
<tr>
    <th>Tipos De Actividades</th>
</tr>
                <tr>
                <th>Opciones</th>
                    <th> Nombre</th>
                    <th> Estado</th>
                </tr>
                <?php
                    $mtipo = $lista->mostrar_tipo();
                    foreach($mtipo as $obj => $tp)
                    {
                        ?>
                        <tr>
                        <form action="modificar.php"  method="post">
                        <input type="hidden" name="exnombre" value="<?php echo $tp['nombre']?>"> 
                                <td><button type="submit" name="idmod" value="<?php echo $tp['id_tipoactividad']?>" class="btn btn-warning"><span class="fa fa-pencil"></span></button>
                                </form>
                        <?php
                            if ($tp['estado']==1) {
                                ?>
                                <form action="actividades.php"  method="post">
                                <button type="submit" name="id" value="<?php echo $tp['id_tipoactividad']?>" class="btn btn-danger"><span class="fa fa-remove"></span></button></td>
                                </form>
                            
                            <?php
                            } else {
                                ?>
                                <form action="actividades.php"  method="post">
                                <button type="submit" name="idact" value="<?php echo $tp['id_tipoactividad']?>" class="btn btn-success"><span class="fa fa-check"></span></button></td>
                                </form>
                            <?php
                            }
                            ?>
                            <td><?php echo $tp['nombre'] ?></td>
                            <?php
                            if ($tp['estado']==1) {
                                echo '<td><button type="button" class="btn btn-success"> </button></td>';
                            } else {
                                echo '<td><button type="button" class="btn btn-danger"> </button></td>';
                            }
                            ?>
                        </tr>
                        <?php
                    }
                ?>
            </table>
</div>
</div>

</div>
<?php
require 'footer.php';
    }
    else
    {
        echo "<meta http-equiv='refresh' content='0;url=../view/index.php'>";
    }
}
catch (Exception $e) {
	
	echo "<meta http-equiv='refresh' content='0;url=../view/index.php'>";
}
?>