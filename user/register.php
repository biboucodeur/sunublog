<?php
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (registerUser($username, $password, $email)) {
        echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        /* Styles de base pour le corps */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Conteneur pour le formulaire */
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Titres */
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Styles pour les messages */
        .success,
        .error {
            text-align: center;
            margin: 10px 0;
        }

        /* Styles pour le formulaire */
        input {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: block;
            width: 95%;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #35424a;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2c3e50;
        }

        /* Lien vers la connexion */
        span {
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        a {
            color: #35424a;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Inscription</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <button type="submit">S'inscrire</button>
        </form>
        <span>Déjà un compte ? <a href="./login.php">Se connecter</a></span>
    </div>

</body>

</html>
