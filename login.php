<?php
session_start();

$conn = new mysqli("MySQL-8.0", "root", "", "kids_hub");

if ($conn->connect_error) {
    die("Ошибка: " . $conn->connect_error);
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $conn->real_escape_string($_POST['login']);
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE login='$login'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['login'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Неверный логин или пароль";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="form_blok">
    <form method="POST" class="forma">
        <h2 class="zagolovochek">Вход</h2>
        
        <?php if($error != "") { ?>
            <div class="oshibka"><?= $error ?></div>
        <?php } ?>
        
        <input type="text" name="login" class="polya" placeholder="Логин" required>
        
        <input type="password" name="password" class="polya" placeholder="Пароль" required>
        
        <button class="knopka">Войти</button>
        

        
        <div class="ssilka">
            Нет аккаунта? <a href="register.php">Зарегистрироваться</a>
        </div>
    </form>
</div>

</body>
</html>