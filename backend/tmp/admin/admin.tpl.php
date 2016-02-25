<?php
$data = new Data();
if(!$result){
    $stringurl1 = str_replace("/index.php", "", HTTP_PATH);

    exit("<p>Данной директории не существует. Ошибка 404</p>
<br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться назад'/>");
}
?>