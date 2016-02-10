<form id="login-form" method="post">
		<p id = "email-label" class = "login-label">Введите корректный email</p>
        <input type="email" id = "email" class="textfield" name="email" placeholder="Ваш Email" size="35" required>
        <p id = "password-label" class = "login-label">Пароль должен содержать минимум 6 символов</p>
		<input type="password" id = "password" placeholder="Ваш пароль" class='textfield' name="password" size="35" required >
        <input type="text" name="name" placeholder="Ваше имя" class = "textfield" size="35">
        <img src="tmp/captcha/img.php">
        <br>
        <input type="text" name="captcha" class = "textfield" placeholder="Введите ссуму чисел" size="35">
        <br><br>
     <p><strong>Внимание!</strong> - После регистрации, на ваш email прийдет активационное письмо..</p>
        <button type="submit" name="signup" class="login-submit">Зарегистрироваться</button>
		<a href="login" class="login-bigbutton">Уже есть аккаунт?</a>
</form>
