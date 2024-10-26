<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once '../includes/functions.php'; // Assurez-vous de ne pas redéclarer la fonction

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mettre à jour l'article pour l'approuver
    if (approveArticle($id)) {
        header("Location: approve_article.php"); // Redirection après approbation
        exit();
    } else {
        echo "Erreur lors de l'approbation de l'article.";
    }
}
