<!DOCTYPE html>
<html>
<head>
    <title>BrainCancer.com</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/shop.css">
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
        <div class="main-menu-goods-categories">
            <form method="get">
                <div class="main-goods-categories">
                    <input class="goods-category-radio" id="category-donuts" name="category[]" value="donuts" type="radio">
                    <label class="goods-category category-donuts" for="category-donuts">Донаты</label>

                    <input class="goods-category-radio" id="category-cheese-cakes" name="category[]" value="cheese-cakes" type="radio">
                    <label class="goods-category category-cheese-cakes" for="category-cheese-cakes">Чизкейки</label>

                    <input class="goods-category-radio" id="category-milkshakes" name="category[]" value="milkshakes" type="radio">
                    <label class="goods-category category-milkshakes" for="category-milkshakes">Милкшейки</label>

                    <input class="goods-category-radio" id="category-pies" name="category[]" value="pies" type="radio">
                    <label class="goods-category category-pies" for="category-pies">Пирожки</label>

                    <input class="goods-category-radio" id="category-cookies" name="category[]" value="cookies" type="radio">
                    <label class="goods-category category-cookies" for="category-cookies">Печенье</label>

                </div>
                <input type="submit" class="result-tegs" name="result-tegs" value="Поиск">
            </form>
            <?php
            if(strlen($_SERVER['REQUEST_URI'])>10){
                $pagination_tegs_substr = substr($_SERVER['REQUEST_URI'], 10);
                $pos = strpos($pagination_tegs_substr, '&', -20); // ? position
                if($pos > 0) $pagination_tegs_substr = substr($pagination_tegs_substr, 0, $pos);
            }
//            echo $_SERVER['PATH_INFO'];
//            echo "<br>";
//            print_r($_GET);
            require_once 'login.php';
            $conn = new mysqli($hm, $un, $pw, $db);
            if($conn -> connect_error) die("Fatal Error");
            $results_per_page = 4;
            $category = $_GET['category'][0];
//            echo $category;
            $query = "SELECT * FROM goods WHERE category_good = '$category'";
            $result = $conn -> query($query);
            if(!$result) die ("Сбой при доступе к базе данных1");
            $number_of_results = $result -> num_rows;
            if($number_of_results>0)$number_result_pages = ceil($number_of_results / $results_per_page);

            if(!isset($_GET['page'])){
                $page = 1;
            }else{
                $page = $_GET['page'];
            }

            $this_page_first_result = ($page - 1) * $results_per_page;
            $query = "SELECT * FROM goods WHERE category_good = '$category' ORDER BY id_good DESC LIMIT {$this_page_first_result}, {$results_per_page}";
            $result = $conn -> query($query);
            if(!$result) die ("Сбой при доступе к базе данных2");
            ?>
        </div>
        <div class = "third-another">
<!--            --><?php
            while($row = $result -> fetch_array(MYSQLI_ASSOC)){
                echo '<div class="third-another-1">
                        <a class="third-another-image" href="#">
                            <img src="' . $row['picture_good'] . '" width="150%">
                        </a>
                        <div class="third-another-2">
                            <div class="third-another-country">Страна: РФ</div>
                            <div class="third-another-weight">Масса: 999г</div>
                            <a class="third-another-cart" href="#"><img src="images/cart.png" width=40px height=40px></a>
                            <div class="third-another-cost">Стоимость: 999р</div>
                            <div class="third-another-name">Название</div>
                            <a class="third-another-instant-purchase" href="#">Мгновенная покупка'. $row['id_good'] .'</a>
                        </div>
                    </div>
					';
            }
//
//            ?>

        </div>


        <div class="pagination">
            <?php


            if($page >= 11) echo '<a class="button-pagination" href="shop.php?'.$pagination_tegs_substr.'&page='. ($page-10) .'">' . '<<' . '</a>';
            if($page > 1) echo '<a class="button-pagination" href="shop.php?'.$pagination_tegs_substr.'&page='. ($page-1) .'">' . '<' . '</a>';

            if($number_result_pages >= 7) {
                switch ($page) {
                    case ($number_result_pages):
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page - 6) . '">' . ($page - 6) . '</a>';
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page - 5) . '">' . ($page - 5) . '</a>';
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page - 4) . '">' . ($page - 4) . '</a>';
                        break;
                    case ($number_result_pages - 1):
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page - 5) . '">' . ($page - 5) . '</a>';
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page - 4) . '">' . ($page - 4) . '</a>';
                        break;
                    case ($number_result_pages - 2):
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page - 4) . '">' . ($page - 4) . '</a>';
                }
            }

            if($page-3 > 0) echo '<a class="button-pagination" href="shop.php?'.$pagination_tegs_substr.'&page='. ($page-3) .'">' . ($page-3) . '</a>';
            if($page-2 > 0) echo '<a class="button-pagination" href="shop.php?'.$pagination_tegs_substr.'&page='. ($page-2) .'">' . ($page-2) . '</a>';
            if($page-1 > 0) echo '<a class="button-pagination" href="shop.php?'.$pagination_tegs_substr.'&page='. ($page-1) .'">' . ($page-1) . '</a>';
            if(isset($number_result_pages))echo '<a class="button-pagination button-pagination-now" href="shop.php?'.$pagination_tegs_substr.'&page='. ($page)   .'">' . $page . '</a>';

            if($page+1 <= $number_result_pages) echo '<a class="button-pagination" href="shop.php?'.$pagination_tegs_substr.'&page='. ($page+1) .'">' . ($page+1) . '</a>';
            if($page+2 <= $number_result_pages) echo '<a class="button-pagination" href="shop.php?'.$pagination_tegs_substr.'&page='. ($page+2) .'">' . ($page+2) . '</a>';
            if($page+3 <= $number_result_pages) echo '<a class="button-pagination" href="shop.php?'.$pagination_tegs_substr.'&page='. ($page+3) .'">' . ($page+3) . '</a>';

            if($number_result_pages >= 7) {
                switch ($page) {
                    case 1:
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page + 4) . '">' . ($page + 4) . '</a>';
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page + 5) . '">' . ($page + 5) . '</a>';
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page + 6) . '">' . ($page + 6) . '</a>';
                        break;
                    case 2:
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page + 4) . '">' . ($page + 4) . '</a>';
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page + 5) . '">' . ($page + 5) . '</a>';
                        break;
                    case 3:
                        echo '<a class="button-pagination" href="shop.php?' . $pagination_tegs_substr . '&page=' . ($page + 4) . '">' . ($page + 4) . '</a>';
                }
            }
            if($page < $number_result_pages and $number_result_pages >= 2) echo '<a class="button-pagination" href="shop.php?'.$pagination_tegs_substr.'&page=' . ($page+1) . '">' . '>' . '</a>';
            if($page <= $number_result_pages-10 and $number_result_pages >= 11) echo '<a class="button-pagination" href="shop.php?'.$pagination_tegs_substr.'&page=' . ($page+10) . '">' . '>>' . '</a>';

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