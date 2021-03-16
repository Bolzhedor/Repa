<!DOCTYPE html>
<html>
<head>
	<title>BrainCancer.com</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/news-cheese-cakes.css">
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
            if(password_verify('gbgtw2003','$2y$10$.VFf/DHLNFhqTyGEa3oLUeIrgWtndjx1MO/pK0zRo1P.JEP5sQNHm')){
                echo 111;
            }

//            require_once 'login.php';
//            $conn = new mysqli($hm, $un, $pw, $db);
//            if($conn -> connect_error) die("Fatal Error");
//            $query = "SELECT * FROM users";
//            $result = $conn -> query($query);
//            if(!$result) die ("Сбой при доступе к базе данных");
//
//            $emails = array();
//            while($row = $result -> fetch_array(MYSQLI_ASSOC)) array_push($emails, $row['user_email']);
//            print_r($emails);

//            $a='gbgtw2004';
//            echo password_hash($a, PASSWORD_DEFAULT);
//            echo "<br>";
//
//
//            $a = [83 => 2, 82 => 2, 2 => 2, 1 => 2, 155 => 1, 3 => 1, 162 => 0, 161 => 0, 160 => 0];
//            for($i = 6; $i != 0; --$i) next($a);
//            echo current($a) . "lflflf".key($a) . "<br>";
//
//            echo $a = "wefwef&sd";
//            echo "<br>";
//            echo $pos = strpos($a, '&', -4); // ? position

//                $b = 0;
//                if(!$b){
//                    echo "gavno";
//                    $b = 1;
//                }
//            if(!$b){
//                echo "gavno";
//                $b = 1;
//            }
//
//
//				require_once 'login.php';
//				$conn = new mysqli($hm, $un, $pw, $db);
//				if($conn -> connect_error) die("Fatal Error");
////				$results_per_page = 7;
//				$query = "SELECT * FROM news_posts";
//				$result = $conn -> query($query);
//				if(!$result) die ("Сбой при доступе к базе данных");
//				$number_of_results = $result -> num_rows;
//				echo "<br>".$number_of_results;
//
//
//				for ($i=1;$i<=$number_of_results;++$i){
//                    $query = "UPDATE news_posts SET pctr = 'images-news-posts/news-post-image-none.jpg' WHERE id_post = $i";
//                    $result = $conn -> query($query);
//
//                    if(!$result) die ("Сбой при доступе к базе данных");
//                }








//				$number_result_pages = ceil($number_of_results / $results_per_page);
//
//				if(!isset($_GET['page'])){
//					$page = 1;
//				}else{
//					$page = $_GET['page'];
//				}
//
//				$this_page_first_result = ($page - 1) * $results_per_page;
//				$query = "SELECT * FROM news_posts LIMIT " . $this_page_first_result . "," . $results_per_page;
//				$result = $conn -> query($query);
//
//				while($row = $result -> fetch_array(MYSQLI_ASSOC)){
//					echo $row['id_post'] . '<br>';
//				}
//
//
//				for($page = 1; $page <= $number_result_pages; $page++){
//					echo '<a href="index.php?page='. $page .'">' . $page . '</a><br><br><br><br><br><br><br>';
//				}
//
//			?>
<!--			--><?php //
//				require_once 'login.php';
//				$conn = new mysqli($hm, $un, $pw, $db);
//				if($conn -> connect_error) die("Fatal Error");
//				$query = "SELECT * FROM news_posts";
//				$result = $conn -> query($query);
//				if(!$result) die ("Сбой при доступе к базе данных");
//
//
//				if(isset($_POST['teg']) && isset($_POST['result-tegs'])){
//					$teg = $_POST['teg'];
//					foreach ($_POST as $key) {
//						echo "$key<br>";
//					}
//				}
//			 ?><!--	-->
<!---->
<!--            --><?php

//                require_once 'login.php';
//				$conn = new mysqli($hm, $un, $pw, $db);
//				if($conn -> connect_error) die("Fatal Error");
//				$query = "SELECT teg, id_post FROM news_posts";
//				$result = $conn -> query($query);
//				if(!$result) die ("Сбой при доступе к базе данных");
//				$rows = $result -> num_rows;
//				$j=0;
//				$id_common_element = [];
//				for ($i=0; $i < $rows; $i++) {
//					$row = $result -> fetch_array(MYSQLI_ASSOC);
//					$explode_SQL = explode(" ", $row['teg']);
//					for ($k=0; $k < count($_POST); $k++) {
//						if(array_intersect($_POST, $explode_SQL)){
//							$id_common_element = $row['id_post'];
//							++$j;
//						}
//					}
//				}
//
//				foreach ($id_common_element as $key => $value) {
//					echo "$value<br>";
//				}
//
//				print_r(array_count_values([1,2,"asd",56,34,56,"asd"]));
//				echo "<br><br>";
//
//				for ($i=0; $i < 10; $i++) {
//					echo $i;
//					$i=2*$i;
//				}
//
//				static $r;
//				if(isset($r)){
//					echo "+";
//				}else{
//					echo "-";
//				}
//                echo "<br><br>";
//				$a = array(
//				    10 => "as",
//                    10 => "df"
//
//                );
//                print_r($a);
//
//                $array = [23,51,5642,1,56];
//                echo "<br><br>";
//                print_r($array);
//            echo "<br><br>";
//                merge_sort($array);
//            function merge_sort($array) {
//                if(count($array) == 1 ) return $array;
//
//                $middle = count($array) / 2;
//                $left = array_slice($array, 0, $middle);
//                echo "Left";
//                print_r($left);
//                echo "<br><br>";
//                $right = array_slice($array, $middle);
//                echo "Right";
//                print_r($right);
//                echo "<br><br>";
//
//                $left = merge_sort($left);
//                $right = merge_sort($right);
//                echo "--------------------------------------";
//                echo "<br><br>";
//                echo "Left1";
//                print_r($left);
//
//                echo "<br><br>";
//                echo "Right1";
//                print_r($right);
//                echo "<br><br>";
//
//                return merge($left, $right);
//            }
//
//            function merge($left, $right) {
//                $result = [];
//
//                while (count($left) > 0 && count($right) > 0) {
//                    if($left[0] > $right[0]) {
//                        $result[] = $right[0];
//                        $right = array_slice($right , 1);
//                    } else {
//                        $result[] = $left[0];
//                        $left = array_slice($left, 1);
//                    }
//                }
//
//                while (count($left) > 0) {
//                    $result[] = $left[0];
//                    $left = array_slice($left, 1);
//                }
//
//                while (count($right) > 0) {
//                    $result[] = $right[0];
//                    $right = array_slice($right, 1);
//                }
//
//                return $result;
//            }
//
////            echo "<span>for($i=0;$i!=5;++$i) echo "$i"</span>";
//
//
//
//

			 ?>
<?php
//            require_once 'login.php';
//            $conn = new mysqli($hm, $un, $pw, $db);
//            if($conn -> connect_error) die("Fatal Error");
//
//                for($x=1;$x<=25;++$x){
//                    for($y=1;$y<=4;++$y){
//                        $query = "INSERT INTO goods (picture_good, name_good, price_good, weight_good, country_good, category_good)
//            VALUES
//            ('images/donut.png','Донат','999','999','РФ','donuts'),
//            ('images/cheese-cake.png','Чизкейк','999','999','РФ','cheese-cakes'),
//            ('images/milkshake.png','Милкшейк','999','999','РФ','milkshakes'),
//            ('images/pie.png','Пирожок','999','999','РФ','pies'),
//            ('images/cookie.png','Печенье','999','999','РФ','cookies')";
//                        $result = $conn -> query($query);
//                    }
                // }
//
?>
            <form method="post">
            <label>
                <input type="radio">
            </label>
            <label>
                <input type="radio">
            </label>
            <label>
                <input type="radio">
            </label>
            </form>


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