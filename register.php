<?php
session_start();

$conn = new mysqli("MySQL-8.0", "root", "", "kids_hub");

if ($conn->connect_error) {
  die("Ошибка: " . $conn->connect_error);
}

$message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $conn->real_escape_string($_POST['login']);


    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (login, password) VALUES ('$login', '$password')";

    if ($conn->query($sql)) 
        {

        $message = '<div class="good">Регистрация успешна! <a href="login.php">Войти</a></div>';
    } else 
    {
        $message = '<div class="oshibka">Ошибка: пользователь уже существует</div>';
    }
}
?>







<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="form_blok">
    <form method="POST" class="forma">
        <h2 class="zagolovochek">Регистрация</h2>
        


        <?= $message ?>
        
        <input type="text" name="login" class="polya" placeholder="Логин" required>
        
        <input type="password" name="password" class="polya" placeholder="Пароль" required>
        
        <button class="knopka">Зарегистрироваться</button>
        
        <div class="ssilka">
            Уже есть аккаунт? <a href="login.php">Войти</a>
        </div>
    </form>
</div>

</body>
</html>