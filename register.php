<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registro/Inicio de sesión</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Registro de usuario</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Usuario</label>
  	  <input type="text" name="nombreUsuario" value="">
  	</div>
  	<div class="input-group">
  	  <label>Correo Electrónico</label>
  	  <input type="email" name="email" value="">
  	</div>
  	<div class="input-group">
  	  <label>Contraseña</label>
  	  <input type="password" name="contrasena1">
  	</div>
  	<div class="input-group">
  	  <label>Confirmar contraseña</label>
  	  <input type="password" name="contrasena2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Registrar</button>
  	</div>
  	<p>
  		¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>
  	</p>
  </form>
</body>
</html>