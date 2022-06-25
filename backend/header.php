<?php
    session_start();
    date_default_timezone_set('Asia/Yekaterinburg');

    $time = date('H');
    $name = $_SESSION['name'];

    switch ($time) {
        case ($time >= 6 && $time <= 12):
            echo 'Доброе утро, '.$name;
            break;
        case ($time >= 13 && $time <= 18):
            echo 'Добрый день, '.$name;
            break;
        case ($time >= 19 && $time <= 23):
            echo 'Добрый вечер, '.$name;
            break;
        case ($time >= 0 && $time <= 5):
            echo 'Доброй ночи, '.$name;
            break;
    }
?>