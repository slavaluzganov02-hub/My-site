<?php session_start(); ?>
<?php
// Подключение к БД
$host = "MySQL-8.0";
$user = "root";
$password = "";
$dbname = "kids_hub";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['circle_id'])) {

    if (!isset($_SESSION['user'])) {
        die("Сначала войдите в аккаунт");
    }

    $user = $_SESSION['user'];
    $circle_id = (int)$_POST['circle_id'];

    $conn->query("INSERT INTO enrollments (user, circle_id) VALUES ('$user', $circle_id)");

    echo "<script>alert('Вы записались!');</script>";
}
// Фильтр
$where = [];

if (!empty($_GET['city'])) {
    $city = $conn->real_escape_string($_GET['city']);
    $where[] = "city LIKE '%$city%'";
}

if (!empty($_GET['category'])) {
    $category = $conn->real_escape_string($_GET['category']);
    $where[] = "category = '$category'";
}

if (!empty($_GET['age'])) {
    $age = (int)$_GET['age'];
    $where[] = "age_min <= $age AND age_max >= $age";
}

$sql = "SELECT * FROM circles";

if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}

$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ForAclild</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>



<div class="top_panel">
    <div class="cont">
        <div class="flex_row">
            <div class="logo_text">For <a class="A">A</a><br>clild</div>
            <div class="knopki">
<?php if(isset($_SESSION['user'])) { ?>
    <span>Привет, <?= $_SESSION['user'] ?></span>
    <a href="logout.php" class="knopka_vhod">Выйти</a>
<?php } else { ?>
    <a href="login.php" class="knopka_vhod">Войти</a>
    <a href="register.php" class="knopka_reg">Регистрация</a>
<?php } ?>
            </div>
        </div>
    </div>
</div>




<div class="cont">
    <div class="blok1">
        <div class="left_col">
            <div class="zag1">Найди кружок для своего ребёнка</div>
            <div class="podzag">Быстро. Удобно. Онлайн.</div>
            <button class="oranzh_btn">Записаться</button>
        </div>
        <div class="right_col">
            <img src="./k67of0vddfau12klnbj959t315dsxyls-no-bg-preview (carve.photos).png" width="350">
        </div>
    </div>
</div>

<div class="zagolovok_poiska">Поиск</div>




<div class="cont">

<form method="GET">
    <div class="seryy_blok">
        <div class="ryad_filtrov">
            <div class="pole1">
                <input type="text" name="city" class="input_pole" placeholder="Город">
            </div>


            <div class="pole1">
                <select name="category" class="select_pole">
                    <option value="">Категория</option>
                    <option value="Спорт">Спорт</option>
                    <option value="Искусство">Искусство</option>
                    <option value="Наука">Наука</option>
                    <option value="Языки">Языки</option>
                </select>
            </div>



            <div class="pole2">
                <input type="number" name="age" class="input_pole" placeholder="Возраст">
            </div>
            <div class="pole2">
                <button class="sin_btn">Найти</button>
            </div>
        </div>
    </div>
</form>

<div class="kont_kartochek">

<?php while($row = $result->fetch_assoc()) { ?>




<?php
$images = [
    1 => 'https://avatars.mds.yandex.net/i?id=861f3caec04a0454090888094af7400c_l-3519607-images-thumbs&n=13',
    2 => 'https://img.freepik.com/premium-vector/drawing-workshop-icon-hands-painting-watercolor-landscape_81894-6661.jpg?semt=ais_hybrid&w=740',
    3 => 'https://avatars.mds.yandex.net/i?id=e187e3ed788c68373c6c474e46b4c291_l-4968790-images-thumbs&n=13',
    4 => 'https://elithair.co.uk/wp-content/uploads/2024/04/soccer-ball-green-field-ready-game-scaled.jpg',
    5 => 'https://img.freepik.com/free-photo/details-ball-sport_23-2151869849.jpg?semt=ais_hybrid&w=740',
    6 => 'https://avatars.mds.yandex.net/i?id=a8b0c1d09aa167c7e340ae752c88006a_l-5250851-images-thumbs&n=13',
    7 => 'https://img.freepik.com/premium-vector/child-drawings-color-pencils_667811-894.jpg?semt=ais_hybrid&w=740',
    8 => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Oxxxymiron_RAW_Berlin_asv2022-04_img15.jpg/1280px-Oxxxymiron_RAW_Berlin_asv2022-04_img15.jpg',
    9 => 'https://img.freepik.com/premium-photo/kids-dance-school-featuring-ballet-hiphop-street-funky-modern-dancers_1189620-6513.jpg?semt=ais_hybrid&w=740&q=80',
    10 => 'https://avatars.mds.yandex.net/i?id=aeb566411b18e4383b10fd1c9d6752b2_l-5285341-images-thumbs&n=13',
    11 => 'https://img.freepik.com/free-photo/3d-render-robots-with-transmission-wheels_1048-5630.jpg?semt=ais_wordcount_boost&w=740&q=80',
    12 => 'https://img.freepik.com/premium-vector/english-language-study-education-concept-grammar-book-school-literature-dictionary-vocabulary-textbook-composition-linguistics-lesson-flat-vector-illustration-isolated-white-background_198278-23852.jpg?semt=ais_hybrid&w=740&q=80',
    13 => 'https://img.freepik.com/free-photo/assortment-chinese-symbols-written-with-ink_23-2148826183.jpg?semt=ais_hybrid&w=740&q=80'
];

$img = $images[$row['id']] ?? 'images/no-image.jpg';
?>







<div class="kartochka">
    <img class="kartinka" src="<?= $img ?>">

    <div class="nazvanie_kruzhka"><?= $row['title'] ?></div>

    <div class="info"><b>Возраст:</b> <?= $row['age_min'] ?> - <?= $row['age_max'] ?></div>
    <div class="info"><b>Цена:</b> <?= $row['price'] ?> ₽</div>
    <div class="info"><b>Город:</b> <?= $row['city'] ?></div>
    <div class="info"><b>Категория:</b> <?= $row['category'] ?></div>






    <form method="POST">
        <input type="hidden" name="circle_id" value="<?= $row['id'] ?>">
        <button class="zelen_btn">Записаться</button>
    </form>





</div>

<?php } 


?>

</div>

</div>

</body>
</html>