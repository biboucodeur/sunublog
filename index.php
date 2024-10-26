<?php
require_once 'includes/functions.php';
$articles = getAllArticles();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Blog Platform</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <h1>Bienvenue sur notre Blog</h1>
        <nav>
            <a href="user/login.php">Connexion</a>
            <a href="user/register.php">Inscription</a>
        </nav>
    </header>
    <main>
        <h2>Articles récents</h2>
        <?php foreach ($articles as $article): ?>
            <article>
                <h3><a href="user/article_detail.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h3>
                <p><em>Par <?php echo $article['username']; ?> le <?php echo $article['created_at']; ?></em></p>
                <img src="<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>">
                <p><?php echo substr($article['content'], 0, 150) . '...'; ?></p>
            </article>
        <?php endforeach; ?>
    </main>
</body>

</html>