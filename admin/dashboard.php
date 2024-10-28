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
