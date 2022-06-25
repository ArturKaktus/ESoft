<?php include 'backend/loginback.php';?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>  
    <form method="POST">
        <input name="login" type="text" placeholder="Логин"><br>
        <input name="password" type="password" placeholder="Пароль"><br>
        <input name="submit" type="submit" value="Войти">
        <input name="reg" type="submit" value="Регистрация">
    </form>
</body>
</html>

