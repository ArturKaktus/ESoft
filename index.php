<?php
session_start();
date_default_timezone_set('Asia/Yekaterinburg');
$userId = $_SESSION['userId'];
if (is_null($userId)) {
    header('Location: /login.php');
    exit(0);
}
include 'backend/indexback.php';
include 'backend/header.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <title>Document</title> 
</head>
<body>
    <div>
    <input name="createtask" id="createtask" type="submit" value="Создать задачу"><br>
    </div>

    <div>
    <p>Группировка по дате завершения</p>
    <input name="today" type="submit" onclick="createtable('today'); return false;" value="На сегодня"><br>
    <input name="toweek" type="submit" onclick="createtable('toweek'); return false;" value="На неделю"><br>
    <!-- Не понял задание, что значит "на будущее"? это тоже самое, что и Все задачи? -->
    <input name="tofuture" type="submit" onclick="createtable('tofuture'); return false;" value="На будущее"><br> 
    </div>

    <?php
    if ($_SESSION['userStatus'] == '1')
    {
        echo '
        <div>
        <p>Группировка по ответственным</p>
        <input name="responses" type="submit" onclick="createtable(\'resp\'); return false;" value="Ответственные"><br>
        </div>
        ';
    }

    ?>
    
    
    <div>
    <p>Без группировки (мои задачи)</p>
    <input name="alltable" id="alltable" type="submit" onclick="createtable('all'); return false;" value="Вся таблица"><br>
    </div>

    <div id="table"></div>
    
    
    
    
    
    <div id="myModal" class="modal">
        <div class="modal-content">
        <form method="POST">
            <input name="title" type="text" placeholder="Заголовок"><br>
            <input name="text" type="text" placeholder="Описание"><br>
            Срок:
            <input name="calendar" type="date" ><br>
            Приоритет:
            <select name="priority">
                <option value="1">Низкий
                <option value="2">Средний
                <option value="3">Высокий
            </select><br>
            Ответственный:
            <select name="respons">
                <?php
                include 'backend/db.php'; 
                $query = mysqli_query($db,"SELECT id, name, surname FROM users WHERE status = 2"); 
                $data = mysqli_fetch_assoc($query);
                do
                {
                    echo'<option value="'.$data['id'].'">'.$data['name'].' '.$data['surname'].'';
                }
                while($data = mysqli_fetch_assoc($query))
                ?>
            </select><br>
            
            <input name="save" type="submit" value="Сохранить">
        </form>
        <span class="close">&times;</span>
        </div>
    </div>

<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("createtask");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function createtable($type) {
            jQuery.ajax({
                url: "/backend/createTable.php",
                type: "POST",
                data: {"type": $type},
                response:'text', 
                success: function(data){
                    $('#table').html(data);
                }
            })
        }
</script>
</body>
</html>