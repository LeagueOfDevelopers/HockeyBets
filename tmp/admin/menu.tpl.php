<?php
$data = new data();
$id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
$result = $data->checkAdmin($id);
?>

<li><a href='users'>Управление пользователями</a></li>
<li><a href='m-news'>Управление новостями</a></li>
