<?php
session_start();
require_once 'login.php';
$conn = new mysqli($hm, $un, $pw, $db);
if($conn -> connect_error) die("Fatal Error");
$query = "SELECT * FROM users";
$result = $conn -> query($query);
if(!$result) die ("Сбой при доступе к базе данных");

$emails = array();
while($row = $result -> fetch_array(MYSQLI_ASSOC)) array_push($emails, $row['user_email']);


if(!($_POST['surname'] && $_POST['name'] &&
    $_POST['email-r'] && $_POST['password-r1'] && $_POST['password-r2'])) {
    $_SESSION['error_registration'] = 'Пожалуйста, заполните полностью все поля верно(reg)';
    header('Location: /registration_form-personal_account.php?form=registration');
} elseif(in_array($_POST['email-r'],$emails)) {
    $_SESSION['error_registration'] = 'Указанная Вами почта уже была зарегистрирована(reg)';
    header('Location: /registration_form-personal_account.php?form=registration');
} elseif($_POST['password-r1'] != $_POST['password-r2']) {
    $_SESSION['error_registration'] = 'Пароли не совпадают(reg)';
    header('Location: /registration_form-personal_account.php?form=registration');
} else {


    $surname = $_POST['surname'];$name = $_POST['name'];
    $email = $_POST['email-r'];$pass_h = password_hash($_POST['password-r1'], PASSWORD_DEFAULT);$status = 'user';

    $query = "INSERT INTO users(user_surname,user_name,user_email,pass_h, status) 
    VALUES ('$surname', '$name', '$email', '$pass_h', '$status')";
    $result = $conn -> query($query);
    if(!$result) die ("Сбой при доступе к базе данных");
    $_SESSION['successful_registration'] = 'Регистрация прошла успешно, можете авторизоваться!(reg)';
    header('Location: /registration_form-personal_account.php?form=registration');
}


?>