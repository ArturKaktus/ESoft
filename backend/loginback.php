<?
session_start();

include 'db.php';

if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($db,"SELECT id, pass, name, status FROM users WHERE login='".mysqli_real_escape_string($db,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);
    // Сравниваем пароли
    if($data['pass'] === md5($_POST['password']))
    {
        $_SESSION['userId'] = $data['id'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['userStatus'] = $data['status'];

        header("Location: /index.php"); 
        exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
else if(isset($_POST['reg']))
{
    header("Location: /reg.php"); 
    exit();
}
?>