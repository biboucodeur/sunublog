<?php
require_once '../includes/functions.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    deleteArticle($_GET['id']); // Implémentez cette fonction pour supprimer l'article
    header("Location: approve_article.php"); // Redirection après suppression
    exit();
} else {
    header("Location: approve_article.php");
    exit();
}
