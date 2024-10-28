<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Code pour afficher les articles en attente d'approbation
require_once '../includes/functions.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Tableau de bord Administrateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        nav {
            background: #333;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        nav a:hover {
            background: #4CAF50;
        }

        h2 {
            color: #555;
            margin-top: 20px;
        }

        /* Style pour la liste des articles */
        .article-list {
            margin-top: 20px;
            padding: 10px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .article-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .article-item:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body>
    <h1>Tableau de bord Administrateur</h1>
    <nav>
        <a href="logout.php">Se déconnecter</a>
        <a href="approve_article.php">Approuver des articles</a>
        <a href="create_article.php">Créer un article</a>
        <a href="create_user.php">Créer un utilisateur</a> <!-- Lien vers create_user.php -->
    </nav>

    <h2>Articles en attente d'approbation</h2>
    <!-- Liste des articles à approuver -->
</body>

</html>