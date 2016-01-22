<?php
 $data = new data();
 $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
 $result = $data->showProfile($id);
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
		Возраст:<br>
		<input type="text" name="age" size="35" value="<?=$result->age;?>">
	</p>
	<p>
		Страна:<br>
		<input type="text" name="country" size="35" value="<?=$result->country;?>">
		<input type="hidden" name="id" value="<?php echo $id;?>">
	</p>
 <button type="submit" class="pure-button pure-button-primary" name="profile">Сменить профиль</button>

</form>
