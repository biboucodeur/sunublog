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
    </table>
</body>

</html>