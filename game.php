<?php
require_once './includes/Card.php';
require_once './includes/header.php';

$_SESSION['gameOn'] = (isset($_SESSION['gameOn'])) ? $_SESSION['gameOn'] : [];
var_dump($_POST);

if (isset($_POST['newGame'])) {
    $gameOn = new Card();
    $_SESSION['gameOn'] = $gameOn->shuffle();
    var_dump($_SESSION['gameOn']);
}

if (isset($_GET['id'])) {
    var_dump($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jouer</title>
</head>

<body>

    <form action="game.php" method="post">
        <input type="submit" name="newGame" value="Lancer une partie">
    </form>
    <table>
        <?php


        if (isset($_SESSION['gameOn'])) {
            $board = new Card();
            $board->displayBoard();
            // var_dump($_SESSION)

        }

        ?>

    </table>
</body>

</html>