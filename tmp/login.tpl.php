<form class="pure-form" method="post">
    <fieldset>
        <legend>Введите данные для входа</legend>

        <input type="email" name="email" class="email" placeholder="Ваш Email" size="35"><br><br>
        <input type="password" placeholder="Ваш пароль" class="password" name="password" size="35">
        <br><br>
        <label for="remember">
            <input id="remember" name="remember" value="1" type="checkbox"> Запомнить меня
        </label>
    <br><br>
        <a href="/<?=DIR;?>/recover">Забыл пароль</a>  || <a href="/<?=DIR;?>/signup">Регистрация</a>
        <br><br>
        <button type="submit" class="pure-button pure-button-primary" name="login">Войти в кабинет</button>
    </fieldset>
</form>