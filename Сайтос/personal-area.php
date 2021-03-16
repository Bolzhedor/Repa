<?php
session_start();
if(!($_POST['email-a'] && $_POST['password-a'])){
    $_SESSION['error_autorization'] = 'Пожалуйста, заполните полностью все поля(aut)';
    header('Location: /registration_form-personal_account.php?form=autorization');
}
require_once 'login.php';
$conn = new mysqli($hm, $un, $pw, $db);
if($conn -> connect_error) die("Fatal Error");
$query = "SELECT user_email, pass_h FROM users";
$result = $conn -> query($query);
if(!$result) die ("Сбой при доступе к базе данных");


while($row = $result -> fetch_array(MYSQLI_ASSOC)) {
    if (($row['user_email'] == $_POST['email-a']) && ($row['pass_h'] == $_POST['password-a'])) {
        $b = 1;
        print_r($_POST);
        break;
    }
}
if(!isset($b)){
    $_SESSION['error_autorization'] = 'Перепроверьте правильность написания Вашей почты и\или пароля(aut)';
    header('Location: /registration_form-personal_account.php?form=autorization');
}
$result->close();
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>BrainCancer.com</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<body>
<div id="body">
    <header class="header">
        <a href="index.php" class="header-mainbottom"><img class="header-mainbottom-image" src="images/donut-mainbottom-logo.png" height="57.33px" width="152.88px" href="google.com"></a>


        <div class="header-secondary-mainbottom">
            <a class="header-secondary-mainbottom4" href="registration_form-personal_account.php">Авторизация/Регистрация</a>
            <a class="header-secondary-mainbottom3" href="#">Сладости три</a>
            <a class="header-secondary-mainbottom2" href="shop.php">Магазин</a>
            <a class="header-secondary-mainbottom1" href="news.php">Новости</a>
        </div>

    </header>

    <main class="main-body">
    <?php
    require_once 'login.php';
    $conn = new mysqli($hm, $un, $pw, $db);
    if($conn -> connect_error) die("Fatal Error");
    $query1 = "SELECT inf, title, id_post FROM news_posts ORDER BY id_post DESC LIMIT 1";
    $result1 = $conn -> query($query1);
    if(!$result1) die ("Сбой при доступе к базе данных");
    $row1 = $result1 -> fetch_array(MYSQLI_ASSOC);

    $email_a = $_POST['email-a']; $password_a = $_POST['password-a'];
    $query2 = "SELECT id_man, user_name, user_surname FROM users WHERE user_email = $email_a AND pass_h = $password_a";
    $result2 = $conn -> query($query2);
    if(!$result2) die ("Сбой при доступе к базе данных2");
    $row2 = $result2 -> fetch_array(MYSQLI_ASSOC);

    echo '
    <div class = "i-profile">
        <div class = "post-personal-area windows-personal-area">'.$row1['inf'].'<a href = "post-by-tegs.php?id_post='.$row1['id_post'].'">...</a>'.'</div>
        <div class = "profile-actions-area windows-personal-area">
            <div class = "profile-id">ID: '.$row2['id_man'].'</div>
            <div class = "profile-nsp">ФИ: '.$row2['user_surname']." ".$row2['user_name'].'</div>
            <a href = "#" class = "profile-history">История</a>
            <a href = "#" class = "profile-help">Помощь</a>
            <a href = "#" class = "profile-cart">Корзина</a>
        </div>
        <div class = "topfive-area windows-personal-area">3</div>
        <div class = "love-area windows-personal-area">4</div>
    </div>';

    ?>

    </main>
    <footer class="footer">
        <div class="center-footer">
            ©2000-2020, «cheese-cake.ru» - Интернет-магазин десертов.
            Все права защищены.
        </div>

    </footer>
</div>



</body>
</html>