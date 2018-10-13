<?php
try {
    session_start();
    $session = isset($_SESSION['perfil'])?$_SESSION['perfil']:isset($_SESSION['perfil']);
    if($session=='Administrador')
    {
        require_once '../controller/cactividad.php';
        $lista = new cactividad(); 
        $idmod   = trim($_REQUEST['idmod']);
        $exnombre   = trim($_REQUEST['exnombre']);
        require 'header.php';
                ?>
                <head><link href="css/login.css" rel="stylesheet"></head>
<form class="form-signin" action="../controller/acceso.php" method="post">
<br>
      <img class="mb-4" src="img/logo.png" alt="" width="150" height="150">
      <h3 class="h3 mb-3 font-weight-normal">Tipo Actividad : <?php echo $exnombre ?> </h3>
      <input type="text" id="inputEmail" class="form-control" name="nombre" placeholder="Nuevo Nombre" required autofocus>
      <input type="hidden" name="opcion" value="modificar"> 
      <input type="hidden" name="idt" value="<?php echo $idmod ?>"> 
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Modificar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019 Bastian Gonzalez</p>
    </form>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="js/bootstrap.min.js"></script>
    <!-- popper -->
    <script src="js/popper.min.js"></script>
    <?php
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