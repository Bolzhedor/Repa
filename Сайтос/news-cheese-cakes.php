
<!DOCTYPE html>
<html>
<head>
	<title>BrainCancer.com</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/tegs.css">
	<link rel="stylesheet" type="text/css" href="css/news-cheese-cakes.css">
    <link rel="stylesheet" type="text/css" href="css/pagination.css">
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
			<form action="news-by-tegs.php" method="get">
			<div class="main-news-tegs">
				<label class="news-teg news-teg-1">
						<input class="news-teg-checkbox" name="teg[]" value="teg1" type="checkbox">
						<span class="news-teg-checkbox-text">Тег1</span>
				</label>
				<label class="news-teg news-teg-2">
						<input class="news-teg-checkbox" name="teg[]" value="teg2" type="checkbox">
						<span class="news-teg-checkbox-text">Тег2</span>
				</label>
				<label class="news-teg news-teg-3">
						<input class="news-teg-checkbox" name="teg[]" value="teg3" type="checkbox">
						<span class="news-teg-checkbox-text">Тег3</span>
				</label>
				<label class="news-teg news-teg-4">
						<input class="news-teg-checkbox" name="teg[]" value="teg4" type="checkbox">
						<span class="news-teg-checkbox-text">Тег4</span>
				</label>
				<label class="news-teg news-teg-5">
						<input class="news-teg-checkbox" name="teg[]" value="teg5" type="checkbox">
						<span class="news-teg-checkbox-text">Тег5</span>
				</label>
				<label class="news-teg news-teg-6">
						<input class="news-teg-checkbox" name="teg[]" value="teg6" type="checkbox">
						<span class="news-teg-checkbox-text">Тег6</span>
				</label>
				<label class="news-teg news-teg-7">
						<input class="news-teg-checkbox" name="teg[]" value="teg7" type="checkbox">
						<span class="news-teg-checkbox-text">Тег7</span>
				</label>
				<label class="news-teg news-teg-8">
						<input class="news-teg-checkbox" name="teg[]" value="teg8" type="checkbox">
						<span class="news-teg-checkbox-text">Тег8</span>
				</label>
			</div>
			<input type="submit" class="result-tegs" name="result-tegs" value="Поиск по тегам">
			</form>
			<?php
            echo $_SERVER['PATH_INFO'];
            echo "<br>";
				require_once 'login.php';
				$conn = new mysqli($hm, $un, $pw, $db);
				if($conn -> connect_error) die("Fatal Error");
				$results_per_page = 6;
				$query = "SELECT * FROM news_posts";
				$result = $conn -> query($query);
				if(!$result) die ("Сбой при доступе к базе данных");
				$number_of_results = $result -> num_rows;
				$number_result_pages = ceil($number_of_results / $results_per_page);

				if(!isset($_GET['page'])){
					$page = 1;
				}else{
					$page = $_GET['page'];
				}

				$this_page_first_result = ($page - 1) * $results_per_page;
				$query = "SELECT * FROM news_posts ORDER BY id_post DESC LIMIT " . $this_page_first_result . "," . $results_per_page;
				$result = $conn -> query($query);
			?>	
			

			<div class="second-another">
				<?php
					while($row = $result -> fetch_array(MYSQLI_ASSOC)){
					echo '<div class="second-another-1">
					<img src="images-news-posts/news-post-image-none.jpg" width="12px">
					<span>'.$row['pre_inf'] .'<a href = "post-by-tegs.php?id_post=' . $row['id_post'] . '">...</a>' . '</span></div>';
				}

				?>
			</div>
			<div class="pagination">
				    <?php


                    if($page >= 11) echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page-10) .'">' . '<<' . '</a>';
                    if($page > 1) echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page-1) .'">' . '<' . '</a>';

                    switch($page){
                        case $number_result_pages:
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page-6) .'">' . ($page-6) . '</a>';
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page-5) .'">' . ($page-5) . '</a>';
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page-4) .'">' . ($page-4) . '</a>';
                            break;
                        case $number_result_pages-1:
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page-5) .'">' . ($page-5) . '</a>';
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page-4) .'">' . ($page-4) . '</a>';
                            break;
                        case $number_result_pages-2:
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page-4) .'">' . ($page-4) . '</a>';
                            break;
                    }

                    if($page-3 > 0) echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page-3) .'">' . ($page-3) . '</a>';
                    if($page-2 > 0) echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page-2) .'">' . ($page-2) . '</a>';
                    if($page-1 > 0) echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page-1) .'">' . ($page-1) . '</a>';
                    if(isset($number_result_pages)) echo '<a class="button-pagination button-pagination-now" href="news-cheese-cakes.php?page='. ($page)   .'">' . $page . '</a>';

                    if($page+1 <= $number_result_pages) echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page+1) .'">' . ($page+1) . '</a>';
                    if($page+2 <= $number_result_pages) echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page+2) .'">' . ($page+2) . '</a>';
                    if($page+3 <= $number_result_pages) echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page+3) .'">' . ($page+3) . '</a>';

                    switch($page){
                        case 1:
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page+4) .'">' . ($page+4) . '</a>';
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page+5) .'">' . ($page+5) . '</a>';
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page+6) .'">' . ($page+6) . '</a>';
                            break;
                        case 2:
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page+4) .'">' . ($page+4) . '</a>';
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page+5) .'">' . ($page+5) . '</a>';
                            break;
                        case 3:
                            echo '<a class="button-pagination" href="news-cheese-cakes.php?page='. ($page+4) .'">' . ($page+4) . '</a>';
                            break;
                    }

                    if($page < $number_result_pages) echo '<a class="button-pagination" href="news-cheese-cakes.php?page=' . ($page+1) . '">' . '>' . '</a>';
                    if($page <= $number_result_pages-10) echo '<a class="button-pagination" href="news-cheese-cakes.php?page=' . ($page+10) . '">' . '>>' . '</a>';






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