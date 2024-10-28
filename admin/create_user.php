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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #4CAF50;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 96%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            margin: 10px 0;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
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
        <br>
        <a href="./dashboard.php"> <button>Tableau de bord</button></a>

    </div>

</body>

</html>