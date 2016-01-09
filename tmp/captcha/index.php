<?php
  session_start();

  if(!empty($_POST)){

  if($_SESSION['captcha'] == $_POST['captcha']){
  	 echo "Это верный ответ";

  }else{
  	echo "Вы ввели неверный ответ";
  }
    exit;
  }

?>
<form method="post">
<p>Введите результат: <br>
	<img src="img.php">
	<br>
	<input type="text" size="35" name="captcha">

</p>
<input type="submit" value="Готово" name="button">
</form>

