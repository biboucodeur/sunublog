<?php
require_once '../includes/functions.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role']; // Peut être 'user' ou 'admin'

    if (registerUser($username, $password, $email, $role)) {
        echo "Utilisateur créé avec succès !";
    } else {
        echo "Erreur lors de la création de l'utilisateur.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Créer un utilisateur</title>
</head>

<body>
    <h2>Créer un nouvel utilisateur</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <select name="role" required>
            <option value="user">Utilisateur</option>
            <option value="admin">Administrateur</option>
        </select>
        <button type="submit">Créer l'utilisateur</button>
    </form>
</body>

</html>