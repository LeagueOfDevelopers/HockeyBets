<?php
$data = new Data();
$id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
$result = $data->checkAdmin($id);

if($result){
    echo "<li><a href='users'>Управление пользователями</a></li>";
    echo "<li><a href='m-news'>Управление новостями</a></li>";
}

?>