<!--подключаем стили для страницы Новости-->
<link rel="stylesheet" href="../../css/newsStyle.css">

<?php
// подключаем скрипт подключения к базе данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/database.php';
// подключаем скрипт поиска в базе данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/searchScript.php';
?>
<div class="searchPage">
<?

// Сам скрипт обработчик
if (isset($_POST['query'])) { // Если есть запрос
    $link = db_connect();

    $search_result = search($_POST['query'], $link); // Определяем поисковый запрос
    echo $search_result; // Выводим

    // закрываем подключение
    mysqli_close($link);
}
?>

</div>