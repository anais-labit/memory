<?php

$DB_DSN = 'mysql:host=localhost; dbname=memory';
$username = 'root';
$password_db = '';

$conn = new PDO($DB_DSN, $username, $password_db);

class User
{
    // déclaration des propriétés
    private $_id;
    public $login;

    // déclaration des méthodes/attributs
    public function __construct()
    {
    }

    public function compare($login)
    {
        global $conn;
        $req = "SELECT COUNT(*) FROM utilisateurs WHERE login='$login';";
        $catchUsers = $conn->query($req);
        $count = $catchUsers->fetchColumn();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function register($login, $password)
    {
        if (!$this->compare($login)) {
            global $conn;
            $req = "INSERT INTO utilisateurs (login, password) VALUES (:login, :password)";
            $newUser = $conn->prepare($req);
            $newUser->bindParam(':login', $login);
            $newUser->bindParam(':password', $password);
            $newUser->execute();
            return TRUE;
        } else {

            return FALSE;
        }
    }

    public function connect($login, $password)
    {
        global $conn;
        $req = "SELECT * FROM utilisateurs WHERE login = :login";
        $connUser = $conn->prepare($req);
        $connUser->bindParam(":login", $login);
        $connUser->execute();
        $results = $connUser->fetch(PDO::FETCH_ASSOC);
        if ($results !== false) {
            $hashedPassword = $results["password"];
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['login'] = $login;
                header("location: game.php");
            }
        }
    }

    public function disconnect()
    {
        global $conn;
        unset($_SESSION['login']);
        session_destroy();
        header('Location:../connexion.php');
    }
}
