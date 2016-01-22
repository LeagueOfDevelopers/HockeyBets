<?php
$data = new data();
$id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
$result = $data->news($id);
?>
<div>Привет</div>
