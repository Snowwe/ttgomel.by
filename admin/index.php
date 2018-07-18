<?php
echo "some text";
// подключаем скрипт подключения к базе данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/database.php';
// подключаем скрипт работы с таблицей новости
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/newsScript.php';
//вызываем функцию подключения к БД
$link = db_connect();

if (isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = '';

//добавление новой статьи
if ($action == 'add') {
    if (!empty($_POST)) {
        articles_new($link
            , $_POST['title']
            , $_POST['content']
            , $_POST['date']
            , $_POST['photo1']
            , $_POST['photo2'], $_POST['photo3'], $_POST['photo4']
            , $_POST['photo5'], $_POST['photo6'], $_POST['photo7']
            , $_POST['photo8'], $_POST['photo9']);
        header("location: index.php");
    }
    include('add.php');
}
//    редактирование
else if ($action == 'edit') {
    if (!isset($_GET['id'])) {
        header("location: http://ttgomel.by/admin/index.php");
    }
    $id = (int)$_GET['id'];

    if (!empty($_POST) && $id > 0) {
        articles_edit($link, $id
            , $_POST['title']
            , $_POST['content']
            , $_POST['date']
            , $_POST['photo1']
            , $_POST['photo2'], $_POST['photo3'], $_POST['photo4']
            , $_POST['photo5'], $_POST['photo6'], $_POST['photo7']
            , $_POST['photo8'], $_POST['photo9']);
        header("location: index.php");
    }
    echo   $_POST['content'];
    $article = articles_get($link, $id);
    include('edit.php');
}
else if($action == 'delete'){
    $id = $_GET['id'];
    $article=articles_delete($link,$id);
    header("location: index.php");
}
else {
    $articles = articles_all($link);
    include("newsAdmin.php");
}


?>