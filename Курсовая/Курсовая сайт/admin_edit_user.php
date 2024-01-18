admin_edit_user.php

<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: src/actions/login.php");
    exit();
}

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: admin_users.php");
    exit();
}


// Получение информации о пользователе
$id = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: admin_users.php");
    exit();
}

// Обработка формы редактирования
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newUsername = $_POST["username"];
    $newPassword = $_POST["password"];
    $newRole = $_POST["role"];

    // Обновление данных пользователя
    $stmtUpdate = $pdo->prepare("UPDATE users SET username = :username, password = :password, role = :role WHERE id = :id");
    $stmtUpdate->bindParam(":username", $newUsername, PDO::PARAM_STR);
    $stmtUpdate->bindParam(":password", $newPassword, PDO::PARAM_STR);
    $stmtUpdate->bindParam(":role", $newRole, PDO::PARAM_STR);
    $stmtUpdate->bindParam(":id", $id, PDO::PARAM_INT);
    
    if ($stmtUpdate->execute()) {
        header("Location: admin_users.php");
        exit();
    } else {
        $error_message = "Failed to update user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit User</title>
</head>
<body>
    <h2>Edit User</h2>

    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="admin_edit_user.php?id=<?php echo $user['id']; ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" value="<?php echo $user['password']; ?>" required>
        <br>
        <label for="role">Role:</label>
        <input type="text" name="role" value="<?php echo $user['role']; ?>" required>
        <br>
        <input type="submit" value="Save Changes">
    </form>

    <p><a href="admin_users.php">Back to Users Management</a></p>
    <a href="admin_dashboard.php">Back to Dashboard</a>
    <a href="src/actions/logout.php">Logout</a>
</body>
</html>
