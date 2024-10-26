<?php
require_once 'db_connection.php';

function registerUser($username, $password, $email, $role = 'user')
{
    global $pdo;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);

    return $stmt->execute();
}

function login($username, $password)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}

function createArticle($title, $image, $content, $author_id)
{
    global $pdo;

    $sql = "INSERT INTO articles (title, image, content, author_id) VALUES (:title, :image, :content, :author_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':author_id', $author_id);

    return $stmt->execute();
}

function getAllArticles()
{
    global $pdo;

    $sql = "SELECT a.*, u.username FROM articles a JOIN users u ON a.author_id = u.id WHERE a.approved = 1 ORDER BY a.created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAllUsers()
{
    global $pdo;

    $sql = "SELECT * FROM users"; // Vous pouvez ajuster cette requête selon vos besoins
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPendingArticles()
{
    global $pdo;

    $sql = "SELECT a.*, u.username FROM articles a JOIN users u ON a.author_id = u.id WHERE a.approved = 0 ORDER BY a.created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getArticleById($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT a.*, u.username FROM articles a JOIN users u ON a.author_id = u.id WHERE a.id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function getUserById($id)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateArticle($id, $title, $image, $content)
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE articles SET title = :title, image = :image, content = :content WHERE id = :id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
function updateUser($id, $username, $email, $role)
{
    global $pdo;

    $stmt = $pdo->prepare("UPDATE users SET username = :username, email = :email, role = :role WHERE id = :id");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
}

function approveArticle($id)
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE articles SET approved = 1 WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}


function deleteArticle($id)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
