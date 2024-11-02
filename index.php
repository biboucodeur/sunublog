<?php
require_once 'includes/functions.php';
$articles = getAllArticles();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Blog Platform</title>
    <style>
        /* Styles de base pour le corps */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
        }

        /* Styles de l'en-tête */
        header {
            background: #35424a;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin-bottom: 10px;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 15px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* Styles du contenu principal */
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        /* Styles pour chaque article */
        article {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
        }

        article h3 {
            margin-bottom: 10px;

        }

        article img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }

        article p {
            margin: 10px 0;
        }
    </style>
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