<?php
require_once './includes/Card.php';
require_once './includes/header.php';

$_SESSION['gameOn'] = (isset($_SESSION['gameOn'])) ? $_SESSION['gameOn'] : [];

if (isset($_POST['submit'])) {
    $gameOn = new Card();
    $_SESSION['gameOn'] = $gameOn->shuffle();
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
        <input type="submit" name="submit" value="Lancer une partie">
    </form>

    <table>
        <?php
        foreach ($_SESSION['gameOn'] as $card) {
            echo "<a href=\"game.php?id=$card\"><button><img src='./img/$card.png'></button></a>";
            // echo $card;
        }
        ?>
    </table>


</body>

</html>