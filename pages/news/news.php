<!--подключаем стили для страницы Новости-->
<link rel="stylesheet" href="../../css/newsStyle.css">

<?php
// подключаем скрипт, где хранятся общие данные
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/changeInfo.php';
// подключаем скрипт подключения к базе данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/database.php';
// подключаем скрипт работы с таблицей новости
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/newsScript.php';
//вызываем функцию подключения к БД
$link = db_connect();

//вызываем функцию получения всех новостей из БД
$arrNews = articles_all($link);

//вызываем функцию получения начальной новости на текущей странице с новостями
$startNewsOnPage = start_news($countNewsOnPage);
// КОЛИЧЕСТВО СТРАНИЦ ДЛЯ ОТОБРАЖЕНИЯ

$pages = ceil(count($arrNews) / $countNewsOnPage);
?>
<div class="news_container">
    <div class='news'>
        <?php
        for ($i = $startNewsOnPage;
        $i < $countNewsOnPage + $startNewsOnPage;
        ++$i) {
        $row = $arrNews[$i];
        ?>
        <div class='news_item'>
            <a href='http://ttgomel.by/index.php?page=fullNews&id=<?php echo $row[0] ?>'
               class='titleNews'>
                <img src='<?php echo $row[4] ?>' alt='' class='imgNews'>
                <div class='titleNews'>
                <?php echo $row[1] ?>
            </a>
        </div>
        <div class='dateNews'><?php echo $row[3] ?></div>
    </div>
    <?php } ?>
</div>

<!--    формируем пагинацию-->
<div class='pages'> Страница:
    <?php for ($i = 1; $i <= $pages; ++$i) {
        if ($i == (($startNewsOnPage / $countNewsOnPage) + 1)) {
            ?>
            <a href='http://ttgomel.by/index.php?page=news&startPage=<?php echo $i ?>'
               class='currentPage'>&laquo; <?php echo $i ?> &raquo;</a>
        <?php } else { ?>
            <a href='http://ttgomel.by/index.php?page=news&startPage=<?php echo $i ?>'><?php echo $i ?></a>
            <?php
        }
    } ?>

</div>


<!--  закрываем подключение-->
<?php
mysqli_close($link); ?>
</div>