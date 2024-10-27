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
    <style>
        /* Styles de base pour le corps */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Styles pour l'en-tête de l'article */
        header {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin-bottom: 10px;
        }

        header img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin: 15px 0;
        }

        /* Styles pour le contenu de l'article */
        p {
            margin: 10px 0;
        }

        /* Styles pour la section des commentaires */
        main {
            max-width: 800px;
            margin: 20px auto;
        }

        h2 {
            margin-top: 40px;
        }

        /* Formulaire de commentaire */
        .comment-form {
            margin-top: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .comment-form input,
        .comment-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .comment-form button {
            background-color: #35424a;
            color: #ffffff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .comment-form button:hover {
            background-color: #2c3e50;
        }

        /* Liste des commentaires */
        .comments {
            margin-top: 20px;
        }

        .comment {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
            background: #ffffff;
        }

        .comment p {
            margin: 5px 0;
        }
    </style>
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