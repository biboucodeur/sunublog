<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
require_once '../includes/functions.php';
// Récupérer les articles non approuvés
$articles = getPendingArticles(); // Créez cette fonction pour récupérer les articles non approuvés
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Approuver les articles</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            padding: 5px 10px;
            border: 1px solid #4CAF50;
            border-radius: 4px;
            transition: background 0.3s, color 0.3s;
        }

        a:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Approuver les articles</h1>
    <table>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Action</th>
        </tr>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?php echo $article['title']; ?></td>
                <td><?php echo $article['username']; ?></td>
                <td>
                    <a href="approve.php?id=<?php echo $article['id']; ?>">Approuver</a>
                    <a href="delete.php?id=<?php echo $article['id']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table><br>
    <a href="./dashboard.php">Tableau de bord</a>
</body>

</html>