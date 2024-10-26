<?php
require_once '../includes/functions.php';
session_start();

if (!isset($_GET['id'])) {
    header("Location: view_articles.php");
    exit();
}

$article = getArticleById($_GET['id']);
if (!$article) {
    echo "Article non trouvé.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?php echo $article['title']; ?></title>
</head>

<body>
    <header>
        <h1><?php echo $article['title']; ?></h1>
        <p><em>Par <?php echo $article['username']; ?> le <?php echo $article['created_at']; ?></em></p>
        <img src="<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>">
        <p><?php echo $article['content']; ?></p>
    </header>
    <main>
        <h2>Commentaires</h2>
        <!-- Ajoutez ici une section pour afficher les commentaires -->
    </main>
</body>

</html>