<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id']; // L'admin peut être considéré comme auteur

    if (createArticle($title, $image, $content, $author_id)) {
        echo "Article créé avec succès !";
    } else {
        echo "Erreur lors de la création de l'article.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Créer un article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #4CAF50;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Créer un nouvel article</h2>
        <form method="POST" action="">
            <input type="text" name="title" placeholder="Titre de l'article" required>
            <input type="text" name="image" placeholder="URL de l'image" required>
            <textarea name="content" placeholder="Contenu" required></textarea>
            <button type="submit">Créer l'article</button>
        </form>
        <br>
        <a href="./dashboard.php"> <button>Tableau de bord</button></a>
    </div>
</body>

</html>