<?php
require_once '../includes/functions.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id'];

    if (createArticle($title, $image, $content, $author_id)) {
        echo "Article soumis avec succès !";
    } else {
        echo "Erreur lors de la soumission de l'article.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Soumettre un article</title>
</head>

<body>
    <h2>Soumettre un nouvel article</h2>
    <form method="POST" action="">
        <input type="text" name="title" placeholder="Titre de l'article" required>
        <input type="text" name="image" placeholder="URL de l'image" required>
        <textarea name="content" placeholder="Contenu" required></textarea>
        <button type="submit">Soumettre l'article</button>
    </form>
</body>

</html>