<?php
try {
    session_start();
    $session = isset($_SESSION['perfil'])?$_SESSION['perfil']:isset($_SESSION['perfil']);
    if($session=='Operador')
    {
        require_once '../controller/cactividad.php';
        $lista = new cactividad(); 
        $rut   = $_SESSION['rut'];
                ?>
                <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="icon" href="img/logo.png">

    <title>Control de Actividades</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <!--   referencia prueba iconos -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <div class="row">
  <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <img class="text-center" src="img/logo.png" alt="" width="30" height="30"><a class="navbar-brand" href="#">BGWeb</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="ingresar.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="index.php">Salir</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <br>
  </div>
                <head><link href="css/login.css" rel="stylesheet"></head>
<form class="form-signin" action="../controller/acceso.php" method="get">
<br>
      <img class="mb-4" src="img/logo.png" alt="" width="150" height="150">
      <h3 class="h3 mb-3 font-weight-normal">Bienvenido  <?php echo $session ?><br>Rut <?php echo $rut ?> </h3>
      <h3 class="h4 mb-3 font-weight-normal">Ingrese Actividad</h3>
      <input type="text" id="inputEmail" class="form-control" name="nactividad" placeholder="Nombre" required autofocus>
      <input type="text" id="inputEmail" class="form-control" name="dactividad" placeholder="Descripcion"><br>
      <select name="id_tipo">
 <option value="0">Tipo Actividad</option>
 <?php
                    $tipoperfil = $lista->select_tipo();
                    foreach($tipoperfil as $obj => $t)
                    {
                        ?>
	 <option value="<?php echo $t['id_tipoactividad']?>"><?php echo $t['nombre']?></option>
	 <?php 
	}
	  ?>
 </select><br>
 <br>
      <label for="factividad">Fecha Actividad</label>
      <input type="date" id="factividad" class="form-control" name="factividad" required autofocus>
      <label for="h_inicio">Hora Inicio</label>
      <input type="time" id="inputEmail" class="form-control" name="h_inicio"  required autofocus>
      <label for="h_termino">Hora Termino</label>
      <input type="time" id="inputEmail" class="form-control" name="h_termino"  required autofocus>
      <input type="hidden" name="opcion" value="ingresar"> 
      <input type="hidden" name="rut" value="<?php echo $rut ?>"> 
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Confirmar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019 Bastian Gonzalez</p>
    </form>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="js/bootstrap.min.js"></script>
    <!-- popper -->
    <script src="js/popper.min.js"></script>
    </body>
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