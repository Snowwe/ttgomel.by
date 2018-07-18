<!--подключаем стили общие для всех страниц-->
<link rel="stylesheet" href="../../css/style.css">

<?php

// подключаем скрипт,где хранятся общие данные
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/changeInfo.php';

if (!empty($_POST['name']) and !empty($_POST['phone']) and !empty($_POST['mail'])
    and !empty($_POST['message'])) {
    $to = $userMail; // email получателя данных из формы.
    $subject = "Письмо с ttgomel.by"; // тема полученного email
    $name = trim(strip_tags($_POST['name']));//полученное из формы name
    $phone = trim(strip_tags($_POST['phone']));//полученное из формы phone
    $mail = trim(strip_tags($_POST['mail']));//полученное из формы email
    $message = trim(strip_tags($_POST['message']));//полученное из формы сообщение
    $headers = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
    $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента

    //отправляет получателю на емайл значения переменных
    mail($to
        , $subject
        , 'Вам написал (-а): ' . $name. "\r\n" .'Его (её) номер: ' . $phone . "\r\n".'Его (её) почта: ' . $mail . "\r\n". 'Его (её) сообщение: ' . $message
        , $headers);

    echo "$name! <br> Ваше сообщение успешно отправлено!<br> Если Вы корректно указали Вашу контактную информацию, то получите ответ в ближайшее время<br> $back";
    $_GET['name'] = "";
    exit;
} else {
    echo "Для отправки сообщения заполните все поля! $back";
    exit;
}


?>