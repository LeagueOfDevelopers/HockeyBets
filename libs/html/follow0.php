<?php
/**
 * Работа с подпиской
 **/
echo '
<br>
<div id = "lk-followbox" >
	<form method="post">
	<div> Вы еще не оформили подписку! Выберете одну из них!</div><br>
		<div class = "lk-follow-choise" style="text-align: center;">
			<div class = "lk-follow-time">День </div>
			<div class= "lk-follow-cost"> 500 рублей </div>
			<div > <input name="myfollow" type="radio" value="500" checked="checked";></div>

		</div>
		<div class = "lk-follow-choise" style="text-align: center;">
			<div class = "lk-follow-time">Неделя</div>
			<div class= "lk-follow-cost"> 2000 рублей </div>
			<div ><input name="myfollow" type="radio" value="2000"></div>

		</div>
		<div class = "lk-follow-choise" style="text-align: center;">
			<div class = "lk-follow-time">Месяц</div>
			<div class= "lk-follow-cost"> 4000 рублей </div>
			<div style="text-align: center;"><input name="myfollow" type="radio" value="4000" ></div>
		</div>
		<input name="id" type="hidden" value="'.$id.'" >
		<div style="text-align: center;"> <input type = "submit" name="pay" class = "login-button" value= "Купить"/></div>
	</form>
</div>';