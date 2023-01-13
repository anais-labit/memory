<?php
require_once './includes/header.php';

if (isset($_POST['play'])) {
    header('Location: game.php');
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <title>Memory</title>
</head>

<body>

    <h3>Bienvenue sur le jeu du memory</h3>

    <?php
    if (isset($_SESSION['login'])) { ?>

        <form action="index.php" method="post">
            <input type="submit" name="play" value="Lancer une partie">
        </form>
    <?php
    }

    ?>


</body>

</html>