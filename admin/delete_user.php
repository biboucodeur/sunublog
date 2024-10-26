<?php
require_once '../includes/functions.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    deleteUser($_GET['id']); // Implémentez cette fonction pour supprimer l'utilisateur
    header("Location: manage_users.php");
    exit();
} else {
    header("Location: manage_users.php");
    exit();
}
