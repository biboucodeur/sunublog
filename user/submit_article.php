<?php
require_once '../includes/functions.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $image = trim($_POST['image']);
    $content = trim($_POST['content']);
    $author_id = $_SESSION['user_id'];

    if (createArticle($title, $image, $content, $author_id)) {
        $message = "Article soumis avec succès !";
    } else {
        $message = "Erreur lors de la soumission de l'article.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumettre un article</title>
    <style>
        /* styles.css */

        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        header {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        main {
            background: white;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        textarea {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin-bottom: 15px;
            color: #d9534f;
            /* Red color for error messages */
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            header {
                font-size: 1.5em;
            }

            input[type="text"],
            textarea {
                font-size: 0.9em;
            }

            button {
                font-size: 0.9em;
            }
        }
    </style><!-- Assuming you have a CSS file for styling -->
</head>

<body>
    <header>
        <h1>Soumettre un nouvel article</h1>
    </header>

    <main>
        <?php if ($message): ?>
            <p><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="title" placeholder="Titre de l'article" required>
            <input type="text" name="image" placeholder="URL de l'image" required>
            <textarea name="content" placeholder="Contenu" required></textarea>
            <button type="submit">Soumettre l'article</button>
        </form>
    </main>
</body>

</html>