<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Debes loguearte primero";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Votos</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <div class="header">
        <h2>Página de votación</h2>
    </div>
    <div class="content">

        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>


        <?php if (isset($_SESSION['username'])) : ?>
            <p>Bienvenido <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p> <a href="index.php?logout='1'" style="color: red;">Cerrar sesión</a> </p>
            <?php

            $conexion = mysqli_connect('localhost', 'root', '', 'ejercicio2');

            ?>
            <!DOCTYPE html>
            <html>

            <head>
                <title>Fotos publicadas</title>
            </head>

            <body>

                <br>

                <table border="1">
                    <tr>
                        <td>Imagen</td>
                        <td>Nombre de imagen</td>
                        <td>Descripción</td>
                        <td>Usuario</td>
                        <td>ID</td>
                    </tr>

                    <?php
                    $sql = "SELECT * from fotos";
                    $result = mysqli_query($conexion, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>

                        <tr>
                            <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($mostrar['image']).'"/>' ?></td>  
                            <td><?php echo $mostrar['nombreImagen'] ?></td>
                            <td><?php echo $mostrar['descripcion'] ?></td>
                            <td><?php echo $mostrar['usuario'] ?></td>
                            <td><?php echo $mostrar['id'] ?></td>
                        </tr>
                    <?php
                    }
                    //En 30 segundos que te redireccione a la votación
                    header( "refresh:30;url=votes.php" );

                    
                    ?>
                </table>

            </body>

            </html>
        <?php endif ?>
    </div>

</body>

</html>