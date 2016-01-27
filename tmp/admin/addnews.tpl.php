<?php
$data = new Data();
if(!$result){
    $stringurl1 = str_replace("/index.php", "", HTTP_PATH);

    exit("<p>Данной директории не существует. Ошибка 404</p>
<br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться назад'/>");
}

?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<form method="post" class="pure-form" enctype="multipart/form-data">
    <p>
        Заголовок:<br>
        <input type="text" name="title" size="35" >
    </p>
    <p>
        Текст новости: <br>
        <div style="width: 50%;"><textarea name = "text"></textarea></div><br>
    <p>
        Статус новости:<br><br>
        <input name='status-news' type='radio' value='VIP' checked><a>VIP-Новость</a>
        <input name='status-news' type='radio' value='general' ><a>Общая</a>
    </p>
    <br><input type="file" name="filename"><br><br>

    <button type="submit" class="pure-button pure-button-primary" name="addnews"> Добавить</button>
    <br><br><input class="button-warning pure-button" onclick="window.history.back();" type="button" value="Вернуться"/>

</form>
