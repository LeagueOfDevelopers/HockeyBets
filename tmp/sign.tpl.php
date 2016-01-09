<form class="pure-form" method="post">
    <fieldset>
        <legend>Регистрация в несколько кликов...</legend>

<br>
        <p><em class='result_email'></em></p>
        <input type="email" class="email" name="email" placeholder="Ваш Email" size="35" required>
        <p><em class='result_password'></em></p>
        <input type="password" placeholder="Ваш пароль" class='password' name="password" size="35" required > <br><br>
  
        <input type="text" name="name" placeholder="Ваше имя"  size="35"><br><br>
        <br><br>
        <img src="tmp/captcha/img.php">
        <br>
        <input type="text" name="captcha" placeholder="Введите ссуму чисел" size="35">
        <br><br>
     <p><strong>Внимание!</strong> - После регистрации, на ваш email прийдет активационное письмо..</p>
        <br><br>
        <button type="submit" name="signup" class="pure-button pure-button-primary">Зарегистрироваться</button>
       	
    </fieldset>
  

</form>
<br>
       <h2>ИЛИ</h2>
       <br>
        <a href="/<?=DIR?>/login">
        	<button class="button-warning pure-button">Войти в кабинет</button>
        </a> 