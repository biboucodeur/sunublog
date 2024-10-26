<?php
// config/config.php

$host = 'localhost';
$dbname = 'blog_bd';
$username = 'root'; // Remplacer par votre identifiant MySQL
$password = ''; // Remplacer par votre mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
