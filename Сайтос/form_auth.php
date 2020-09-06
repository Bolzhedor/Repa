<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Authorization</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/form_auth.css">
	</head>
	<body>
	<div class="container mlogin">
		<header class="header">
				<a href="index.php" class="header_mainbottom"><img class="header_mainbottom_image" src="images/donut_mainbottom_logo.png" height="57.33px" width="152.88px" href="google.com"></a>
			    
				
			<div class="header_secondary_mainbottom">
			    <a class="header_secondary_mainbottom4" href="#">Личный кабинет</a>
				<a class="header_secondary_mainbottom3" href="form_auth.php">Регистрация/Авторизация</a>
				<a class="header_secondary_mainbottom2" href="#">Сладости два</a>
				<a class="header_secondary_mainbottom1" href="news.php">Новости</a>
			</div>

		</header>	
		
		<main class="main_body">
			<div id="autho_window">
			  <div class="win_input">
			    <input type="text" name="username" placeholder="Введите логин">
			  </div>
			  <div class="win_input">
			    <input type="password" name="password" placeholder="Введите пароль">
		      </div>  
				<input class="win_submit" type="submit" name="submit" value="Войти">
			    <br />
			    <a href="#"> Забыли пароль? </a>
				<br />
				<a href="#"> Регистрация </a>
			  </div>
			</div>
		</main>
		
		<footer class="footer">
			<div class="center_footer">
				©2000-2020, «cheese-cake.ru» - Интернет-магазин десертов. 
				Все права защищены.
		    </div>
			
	    </footer>
	</div>
	</body>
</html>