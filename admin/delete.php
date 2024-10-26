<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once '../includes/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer l'article
    if (deleteArticle($id)) {
        header("Location: approve_article.php"); // Redirection après suppression
        exit();
    } else {
        echo "Erreur lors de la suppression de l'article.";
    }
}
