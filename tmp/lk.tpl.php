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
    if($result->data_finish<=$today) {
        $status = "VIP";
    }
    else{
        $status = "Обыватель";
    }
}
else{
    $status = "Обыватель";
}
?>

<div id= "lk">
<div id = "lk-profilebox">
	<p id="lk-name"><?=$result->name;?></p>
	<p>Email: <span id = "lk-status"><?=$result->email;?></span></p>
	<p>Текущий статус: <span id = "lk-status"><?=$status?></span></p>
	<p>Страна: <span id = "lk-status"><?=$result->country;?></span></p>
	<p>Конец подписки: <span id = "lk-status"><?//Дата конца подписки?></span></p>
	<a id="lk-edit" href = "profile">Редактировать<a>
	<a href="logout" class = "login-button login-bigbutton" id = "exit-button">Выход из аккаунта</a>
</div>
<div id = "lk-followbox">
	<form> <? //Колдуй с этой формой как пожелаешь?>
		<div class = "lk-follow-choise">
			<div class = "lk-follow-time">День </div>
			<div class= "lk-follow-cost"> 500 рублей </div>
			<input type = "submit" class = "login-button" value= "Купить"/>
		</div>
		
		<div class = "lk-follow-choise">
			<div class = "lk-follow-time">Неделя</div>
			<div class= "lk-follow-cost"> 2000 рублей </div>
			<input type = "submit" class = "login-button" value= "Купить"/>
		</div>
		
		<div class = "lk-follow-choise">
			<div class = "lk-follow-time">Месяц</div>
			<div class= "lk-follow-cost"> 4000 рублей </div>
			<input type = "submit" class = "login-button" value= "Купить"/>
		</div>
		
	</form>
</div>

	
</div>
