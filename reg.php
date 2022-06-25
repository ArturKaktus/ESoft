<?php include 'backend/regback.php';?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form method="POST">
        <input name="name" type="text" placeholder="Имя" required><br>
        <input name="surname" type="text" placeholder="Фамилия" required><br>
        <input name="patronymic" type="text" placeholder="Отчество" required><br>

        <input name="login" type="text" placeholder="Логин" required><br>
        <input name="password" type="password" placeholder="Пароль" required><br>

        <select name="status">
                <option value="1">Руководитель
                <option value="2">Пользователь
        </select><br>
        <input name="submit" type="submit" value="Зарегистрироваться">
    </form>
</body>
</html>