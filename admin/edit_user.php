<?php
require_once '../includes/functions.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: manage_users.php");
    exit();
}

$user = getUserById($_GET['id']); // Implémentez cette fonction pour récupérer l'utilisateur par ID

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role']; // 'user' ou 'admin'

    if (updateUser($user['id'], $username, $email, $role)) { // Implémentez updateUser
        echo "Utilisateur modifié avec succès !";
    } else {
        echo "Erreur lors de la modification de l'utilisateur.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier l'utilisateur</title>
</head>

<body>
    <h2>Modifier l'utilisateur : <?php echo $user['username']; ?></h2>
    <form method="POST" action="">
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
        <select name="role" required>
            <option value="user" <?php if ($user['role'] === 'user') echo 'selected'; ?>>Utilisateur</option>
            <option value="admin" <?php if ($user['role'] === 'admin') echo 'selected'; ?>>Administrateur</option>
        </select>
        <button type="submit">Modifier l'utilisateur</button>
    </form>
</body>

</html>