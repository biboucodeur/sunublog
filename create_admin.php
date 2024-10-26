<?php
require_once 'includes/db_connection.php'; // Assurez-vous que ce fichier contient votre connexion à la base de données
require_once 'includes/functions.php'; // Inclure vos fonctions

// Informations de l'admin
$username = 'admin'; // Nom d'utilisateur
$password = 'admin123'; // Mot de passe (à changer pour quelque chose de sécurisé)
$email = 'admin@example.com'; // Adresse e-mail
$role = 'admin'; // Rôle

// Enregistrer l'utilisateur administrateur
if (registerUser($username, $password, $email, $role)) {
    echo "Administrateur créé avec succès.";
} else {
    echo "Erreur lors de la création de l'administrateur.";
}
