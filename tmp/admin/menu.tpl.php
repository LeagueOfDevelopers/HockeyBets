<?php
$data = new data();
$id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
$result = $data->checkAdmin($id);
?>

<?php if($result):?>
<div class = "admin-menu">
	<a href='users' class = "admin-button">Управление пользователями</a>
	<a href='m-news' class = "admin-button">Управление новостями</a>
</div>
<?php endif;?>