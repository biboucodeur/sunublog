<?php
require_once '../includes/functions.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: approve_article.php");
    exit();
}

$article = getArticleById($_GET['id']); // Implémentez cette fonction pour récupérer l'article par ID

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $content = $_POST['content'];

    if (updateArticle($article['id'], $title, $image, $content)) { // Implémentez updateArticle
        echo "Article modifié avec succès !";
        header("Location: approve_article.php"); // Redirection après succès
        exit();
    } else {
        echo "Erreur lors de la modification de l'article.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier l'article</title>
</head>

<body>
    <h2>Modifier l'article : <?php echo $article['title']; ?></h2>
    <form method="POST" action="">
        <input type="text" name="title" value="<?php echo $article['title']; ?>" required>
        <input type="text" name="image" value="<?php echo $article['image']; ?>" required>
        <textarea name="content" required><?php echo $article['content']; ?></textarea>
        <button type="submit">Modifier l'article</button>
    </form>
</body>

</html>