<?php
require_once '../includes/functions.php';
session_start();
$articles = getAllArticles();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mes Articles</title>
</head>

<body>
    <header>
        <h1>Articles</h1>
        <nav>
            <a href="logout.php">Se déconnecter</a>
            <a href="submit_article.php">Soumettre un article</a>
        </nav>
    </header>
    <main>
        <?php foreach ($articles as $article): ?>
            <article>
                <h3><a href="article_detail.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h3>
                <p><em>Par <?php echo $article['username']; ?> le <?php echo $article['created_at']; ?></em></p>
                <p><?php echo substr($article['content'], 0, 150) . '...'; ?></p>
            </article>
        <?php endforeach; ?>
    </main>
</body>

</html>