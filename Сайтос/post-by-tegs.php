<!DOCTYPE html>
<html>
<head>
	<title>BrainCancer.com</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/post.css">

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

            $id_post = $_GET['id_post'];

            $query = "SELECT * FROM news_posts WHERE id_post = $id_post";
            $result = $conn -> query($query);
            if(!$result) die ("Сбой при доступе к базе данных");

            $row = $result -> fetch_array(MYSQLI_ASSOC);
            echo
            '<div class = "general-post">
                <img class = "picture-general-post" src = ' . $row['pctr'] . '>
                <div class = "information-post">
                    <h1>' . $row['title'] . '</h1>
                    <span>' . $row['inf'] . '</span>
                </div>                
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

