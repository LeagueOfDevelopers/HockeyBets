<?php
/**
 * Работа с подпиской
 **/
echo '<form class="pure-form" method="post">
						  <fieldset>
							<legend>Выбор подписки</legend>
							<br>
							<input name="myfollow" type="radio" value="500"><a>VIP Подписка на 1 день - 500 рублей</a><br>
							<input name="myfollow" type="radio" value="2000"><a>VIP Подписка на 7 дней - 2000 рублей</a><br>
							<input name="myfollow" type="radio" value="4000"><a>VIP Подписка на 31 день - 4000 рублей</a><br><br>
							<input name="id" type="hidden" value="'.$id.'" >
							<button type="submit" name="pay" class="pure-button pure-button-primary">Перейти к оплате</button>
						  </fieldset>
					  </form>';