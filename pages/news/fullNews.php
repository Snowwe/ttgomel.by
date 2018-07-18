<!--подключаем стили общие для всех страниц-->
<link rel="stylesheet" href="../../css/style.css">
<!--подключаем стили для страницы Новости-->
<link rel="stylesheet" href="../../css/newsStyle.css">

<link rel="stylesheet" href="../../modules/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="../../modules/owlcarousel/assets/owl.theme.default.min.css">
<link href="../../modules/lightbox/css/lightbox.css" rel="stylesheet">
<?php
// подключаем скрипт,где хранятся общие данные
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/changeInfo.php';
// подключаем скрипт подключения к базе данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/database.php';
// подключаем скрипт работы с таблицей новости
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/newsScript.php';
//вызываем функцию подключения к БД
$link = db_connect();
$row = articles_get($link, $_REQUEST["id"]);
?>
<div class="fullNews">
    <div class='full_news_item'>
        <h3><?php echo $row[1] ?></h3>
        <hr>
        <div class='dateFullNews'><?php echo $row[3] ?></div>
        <div class='contentFullNews'>
            <a href='<?php echo $row[4] ?>' data-lightbox='imgFullNews'>
                <img src='<?php echo $row[4] ?>' alt='' class='imgFullNewsFirst'>
            </a>
            <?php echo $row[2] ?>
        </div>

        <?php for ($j = 5; $j <= 12; ++$j) {
            if ($row[$j]) { ?>
                <a href='<?php echo $row[$j] ?>' data-lightbox='imgFullNews'>
                    <img src='<?php echo $row[$j] ?>' alt='' class='imgFullNews'>
                </a>
                <?php
            }
        } ?>
    </div>

    <?php
    // закрываем подключение
    mysqli_close($link);

    echo $back;
    ?>
</div>
<script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>

<!--<script src="../../modules/owlcarousel/owl.carousel.min.js"></script>-->
<script src="../../modules/lightbox/js/lightbox.js"></script>
<!--<script src="../../scripts/gallery.js"></script>-->



