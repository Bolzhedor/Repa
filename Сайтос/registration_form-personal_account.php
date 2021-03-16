<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>BrainCancer.com</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="stylesheet" type="text/css" href="css/news-cheese-cakes.css">
    <?php
    (!$_GET['form']) ? ($form = "registration") : ($form = $_GET['form']);
    if ($form == 'registration'){
       echo '<link rel="stylesheet" type="text/css" href="css/registration.css">';
    } elseif ($form == 'autorization') {
        echo '<link rel="stylesheet" type="text/css" href="css/autorization.css">';
    } else {
        header( 'Location: /index.php');
    }
    ?>
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
            <div class = "forms">
                <div class = "registration_autorization">
                    <a href="registration_form-personal_account.php?form=registration" class="point-form registration">Регистрация</a>
                    <a href="registration_form-personal_account.php?form=autorization" class="point-form autorization">Авторизация</a>
                </div>

                <?php
                if ($form == 'registration'){
                    echo '
                        <form action="check-registration.php" method="post">
                        <div class = "form">
                            <label for="surname">Фамилия</label>
                            <input class="form-registration" name="surname" placeholder="Введите фамилию" type="text" autocomplete="off" id = "surname">
                            <label for="name">Имя</label>
                            <input class="form-registration" name="patronymic" placeholder="Введите отчество" type="text" autocomplete="off" id = "patronymic">
                            <label for="email-r">Почта</label>
                            <input class="form-registration" name="email-r" placeholder="Введите почту" type="email" autocomplete="off" id = "email">
                            <label for="password-r1">Пароль</label>
                            <input class="form-registration" name="password-r1" placeholder="Введите пароль" type="password" autocomplete="off" id = "password-1">
                            <label for="password-r2">Повторите пароль</label>
                            <input class="form-registration" name="password-r2" placeholder="Введите пароль ещё раз" type="password" autocomplete="off" id = "password-2">
                            <input type = "submit">
                        </div>
                        </form>';
                    echo $_SESSION['error_registration'];
                    unset($_SESSION['error_registration']);
                    echo $_SESSION['successful_registration'];
                    unset($_SESSION['successful_registration']);
                } elseif ($form == 'autorization') {
                    echo
                   '<form action="personal-area.php" method="post">
                    <div class = "form">
                        <label for="email-a">Введите почту</label>
                        <input class="form-registration" name="email-a" placeholder="Введите почту" type="text" autocomplete="off" id = "password-1">
                        <label for="password-a">Введите пароль</label>
                        <input class="form-registration" name="password-a" placeholder="Введите пароль" type="text" autocomplete="off" id = "password-2">
                        <input type = "submit" value="Войти">
                    </div>
                    </form>';
                    echo $_SESSION['error_autorization'];
                    unset($_SESSION['error_autorization']);
//                    print_r($_SESSION);
                } else {
                    header( 'Location: /index.php');
                }
                ?>





            </div>
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