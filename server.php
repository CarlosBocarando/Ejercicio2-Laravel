<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'ejercicio2');


if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['nombreUsuario']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['contrasena1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['contrasena2']);

 
  if (empty($username)) { array_push($errors, "Usuario es requerido"); }
  if (empty($email)) { array_push($errors, "Email es requerido"); }
  if (empty($password_1)) { array_push($errors, "Contraseña es requerida"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Las dos contraseñas no coinciden");
  }

  $user_check_query = "SELECT * FROM Usuarios WHERE nombreUsuario='$username' OR correoElectronico='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['nombreUsuario'] === $username) {
      array_push($errors, "Usuario ya existe");
    }

    if ($user['correoElectronico'] === $email) {
      array_push($errors, "Email ya existe");
    }
  }


  if (count($errors) == 0) {
  	$password = md5($password_1); //encrypt the password before saving in the database

  	$query = "INSERT INTO usuarios (nombreUsuario, correoElectronico, contrasena) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Estás registrado con éxito";
  	header('location: index.php');
  }
}

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['nombreUsuario']);
    $password = mysqli_real_escape_string($db, $_POST['contrasena']);
  
    if (empty($username)) {
        array_push($errors, "Usuario es requerido");
    }
    if (empty($password)) {
        array_push($errors, "Contraseña es requerida");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM usuarios WHERE nombreUsuario='$username' AND contrasena='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "Estás logueado con éxito";
          header('location: index.php');
        }else {
            array_push($errors, "Usuario o contraseña incorrectos");
        }
    }
  }
  
  ?>