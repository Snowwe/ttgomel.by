<!--подключаем стили общие для всех страниц-->
<link rel="stylesheet" href="../../css/style.css">
<!--подключаем стили для страницы Календарь-->
<link rel="stylesheet" href="../../css/calendarStyle.css">

<div class="calendar">
    <?php
    // подключаем скрипт подключения к базе данных
    require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/database.php';
    //вызываем функцию подключения к БД
    $link = db_connect();

    //получем текущую дату для отображения календаря с текущего месяца
    $currentDate = date("Y-m-d");
    $currentMonth = (int)date("m");
    $strMonth = date('F');
    $currentYear = date("Y");
    $arrMonthRus = [0, "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
    $arrMonthRus_2 = [0, "января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];

    echo "<h2>КАЛЕНДАРЬ СОРЕВНОВАНИЙ НА $currentYear ГОД</h2>
<hr>";
    // выполняем операции с базой данных
    //выбираем данные, начиная с текущего месяца
    //сортируем по дате
    for ($str = 0; $str < 12; ++$str) {

        $query = "SELECT c.name, DATE_FORMAT( c.date, '%d' ) date_string, place, participants
          FROM calendar c 
          WHERE Month(Date(c.date)) = '$currentMonth' AND Year (Date (c.date))='$currentYear'
          ORDER BY c.date";

        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

        if ($result) {
            $rows = mysqli_num_rows($result); // количество полученных строк
            if ($rows > 0) {

                echo
                "  <table>
    <caption> $arrMonthRus[$currentMonth] </caption>
    <tr>
       <th class='name'>Соревнования</th>
        <th class='date'>Дата</th>
        <th class='place'>Место</th>
        <th class='participants'>Участники</th>
    </tr>";
                for ($i = 0; $i < $rows; ++$i) {

                    $row = mysqli_fetch_row($result);
                    if ($i % 2==0) {
                        echo "<tr class='rowsInfo'>";
                    } else {
                        echo "<tr class='rowsInfo color'>";
                    }

                    for ($j = 0; $j < 4; ++$j) {
                        if ($j == 1) {
                            echo "<td>$row[1]";
                            echo " $arrMonthRus_2[$currentMonth]</td>";
                        } else
                            echo "<td>$row[$j]</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        if ($currentMonth == 12) {
            $currentMonth = 1;
            ++$currentYear;

        } else
            ++$currentMonth;
    }

    // закрываем подключение
    mysqli_close($link);
    ?>

    <div class="bttf">
        <p>Ознакомиться с календарем соревнований Республики Беларусь можно
            <a href="http://bttf.by/index.php/ru/world-calendar/kalendar-2018/62-kalendar-sorevnovanij" target="_blank">
                по ссылке ...</a></p>
    </div>


    <div class="calendarFileDownload">

        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/scripts/galleryScriptPHP.php";
        $dir = $_SERVER['DOCUMENT_ROOT'] . "/pages/calendar/downloadCalendarFile/";
        $shortDir = "../pages/calendar/downloadCalendarFile/";
        $calendarFiles = get_files($dir);
        rsort($calendarFiles);
        foreach ($calendarFiles

                 as $file):
            $year = substr(explode(".", $file)[0], -4); ?>

            <p>
                <a href="<?php echo $shortDir . $file ?>" download>
                    Скачать календарь соревнований на <?php echo $year ?> год в MS Word</a>
            </p>
        <?php

        endforeach; ?>
    </div>
</div>