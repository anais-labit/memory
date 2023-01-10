<?php
session_start();
require_once './includes/header.php';
require_once './includes/User.php';

// $_POST['password'] = "";
// $_POST['password2'] = "";

if ((isset($_POST['submit'])) && (($_POST['password']) === $_POST['password2'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $score = 0;
    $newUser = new User();
    if ($newUser->register($login, $password, $score)) {
        echo "Votre compte a été créé avec succès";
    } else {
        echo "Ce login est déjà pris";
    }
} else {
    echo "Les mots de passe ne correspondent pas";
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>

    <form action="inscription.php" method="post">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="password2" placeholder="Confirmation de mot de passe">
        <input type="submit" name="submit" value="Créer mon compte">
    </form>

</body>

</html>