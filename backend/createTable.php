<?php
    session_start();
    date_default_timezone_set('Asia/Yekaterinburg');

    include 'db.php';

    if($_POST['type'] == 'all')
    {
        
        if(isset($_SESSION['userStatus']) == '1')
        {
            echo '
            <table class="table_sort">
                <thead>
                    <tr>
                        <th>Задача</th>
                        <th>Статус</th>
                        <th>Дата окончания</th>
                    </tr>
                </thead>
                <tbody>';
                $query = mysqli_query($db, "SELECT * FROM tasks ORDER BY tasks.datecreate DESC");
                $data = mysqli_fetch_assoc($query);         
                    do
                    {
                        $title = $data['title'];
                        $text = $data['text'];
                        $dateend = $data['dateend'];
                        $priority = $data['priority'];
                        $status = $data['status'];
                        $creator = $data['creator'];
                        echo'
                        <tr class="'; if($priority == 1){echo 'prlow"';} elseif($priority == 2){echo 'prmedium"';} elseif($priority == 3){echo 'prhigh"';} echo'>
                            <td>'.$title.'<br>'.$text.'</td>
                            <td>'.$status.'</td>
                            <td>'.$dateend.'</td>
                        <tr>
                        ';
                    }
                    while($data = mysqli_fetch_assoc($query));
                echo '<tbody>
            </table>
            ';
        }
        if(isset($_SESSION['userStatus']) != 1)
        {
            $status = $_POST['userStatus'];
            $user = $_SESSION['userId'];
            echo '
            <table class="table_sort">
                <thead>
                    <tr>
                        <th>Задача</th>
                        <th>Статус</th>
                        <th>Дата окончания</th>
                    </tr>
                </thead>
                <tbody>';
                    $query = mysqli_query($db, "SELECT * FROM tasks WHERE respons = ".$user."");
                    $data = mysqli_fetch_assoc($query);         
                    do
                    {
                        $title = $data['title'];
                        $text = $data['text'];
                        $dateend = $data['dateend'];
                        $priority = $data['priority'];
                        $status = $data['status'];
                        $creator = $data['creator'];
                        echo'
                        <tr class="'; if($priority == 1){echo 'prlow"';} elseif($priority == 2){echo 'prmedium"';} elseif($priority == 3){echo 'prhigh"';} echo'>
                            <td>'.$title.'<br>'.$text.'</td>
                            <td>'.$status.'</td>
                            <td>'.$dateend.'</td>
                        <tr>
                        ';
                    }
                    while($data = mysqli_fetch_assoc($query));
                echo '<tbody>
            </table>
            ';
        }
    }

    if($_POST['type'] == 'resp')
    {
        $query = mysqli_query($db, "SELECT * FROM tasks ORDER BY tasks.respons ASC");
        $data = mysqli_fetch_assoc($query);
        echo '
            <table class="table_sort">
                <thead>
                    <tr>
                        <th>Задача</th>
                        <th>Статус</th>
                        <th>Дата окончания</th>
                        <th>Ответсвенный</th>
                    </tr>
                </thead>
                <tbody>';
        do
        {
            $title = $data['title'];
            $text = $data['text'];
            $dateend = $data['dateend'];
            $priority = $data['priority'];
            $status = $data['status'];
            $creator = $data['creator'];
            $respons = $data['respons'];
            echo'
            <tr class="'; if($priority == 1){echo 'prlow"';} elseif($priority == 2){echo 'prmedium"';} elseif($priority == 3){echo 'prhigh"';} echo'>
                <td>'.$title.'<br>'.$text.'</td>
                <td>'.$status.'</td>
                <td>'.$dateend.'</td>
                <td>'; 
                $querydoby = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = ".$respons."");
                $datadoby = mysqli_fetch_assoc($querydoby);
                //print_r($datadoby);
                echo ''.$datadoby['name'].' '.$datadoby['surname'].'';
                echo '</td>
            <tr>
            ';
        }
        while($data = mysqli_fetch_assoc($query));
        echo '<tbody>
            </table>
            ';
    }
    
    if($_POST['type'] == 'today')
    {
        $datenow = date("Y-m-d");

        echo '
            <table class="table_sort">
                <thead>
                    <tr>
                        <th>Задача</th>
                        <th>Статус</th>
                        <th>Дата окончания</th>
                    </tr>
                </thead>
                <tbody>';
                $query = mysqli_query($db, "SELECT * FROM tasks WHERE dateend = '".$datenow."' ORDER BY id ASC");
                
                if($query)
                {
                    $data = mysqli_fetch_assoc($query);         
                    do
                    {
                        $title = $data['title'];
                        $text = $data['text'];
                        $dateend = $data['dateend'];
                        $priority = $data['priority'];
                        $status = $data['status'];
                        $creator = $data['creator'];
                        echo'
                        <tr class="'; if($priority == 1){echo 'prlow"';} elseif($priority == 2){echo 'prmedium"';} elseif($priority == 3){echo 'prhigh"';} echo'>
                            <td>'.$title.'<br>'.$text.'</td>
                            <td>'.$status.'</td>
                            <td>'.$dateend.'</td>
                        <tr>
                        ';
                    }
                    while($data = mysqli_fetch_assoc($query));
                echo '<tbody>
            </table>
            ';
                }
    }

    if($_POST['type'] == 'toweek')
    {
        $datenow = date("Y-m-d");
        $dateweek = date("Y-m-d", strtotime("$datenow +7 day"));


        echo '
            <table class="table_sort">
                <thead>
                    <tr>
                        <th>Задача</th>
                        <th>Статус</th>
                        <th>Дата окончания</th>
                    </tr>
                </thead>
                <tbody>';
                $query = mysqli_query($db, "SELECT * FROM tasks WHERE dateend < '".$dateweek."' ORDER BY id ASC");
                if($query)
                {
                    $data = mysqli_fetch_assoc($query);         
                    do
                    {
                        $title = $data['title'];
                        $text = $data['text'];
                        $dateend = $data['dateend'];
                        $priority = $data['priority'];
                        $status = $data['status'];
                        $creator = $data['creator'];
                        echo'
                        <tr class="'; if($priority == 1){echo 'prlow"';} elseif($priority == 2){echo 'prmedium"';} elseif($priority == 3){echo 'prhigh"';} echo'>
                            <td>'.$title.'<br>'.$text.'</td>
                            <td>'.$status.'</td>
                            <td>'.$dateend.'</td>
                        <tr>
                        ';
                    }
                    while($data = mysqli_fetch_assoc($query));
                echo '<tbody>
            </table>
            ';
                }
    }
?>