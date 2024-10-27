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
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background: #35424a;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            padding: 20px;
        }

        article {
            background: #ffffff;
            border-radius: 5px;
            margin: 20px 0;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h3 {
            margin-top: 0;
        }

        footer {
            text-align: center;
            padding: 15px 0;
            background: #35424a;
            color: #ffffff;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
        }
    </style>
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