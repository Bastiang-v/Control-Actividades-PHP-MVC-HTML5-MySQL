
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo.png">

    <title>Control de Actividades</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="../controller/acceso.php" method="post">
      <img class="mb-4" src="img/logo.png" alt="" width="150" height="150">
      <h1 class="h3 mb-3 font-weight-normal">Control De Actividades</h1>
      <h2 class="h3 mb-3 font-weight-normal">Ingresa a tu Cuenta</h2>
      <input type="text" id="inputEmail" class="form-control" name="rut" placeholder="Rut" required autofocus>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Contraseña" required>
      <input type="hidden" name="opcion" value="login"> 
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019 Bastian Gonzalez</p>
    </form>
  </body>
</html>
