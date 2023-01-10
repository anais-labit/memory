<?php
session_start();
require_once 'User.php';

$logout = new User();
$logout->disconnect();

header('Location: ../connexion.php');
