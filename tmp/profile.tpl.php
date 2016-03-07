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

?>

<form method="post" id="login-form">
	<p>E-mail:</p>
		<input type="email" name="email" class="textfield" size="35" value="<?=$result->email;?>">
	
	<p>Пароль:</p>
		<input type="password" name="password" class="textfield" size="35" value=""><br>
		<em>Оставьте поле пустым, если не хотите менять пароль! </em>

	<p>Имя:</p>
		<input type="text" name="name" size="35" class="textfield" value="<?=$result->name;?>">
	<p>Страна:</p>
		<input type="text" name="country" size="35" class="textfield" value="<?=$result->country;?>">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="idfollow" value="<?=$result->id_follow;?>" >

	<p><?php
		if($result->id_follow == 0){
			echo "Вы еще не приобрели подписку!<br><br>";
		}

		if($data->checkAdmin(($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'])){
			if($result->status ==1){
				echo "	
				<p>Статус пользователя:</p>
					<div id = 'radio-set'>
						<input name='status-pr' id = 'radio1'  type='radio' value='1' checked><label class = 'radio-button' for = 'radio1' >Администратор</label>
						<input name='status-pr' id = 'radio2'  type='radio' value='0' ><label class = 'radio-button' for = 'radio2'>Пользователь</label>
					</div>";
				echo '<script>
					  window.onclick = function onclickRadio() {
							  var nameRadio = document.getElementsByName("status-pr");
							  for (var i = 0; i < nameRadio.length; i++) {
								  if (nameRadio[i].type === "radio" && nameRadio[i].checked) {
									  rezultatRadio = nameRadio[i].value;
								  }
							  }
							  if(rezultatRadio == "0"){
								  alert("Вы точно хотите лишить Админа прав? Будьте внимательны, если это ваш профиль, то вы лишитесь доступа к Админ-зоне!");
							  }
					  }
					 </script>';
			}
			else{
				echo "	<p>Статус пользователя:</p>
					<div id = 'radio-set'>
						<input name='status-pr' id = 'radio1'  type='radio' value='1'><label class = 'radio-button' for = 'radio1' >Администратор</label>
						<input name='status-pr' id = 'radio2'  type='radio' value='0' checked><label class = 'radio-button' for = 'radio2'>Пользователь</label>
					</div>";
				echo '<script>
					  window.onclick = function onclickRadio() {
							  var nameRadio = document.getElementsByName("status-pr");
							  for (var i = 0; i < nameRadio.length; i++) {
								  if (nameRadio[i].type === "radio" && nameRadio[i].checked) {
									  rezultatRadio = nameRadio[i].value;
								  }
							  }
							  if(rezultatRadio == "1"){
								  alert("Вы точно наделить пользователся правами админа? Будьте внимательны, т.к. простой пользователь моежт получить доступ к Админ-зоне");
							  }
					  }
					 </script>';
			}
			if($result->id_follow != 0) {
				echo "
				<p>Дата начала подписки:</p> <input type='date' class = 'datepicker' name='calendar-begin' value='$result3->data_begin'><br>
				<p>Дата конца подписки: </p> <input type='date' class = 'datepicker' name='calendar-finish' value='$result3->data_finish''><br><br>
				<em>Чтобы удалить подписку у пользователя, достаточно поставить дату конца подписки на прошедшую дату.</em><br>
				<em>Подписка автоматически удалится при следующем посищении юзера сайта</em>
				";
			}
		}
		?>

 <button type="submit" class="login-button login-bigbutton" name="profile">Изменить информацию</button>

</form>



