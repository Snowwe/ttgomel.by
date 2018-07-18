<?php
function search($query, $link)
{ // Обработка поискового запроса
    $text = ''; // Переменная для вывода текста
//  Проводим фильтрацию данных
    $query = trim($query); // Обрезаем пробелы и спецсиволы
    $query = strip_tags($query); // Удаляем HTML и PHP теги
    $query = mysqli_real_escape_string($link, $query); // Экранируем специальные символы
    if (!empty($query)) { //Если поисковый запрос не пустой
        if (strlen($query) < 4) { // Если запрос меньше 4 символов
            $text = '<p>короткий поисковый запрос.</p>';
        } // Сообщение об ошибке
        else if (strlen($query) > 128) { // Если более 128 символов
            $text = '<p>длинный поисковый запрос.</p>';
        } // Сообщение об ошибке
        else { // Если всё верно
            // Формируем строку поискового запроса
            $sql = "SELECT id_news, title, content 
                    FROM news 
                    WHERE title LIKE '%$query%' OR content LIKE '%$query%'";
            $result = mysqli_query($link, $sql); // =======================================================================> И выполняем его
            $rows = mysqli_num_rows($result); // Определим колличество найденных совпадений
            if ($rows > 0) { // Если совпадения есть
                $row = mysqli_fetch_assoc($result); // Получаем ассоциативный массив
                // И начинаем формировать строку поисковой выдачи
                $text .= '<p>По вашему запросу  <strong>' . $query . '</strong> найдены ' . $rows . ' совпадения.</p><br>';

                do { //  Динамический вывод всех совпадений
                    $text .= '<h4> <a href="http://ttgomel.by/index.php?page=fullNews&id= ' . $row['id_news'] . '" class="titleNews">' . $row['title'] . '</a></h4>';
                    $shortContent = trim(mb_strimwidth($row['content'], 0, 280, "..."));
                    //nl2br - Вставляет HTML-код разрыва строки перед каждым переводом строки
                    $text .= '<p>' . nl2br($shortContent) . '</p> <br>';
                } while ($row = mysqli_fetch_assoc($result));
            } // Делаем это пока у нас есть результаты
            else { // Если найти совпадение не удалось
                $text = '<p>По вашему запросу ничего не найдено.</p>';
            }
        }
    } // Сообщение о неудаче
    else { // Если запрос был пустой
        $text = '<p>Задан пустой поисковый запрос.</p>';
    } // Сообщение об ошибке
    return $text;
} // Возвращаем сформированную строку поисковой выдачи