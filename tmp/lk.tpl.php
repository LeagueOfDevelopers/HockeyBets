<?php
 $data = new data();
if(isset($_SESSION['idprofile'])){
    $id = $_SESSION['idprofile'];
    $_SESSION['idprofile'] =($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
}
else {
    $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
}
$result = $data->showProfile($id);


$result2 = $data->checkAdmin(($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id']);
if($result2){
    $result3 = $data->showFollow($result->id_follow);
}
$today = date('Y-m-d');
if($result->id_follow !=0){
    $result5 = $data->showFollow($result->id_follow);
    if($result5->data_finish>=$today) {
        $status = "VIP";

        $datafinish = $result5->data_finish;
    }
    else{
        $status = "Обыватель";
        $datafinish = 0;
    }
}
else{
    $status = "Обыватель";
    $datafinish = 0;
}

$result4 = $data->follow($id);

?>

<div id= "lk" style="padding-right: 20%">
<div id = "lk-profilebox">
	<p id="lk-name"><?=$result->name;?></p>
	<p>Email: <span id = "lk-status"><?=$result->email;?></span></p>
	<p>Текущий статус: <span id = "lk-status"><?=$status?></span></p>
	<p>Страна: <span id = "lk-status"><?=$result->country;?></span></p>
    <?php if($datafinish != 0):?>
    <?php echo '<p>Конец подписки: <span id = "lk-status">'.$datafinish.'</span></p>' ; ?>
    <?php endif; ?>
    <a id="lk-edit" href = "profile">Редактировать<a>
	<a href="logout" class = "login-button login-bigbutton" id = "exit-button">Выход из аккаунта</a>
</div>
	<div ><?=$result4;?></div></br>
	
</div>
