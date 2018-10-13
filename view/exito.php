<?php
try {
    session_start();
    $session = isset($_SESSION['perfil'])?$_SESSION['perfil']:isset($_SESSION['perfil']);
    if($session=='Operador')
    {
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
        <br><br>
<h1>Exito</h1>
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