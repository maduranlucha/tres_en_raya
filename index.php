<?php
    session_name('juego');  //Ponemos el nombre de la sesion
    session_start(); //Iniciamos el juego

    // Al presional reiniciar destruimos la sesion
    if (isset($_GET['reiniciar'])) {
        session_destroy();
        header('Location: index.php', true, 302);
    }

    // Creamos las variables si no exisren e inicializamos la posicion de los jugadores tambien ponemos los ganadores en false.
    if (isset($_SESSION['PJ1']['turno']) == false &&
        isset($_SESSION['PJ2']['turno']) == false){
        $_SESSION['PJ1']['turno'] = true; //true para que comienze el jugador 1
        $_SESSION['PJ1']['ganador'] = false;
        $_SESSION['PJ2']['turno'] = false; //true para que comienze el jugador 2
        $_SESSION['PJ2']['ganador'] = false;
    }


    //Si la variable de sesion posiciones no existe la creamos.

    if (isset($_SESSION['posiciones']) == false) {
        $_SESSION['posiciones'] = array (
            0 => 'ø',
            1 => 'ø',
            2 => 'ø',
            3 => 'ø',
            4 => 'ø',
            5 => 'ø',
            6 => 'ø',
            7 => 'ø',
            8 => 'ø'
        );
    }

    for ($i=0; $i<=8; $i++) {
        if (isset($_GET[$i])) {
            if ($_SESSION['PJ1']['turno'] == true) {
                $_SESSION['posiciones'][$i] = 'X';
                $_SESSION['PJ1']['turno'] = false;
                $_SESSION['PJ2']['turno'] = true;
            } elseif ($_SESSION['PJ2']['turno'] == true) {
                $_SESSION['posiciones'][$i] = 'O';
                $_SESSION['PJ1']['turno'] = true;
                $_SESSION['PJ2']['turno'] = false;
            }
        }
    }

    /*Esta parte nos sirve para comprobar si hay algun ganador comprobando si las verticales, horizontales y diagonales
    tienen un mismo valor, en ese caso gana el jugador correspondiente al valor.*/

    //HORIZONTAL 1 PARA LA X
    if ($_SESSION['posiciones'][0] === 'X' &&
        $_SESSION['posiciones'][1] === 'X' &&
        $_SESSION['posiciones'][2] === 'X') {
        $_SESSION['PJ1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //HORIZONTAL 1 PARA LA O
    } elseif ($_SESSION['posiciones'][0] === 'O' &&
        $_SESSION['posiciones'][1] === 'O' &&
        $_SESSION['posiciones'][2] === 'O') {
        $_SESSION['PJ2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //HORIZONTAL 2 PARA LA X
    } elseif ($_SESSION['posiciones'][3] === 'X' &&
        $_SESSION['posiciones'][4] === 'X' &&
        $_SESSION['posiciones'][5] === 'X') {
        $_SESSION['PJ2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //HORIZONTAL 2 PARA LA O
    } elseif ($_SESSION['posiciones'][3] === 'O' &&
        $_SESSION['posiciones'][4] === 'O' &&
        $_SESSION['posiciones'][5] === 'O') {
        $_SESSION['PJ2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //HORIZONTAL 3 PARA LA X
    } elseif ($_SESSION['posiciones'][6] === 'X' &&
        $_SESSION['posiciones'][7] === 'X' &&
        $_SESSION['posiciones'][8] === 'X') {
        $_SESSION['PJ1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //HORIZONTAL 3 PARA LA O
    } elseif ($_SESSION['posiciones'][6] === 'O' &&
        $_SESSION['posiciones'][7] === 'O' &&
        $_SESSION['posiciones'][8] === 'O') {
        $_SESSION['PJ2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //VERTICAL 1 PARA LA X
    } elseif ($_SESSION['posiciones'][0] === 'X' &&
        $_SESSION['posiciones'][3] === 'X' &&
        $_SESSION['posiciones'][6] === 'X') {
        $_SESSION['PJ1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //VERTICAL 1 PARA LA O
    } elseif ($_SESSION['posiciones'][0] === 'O' &&
        $_SESSION['posiciones'][3] === 'O' &&
        $_SESSION['posiciones'][6] === 'O') {
        $_SESSION['PJ2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //VERTICAL 2 PARA LA X
    } elseif ($_SESSION['posiciones'][1] === 'X' &&
        $_SESSION['posiciones'][4] === 'X' &&
        $_SESSION['posiciones'][7] === 'X') {
        $_SESSION['PJ1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //VERTICAL 2 PARA LA O
    } elseif ($_SESSION['posiciones'][1] === 'O' &&
        $_SESSION['posiciones'][4] === 'O' &&
        $_SESSION['posiciones'][7] === 'O') {
        $_SESSION['PJ2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //VERTICAL 3 PARA LA X
    } elseif ($_SESSION['posiciones'][2] === 'X' &&
        $_SESSION['posiciones'][5] === 'X' &&
        $_SESSION['posiciones'][8] === 'X') {
        $_SESSION['PJ2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //VERTICAL 3 PARA LA O
    } elseif ($_SESSION['posiciones'][2] === 'O' &&
        $_SESSION['posiciones'][5] === 'O' &&
        $_SESSION['posiciones'][8] === 'O') {
        $_SESSION['PJ2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //DIAGONAL 1 PARA LA X
    } elseif ($_SESSION['posiciones'][0] === 'X' &&
        $_SESSION['posiciones'][4] === 'X' &&
        $_SESSION['posiciones'][8] === 'X') {
        $_SESSION['PJ1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //DIAGONAL 1 PARA LA O
    } elseif ($_SESSION['posiciones'][0] === 'O' &&
        $_SESSION['posiciones'][4] === 'O' &&
        $_SESSION['posiciones'][8] === 'O') {
        $_SESSION['PJ2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //DIAGONAL 2 PARA LA X
    } elseif ($_SESSION['posiciones'][2] === 'X' &&
        $_SESSION['posiciones'][4] === 'X' &&
        $_SESSION['posiciones'][6] === 'X') {
        $_SESSION['PJ1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    //DIAGONAL 2 PARA LA O
    } elseif ($_SESSION['posiciones'][2] === 'O' &&
        $_SESSION['posiciones'][4] === 'O' &&
        $_SESSION['posiciones'][6] === 'O') {
        $_SESSION['PJ2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    // Si al rellenar todas las casillas no hay ninguna combinacion ganadora se producira un empate y finalizara el juego.
    } else {
        $completo = true;
        //En este for comprobamos si hay alguna posicion sin marcar con X u O
        for ($i=0; $i<9; $i++) {
            if ($_SESSION['posiciones'][$i] === 'ø') {
                $completo = false;
            }
        }
        if ($completo)
            header('Location: ganador.php', true, 302);
    }
?>



<!doctype html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="STYLESHEET" type="text/css" href="Css.css">
    <title>Bienvenido al Juego de 3 en Raya</title>
</head>

<body>
    <h1>Bienvenido al Juego de 3 en Raya</h1>

    <?php
    // Comprobamos que jugador tiene el turno y aplicamos el titulo correspondiente
    if ($_SESSION['PJ1']['turno'] == true)
        echo '<h1 class="pj1">Jugador 1:</h1>';
    else
        echo '<h1 class="pj2">Jugador 2: </h1>';
    ?>
    <div id="casillas">
        <form method="get" action="index.php">
            <?php
            $j = 0;
            for ($i=0; $i<=8; $i++) {
                if (isset($_SESSION['posiciones']) && $_SESSION['posiciones'][$i] === 'ø') {
                    echo '<input class="casilla" name="'.$i.'" type="submit" value="*">';
                } elseif ($_SESSION['posiciones'][$i] === 'X') {
                    echo '<input class="casilla azul" disabled="true" name="'.$i.'" type="submit" value="'.$_SESSION['posiciones'][$i].'">';
                } elseif ($_SESSION['posiciones'][$i] === 'O') {
                    echo '<input class="casilla rojo" disabled="true" name="'.$i.'" type="submit" value="'.$_SESSION['posiciones'][$i].'">';
                }

                $j++;
                if ($j == 3) {
                    echo '<br>';
                    $j = 0;
                }
            }
            ?>
            <br>
            <input class="btn" name="reiniciar" type="submit" value="Reiniciar_partida">
        </form>
    </div>
</body>
</html>