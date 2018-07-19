<!--по умолчанию загружается главная страница-->
<?php
$page = "main";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>СК "Гомсельмаш"</title>
    <!--подключаем иконку-->
    <link rel="shortcut icon" href="images/icon.ICO" type="image/x-icon">
    <!--подключаем шрифт для всех страниц-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!--подключаем стили для общие для всех страниц-->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

</head>
<body>
<!--загрузка header для всех страниц-->
<header>
    <?php
    include_once("pages/header.php");
    ?>
</header>
<!--загрузка меню для всех страниц-->
<nav class="nav">
    <?php
    include_once("pages/navigation.php");
    ?>
</nav>

<!--</div>-->
<!--загрузка страницы в зависимости от выбора пункта меню-->
<section>
    <?php
    if (isset($_REQUEST["page"])) {
        $page = $_REQUEST["page"];
    }
    switch ($page) {
        case "main":
            include_once("pages/main/main.php");
            break;
        case "news":
            include_once("pages/news/news.php");
            break;
        case "calendar":
            include_once("pages/calendar/calendar.php");
            break;
        case "rating":
            include_once("pages/rating/rating.php");
            break;
        case "gallery":
            include_once("pages/gallery/gallery.php");
            break;
        case "contacts":
            include_once("pages/contacts/contacts.php");
            break;

        case "mail":
            include_once("pages/contacts/mail.php");
            break;
        case "fullNews":
            include_once("pages/news/fullNews.php");
            break;
        case "search":
            include_once("pages/search.php");
            break;

        default: echo "<p class='error'>Ошибка 404. Запрашиваемая вами страница не найдена</p>";
            break;


    };

    ?>



</section>
<button class="btn-up"></button>
<!--загрузка footer для всех страниц-->
<footer>
    <?php
    include_once("pages/footer.php");
    ?>
</footer>

<script src="scripts/indexScript.js"></script>
</html>