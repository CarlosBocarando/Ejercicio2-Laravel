<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Inicio de sesión</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Iniciar sesión</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Usuario</label>
  		<input type="text" name="nombreUsuario" >
  	</div>
  	<div class="input-group">
  		<label>Contraseña</label>
  		<input type="password" name="contrasena">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Iniciar sesión</button>
  	</div>
  	<p>
  		¿No te encuentras registrado? <a href="register.php">Registrarse</a>
  	</p>
  </form>
</body>
</html>