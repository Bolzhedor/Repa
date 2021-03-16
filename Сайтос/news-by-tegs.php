<!DOCTYPE html>
<html>
<head>
	<title>BrainCancer.com</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/news-by-tegs.css">
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
			<form method = "get" action = "news-by-tegs.php">
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
			<input type="submit" href="news-by-tegs.php" class="result-tegs" name="result-tegs" value="Поиск по тегам">
			</form>
				<?php
                $pagination_tegs_substr = substr($_SERVER['REQUEST_URI'], 18);
                echo $pagination_tegs_substr;
                $pos = strpos($pagination_tegs_substr, '&', -10); // ? position
                if($pos > 0) $pagination_tegs_substr = substr($pagination_tegs_substr, 0, $pos);

                if(!isset($_GET['page'])){
                    $page = 1;
                }else{
                    $page = $_GET['page'];
                }

					require_once 'login.php';
					$conn = new mysqli($hm, $un, $pw, $db);
					if($conn -> connect_error) die("Fatal Error");
					$query = "SELECT teg FROM news_posts";
					$result = $conn -> query($query);
					if(!$result) die ("Сбой при доступе к базе данных");

					$rows = $result -> num_rows;

					$row = $result -> fetch_array(MYSQLI_ASSOC);


					if(isset($_GET['teg']) && isset($_GET['result-tegs'])){
						$teg = $_GET['teg'];
					}else{
						echo "Да - бда - бда<br>";
					}

//                    echo $_SERVER['PHP_SELF']."<br>";
//					print_r(__FILE__);
//					print_r($argv);

//					print_r($_GET);
//						echo "<br><br>";
//					echo "<br>";
					$result->close();
					$conn->close();

				?>
				    <?php
					require_once 'login.php';
					$conn = new mysqli($hm, $un, $pw, $db);
					if($conn -> connect_error) die("Fatal Error");
					$query = "SELECT teg, id_post FROM news_posts ORDER BY id_post DESC";
					$result = $conn -> query($query);
					if(!$result) die ("Сбой при доступе к базе данных");
					$rows = $result -> num_rows;

					$SQL_elements=[];
					if(count($_GET)>1){


                        echo "<br>";
					    $_GET = $_GET['teg'];
						for ($i=0; $i < $rows; $i++) {
					
							$row = $result -> fetch_array(MYSQLI_ASSOC);
							$explode_SQL[$i] = explode(" ", $row['teg']);
							$SQL_elements[$row['id_post']] = $explode_SQL[$i];
//							print_r($explode_SQL);

						}


//						echo "<br><br>";
						foreach ($SQL_elements as $key => $value) {
							array_push($SQL_elements[$key], count(array_intersect($SQL_elements[$key], $_GET)));
						}
						$count_common_tegs_id=[];
						foreach ($SQL_elements as $key => $value) {
							$count_common_tegs_id[$key] = $SQL_elements[$key][2];
						}

//						echo "<br><br>";
//						print_r($count_common_tegs_id);
//						echo "<br><br>";


						arsort($count_common_tegs_id);
//						echo "<br><br>";
//						print_r($count_common_tegs_id);


						$arr = [];
						$arr2 = [];
                        $arr3 = [];
                        $arr4 = [];
						for ($i=0; $i < count(array_unique($count_common_tegs_id)); $i++) { 
							$arr[$i] = [];
							$arr2[$i] = [];
                            $arr4[$i] = [];

						}

						$a = array_count_values($count_common_tegs_id);
						static $j = 0;
						foreach ($a as $key => $value) {
							while ($j != count($a)) {
								for ($i=0; $i < $a[$key]; $i++) {
									array_push($arr[$j], $key);
								}
								++$j;
								break;
							}
						}
						
						foreach($count_common_tegs_id as $k => $v){
                            array_push($arr3, $k);
                        }

						static $p = 0, $i = 0;
						foreach ($a as $k => $v) {
						    for ($j = $p, $x = 0; $x < $v; ++$j, ++$x){
						        array_push($arr4[$i], $arr3[$j]);
                                ++$p;
                            }
                            rsort($arr4[$i]);
                            ++$i;
                        }

						static $b = 0, $b1, $b2, $b3;
                        for ($i = 0; $i < count($arr4); ++$i){
                            for ($j = 0; $j < count($arr4[$i]); ++$j) {
                                if(!$b1){
                                    $b1 = 1;
                                    $b2 = $arr4[$i][$j];
                                    $b3 = $count_common_tegs_id[$arr4[$i][$j]];
                                    unset($count_common_tegs_id[$arr4[$i][$j]]);
                                    $count_common_tegs_id += [$arr4[$i][$j] => $b3];
                                    continue;
                                }
                                $b2 = $arr4[$i][$j];
                                $b3 = $count_common_tegs_id[$arr4[$i][$j]];
                                unset($count_common_tegs_id[$arr4[$i][$j]]);
                                $count_common_tegs_id += [$arr4[$i][$j] => $b3];
//                                echo $b3;
//                                unset($count_common_tegs_id[$arr4[$j]]);
                            }
                        }

//                        echo "<br><br>";
//                        print_r($count_common_tegs_id);
                        $result->close();
                        $conn->close();

////////////////////////////////////////////////////////////////////////////////////////////////////////

					}
                    foreach ($count_common_tegs_id as $k => $v) if($v == 0) unset($count_common_tegs_id[$k]);
                    require_once 'login.php';
                    $conn = new mysqli($hm, $un, $pw, $db);
                    if($conn -> connect_error) die("Fatal Error");
                    $results_per_page = 6;
//                    $query = "SELECT * FROM news_posts";
//                    $result = $conn -> query($query);
//                    if(!$result) die ("Сбой при доступе к базе данных");
                    $number_of_results = count($count_common_tegs_id);
                    $number_result_pages = ceil($number_of_results / $results_per_page);
//                    print_r($_GET);
//                    echo "<br>";


                    $this_page_first_result = ($page - 1) * $results_per_page;
//                    print_r($count_common_tegs_id);


                    ?>

                <div class="second-another">
                    <?php
                    reset($count_common_tegs_id);
//                    echo key($count_common_tegs_id);
                    for($i = ($page-1) * $results_per_page; $i != 0; --$i){
//                        echo "<br>";
                        next($count_common_tegs_id);

                    }
//                    echo key($count_common_tegs_id);
//                    print_r($_GET);
//                    echo $page;

                    for($i = 0; $i < 6; ++$i){
                        if(current($count_common_tegs_id)) {
                            $query = 'SELECT * FROM news_posts WHERE id_post =' . key($count_common_tegs_id);
                            $result = $conn->query($query);
                            $row = $result->fetch_array(MYSQLI_ASSOC);
                            echo '<div class="second-another-1">
				            	<img src="images-news-posts/news-post-image-none.jpg" width="12px">
			        	        <span>' . $row['pre_inf'] .'<a href = "post-by-tegs.php?id_post=' . $row['id_post'] . '">...</a>'. $row['teg'] .  '</span></div>';
                            next($count_common_tegs_id);
                        }else break;
                    }
                    reset($count_common_tegs_id);


                    ?>
                </div>
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <div class="pagination">
                <?php


                if($page >= 11) echo '<a class="button-pagination" href="news-by-tegs.php?'.$pagination_tegs_substr.'&page='. ($page-10) .'">' . '<<' . '</a>';
                if($page > 1) echo '<a class="button-pagination" href="news-by-tegs.php?'.$pagination_tegs_substr.'&page='. ($page-1) .'">' . '<' . '</a>';

                if($number_result_pages >= 7) {
                    switch ($page) {
                        case ($number_result_pages):
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page - 6) . '">' . ($page - 6) . '</a>';
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page - 5) . '">' . ($page - 5) . '</a>';
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page - 4) . '">' . ($page - 4) . '</a>';
                            break;
                        case ($number_result_pages - 1):
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page - 5) . '">' . ($page - 5) . '</a>';
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page - 4) . '">' . ($page - 4) . '</a>';
                            break;
                        case ($number_result_pages - 2):
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page - 4) . '">' . ($page - 4) . '</a>';
                    }
                }

                if($page-3 > 0) echo '<a class="button-pagination" href="news-by-tegs.php?'.$pagination_tegs_substr.'&page='. ($page-3) .'">' . ($page-3) . '</a>';
                if($page-2 > 0) echo '<a class="button-pagination" href="news-by-tegs.php?'.$pagination_tegs_substr.'&page='. ($page-2) .'">' . ($page-2) . '</a>';
                if($page-1 > 0) echo '<a class="button-pagination" href="news-by-tegs.php?'.$pagination_tegs_substr.'&page='. ($page-1) .'">' . ($page-1) . '</a>';
                echo '<a class="button-pagination button-pagination-now" href="news-by-tegs.php?'.$pagination_tegs_substr.'&page='. ($page)   .'">' . $page . '</a>';

                if($page+1 <= $number_result_pages) echo '<a class="button-pagination" href="news-by-tegs.php?'.$pagination_tegs_substr.'&page='. ($page+1) .'">' . ($page+1) . '</a>';
                if($page+2 <= $number_result_pages) echo '<a class="button-pagination" href="news-by-tegs.php?'.$pagination_tegs_substr.'&page='. ($page+2) .'">' . ($page+2) . '</a>';
                if($page+3 <= $number_result_pages) echo '<a class="button-pagination" href="news-by-tegs.php?'.$pagination_tegs_substr.'&page='. ($page+3) .'">' . ($page+3) . '</a>';

                if($number_result_pages >= 7) {
                    switch ($page) {
                        case 1:
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page + 4) . '">' . ($page + 4) . '</a>';
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page + 5) . '">' . ($page + 5) . '</a>';
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page + 6) . '">' . ($page + 6) . '</a>';
                            break;
                        case 2:
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page + 4) . '">' . ($page + 4) . '</a>';
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page + 5) . '">' . ($page + 5) . '</a>';
                            break;
                        case 3:
                            echo '<a class="button-pagination" href="news-by-tegs.php?' . $pagination_tegs_substr . '&page=' . ($page + 4) . '">' . ($page + 4) . '</a>';
                    }
                }
                if($page < $number_result_pages and $number_result_pages >= 2) echo '<a class="button-pagination" href="news-by-tegs.php?'.$pagination_tegs_substr.'&page=' . ($page+1) . '">' . '>' . '</a>';
                if($page <= $number_result_pages-10 and $number_result_pages >= 11) echo '<a class="button-pagination" href="news-by-tegs.php?'.$pagination_tegs_substr.'&page=' . ($page+10) . '">' . '>>' . '</a>';

                $result->close();
                $conn->close();



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