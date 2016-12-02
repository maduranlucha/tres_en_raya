<?php
session_name('juego');
session_start();

if ($_SESSION['PJ1']['ganador'] == true && $_SESSION['PJ2']['ganador'] == false) {
    $ganador = "Gano el Jugador 1";
} elseif ($_SESSION['PJ1']['ganador'] == false && $_SESSION['PJ2']['ganador'] == true) {
    $ganador = "Gano el jugador 2";
} elseif ($_SESSION['PJ1']['ganador'] == false && $_SESSION['PJ2']['ganador'] == false) {
    $ganador = "Empate";
}

session_destroy();
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="STYLESHEET" type="text/css" href="Css.css">
        <title><?php echo $ganador; ?></title>
    </head>
    <body>
        <h1>
            <?php
                echo $ganador;
            ?>
        </h1>
        <a href="index.php">
            <input class="btn" type="button" value="Volver">
        </a>
    </body>
</html>
