<?php
$host = "MySQL-8.0";
$user = "root";
$password = "";
$dbname = "kids_hub";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>