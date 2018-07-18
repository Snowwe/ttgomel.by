<?php

function articles_all($link)
{
    $query = "SELECT *
          FROM news
          ORDER BY dateOfNews DESC";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if ($result) {
        $rows = mysqli_num_rows($result); // количество полученных строк
        //формируем массив новостей
        $arrNews = [];
        for ($i = 0; $i < $rows; ++$i) {
            array_push($arrNews, mysqli_fetch_row($result));
        }
    }
    return $arrNews;
}

//
function articles_get($link, $selectedID)
{
    // выполняем операции с базой данных
    //выбираем данные
    $query = "SELECT *
          FROM news n 
          WHERE id_news=$selectedID";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if ($result) {
        $row = mysqli_fetch_row($result);
    }
    return $row;
}

function articles_new($link, $title, $content, $date, $image, $image2, $image3, $image4, $image5, $image6, $image7, $image8, $image9)
{
    //убираем слева и справа пробелы
    $title = trim($title);
    $content = trim($content);
    if ($title == '')
        return false;

    $ins = "INSERT INTO news ( title, content, dateOfNews, image_url, image_url_2, image_url_3, image_url_4, image_url_5, image_url_6, image_url_7, image_url_8, image_url_9 ) 
VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s' )";

    $query = sprintf($ins
        , mysqli_real_escape_string($link, $title)
        , mysqli_real_escape_string($link, $content)
        , mysqli_real_escape_string($link, $date)
        , mysqli_real_escape_string($link, $image)
        , mysqli_real_escape_string($link, $image2)
        , mysqli_real_escape_string($link, $image3)
        , mysqli_real_escape_string($link, $image4)
        , mysqli_real_escape_string($link, $image5)
        , mysqli_real_escape_string($link, $image6)
        , mysqli_real_escape_string($link, $image7)
        , mysqli_real_escape_string($link, $image8)
        , mysqli_real_escape_string($link, $image9)
    );

    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    return true;

}

function articles_edit($link, $id, $title, $content, $date, $image, $image2, $image3, $image4, $image5, $image6, $image7, $image8, $image9)
{
//убираем слева и справа пробелы
    $title = trim($title);
    $content = trim($content);
    $date = trim($date);
    $image = trim($image);
    $image2 = trim($image2);
    $image3 = trim($image3);
    $image4 = trim($image4);
    $image5 = trim($image5);
    $image6 = trim($image6);
    $image7 = trim($image7);
    $image8 = trim($image8);
    $image9 = trim($image9);
    if ($title == '')
        return false;

    $upd = "UPDATE news 
            SET title='%s'
            , content='%s'
            , dateOfNews='%s'
            , image_url='%s', image_url_2='%s'
            , image_url_3='%s', image_url_4='%s'
            , image_url_5='%s', image_url_6='%s'
            , image_url_7='%s', image_url_8='%s', image_url_9='%s' 
            WHERE id_news='%d'";

    $query = sprintf($upd
        , mysqli_real_escape_string($link, $title)
        , mysqli_real_escape_string($link, $content)
        , mysqli_real_escape_string($link, $date)
        , mysqli_real_escape_string($link, $image)
        , mysqli_real_escape_string($link, $image2)
        , mysqli_real_escape_string($link, $image3)
        , mysqli_real_escape_string($link, $image4)
        , mysqli_real_escape_string($link, $image5)
        , mysqli_real_escape_string($link, $image6)
        , mysqli_real_escape_string($link, $image7)
        , mysqli_real_escape_string($link, $image8)
        , mysqli_real_escape_string($link, $image9), $id);

    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}

function articles_delete($link, $id)
{
    $id = (int)$id;
    if ($id == 0)
        return false;
    $query = sprintf("DELETE FROM news WHERE id_news='%d'", $id);
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}

function start_news($countNewsOnPage)
{
    if (!isset($_REQUEST['startPage'])) {
        return $startNewsOnPage = 0;
    } else {
        return $startNewsOnPage = $_REQUEST['startPage'] * $countNewsOnPage - $countNewsOnPage;
    }
}