<?php
//константы
// адрес сервера
define('MYSQL_SERVER','localhost');
// имя пользователя
define('MYSQL_USER','ttgomel3_ttgomel');
// пароль
define('MYSQL_PASSWORD','m8nI3j7rF0');
// имя базы данных
define('MYSQL_DB','ttgomel3_ttgomel');


//функция подключения к серверу
function db_connect(){
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
    or die("Ошибка " . mysqli_error($link));
    if (!mysqli_set_charset($link,"utf8")){
        printf("Error: ".mysqli_error($link));
    }
    return $link;
}

?>
