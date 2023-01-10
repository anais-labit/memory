<?php
session_start();
require_once './includes/header.php';
require_once './includes/User.php';

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $connUser = new User;
    if ($connUser->compare($login, $password)) {
        echo "Connexion réussie";
        header('Refresh:3; url=scores.php');
    } else {
        echo "Ce login n'existe pas";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>

    <form action="connexion.php" method="post">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" name="submit" value="Connexion">
    </form>

</body>

</html>