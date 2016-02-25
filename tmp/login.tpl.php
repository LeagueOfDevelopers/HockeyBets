<div id="login-form">
<form class="pure-form" method="post">
		<p id = "email-label" class = "login-label">Введите корректный email</p>
        <input type="email" name="email"  id = "email" class="textfield" placeholder="Ваш Email" size="35">
		<p id = "password-label" class = "login-label">Пароль должен содержать минимум 6 символов</p>
        <input type="password" placeholder="Ваш пароль" id ="password" class="textfield" name="password" size="35">
        <label for="remember">
            <input id="check" name="remember" value="1" type="checkbox"> <label class= "checkbox" for="check"></label> <span>Запомнить меня</span>
        </label>
		<button type="submit" class="login-submit" name="login">Войти в кабинет</button>
        <a href="recover"class="login-button recover-button">Забыл пароль</a> <a href="signup" class="login-button signup-button">Регистрация</a>
        
		
</form>
</div>


