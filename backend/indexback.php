<?php
session_start();
date_default_timezone_set('Asia/Yekaterinburg');
include 'db.php';

if(isset($_POST['save']))
{
    $title = $_POST['title'];
    $text = $_POST['text'];
    $date = $_POST['calendar'];
    $priority = $_POST['priority'];
    $respons = $_POST['respons'];
    $datenow = date("Y-m-d");
    $creator = $_SESSION['userId'];

    $result = mysqli_query($db, "INSERT INTO tasks 
    (title, text, dateend, datecreate, dateupdate, priority, status, creator, respons) 
    VALUES 
    ('".$title."','".$text."','".$date."','".$datenow."','".$datenow."','".$priority."','К выполнению','".$creator."','".$respons."')") or die ('Ошибка записи');
}

?>

