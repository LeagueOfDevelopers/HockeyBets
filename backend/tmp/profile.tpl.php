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

<form method="post" class="pure-form">
	<p>
		E-mail:<br>
		<input type="email" name="email" size="35" value="<?=$result->email;?>">
	</p>
	<p>
		Пароль: <br>
		<input type="password" name="password" size="35" value=""><br>
		<em>Оставьте поле пустым, если не хотите менять пароль! </em>
	</p>
	<p>
		Имя:<br>
		<input type="text" name="name" size="35" value="<?=$result->name;?>">
	</p>
	<p>
		Страна:<br>
		<input type="text" name="country" size="35" value="<?=$result->country;?>">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="idfollow" value="<?=$result->id_follow;?>" >
	</p>
	<p><?php
		if($result->id_follow == 0){
			echo "Вы еще не приобрели подписку!<br><br>";
		}

		if($data->checkAdmin(($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'])){
			if($result->status ==1){
				echo "	<p>
				  	Статус пользователя:<br><br>
				  	<input name='status-pr' type='radio' value='1' checked><a>Администратор</a>
				  	<input name='status-pr' type='radio' value='0' ><a>Пользователь</a>
					</p>";
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
				echo "	<p>
				  	Статус пользователя:<br><br>
				  	<input name='status-pr' type='radio' value='1'><a>Администратор</a>
				  	<input name='status-pr' type='radio' value='0' checked><a>Пользователь</a>
					</p>";
				echo '<script>
					  window.onclick = function onclickRadio() {
							  var nameRadio = document.getElementsByName("status-pr");
							  for (var i = 0; i < nameRadio.length; i++) {
								  if (nameRadio[i].type === "radio" && nameRadio[i].checked) {
									  rezultatRadio = nameRadio[i].value;
								  }
							  }
							  if(rezultatRadio == "1"){
								  alert("Вы точно наделить пользователся правами админа? Будьте внимательны, ибо простой пользователь моежт получить доступ к Админ-зоне");
							  }
					  }
					 </script>';
			}
			if($result->id_follow != 0) {
				echo "
				<p>Дата начала подписки:</p> <input type='date' name='calendar-begin' value='$result3->data_begin'><br>
				<p>Дата конца подписки: </p> <input type='date' name='calendar-finish' value='$result3->data_finish''><br><br>
				<em>Чтобы удалить подписку у пользователя, достаточно поставить дату конца подписки на прошедшую дату.</em><br>
				<em>Подписка автоматически удалится при следующем посищении юзера сайта</em><br><br>
				";
			}
		}
		?>

 <button type="submit" class="pure-button pure-button-primary" name="profile">Сменить профиль</button>
 <br><br><input class="button-warning pure-button" onclick="window.history.back();" type="button" value="Вернуться"/>

</form>



