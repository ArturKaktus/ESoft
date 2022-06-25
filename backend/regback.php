<?
// Страница регистрации нового пользователя

include 'db.php';

if(isset($_POST['submit']))
{
    $err = [];

    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($db, "SELECT id FROM users WHERE login='".mysqli_real_escape_string($db, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $patronymic = $_POST['patronymic'];
        $status = $_POST['status'];

        $login = $_POST['login'];
        // Убераем лишние пробелы и делаем хеширование
        $password = md5(trim($_POST['password']));

        mysqli_query($db,"INSERT INTO users SET 
        name='".$name."',
        surname='".$surname."',
        patronymic='".$patronymic."',
        login='".$login."', 
        pass='".$password."',
        status='".$status."'
        ");
        header("Location: login.php"); exit();
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
?>