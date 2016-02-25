<?php
$data = new Data();
$result = $data->checkAdmin($id);
if(!$result){
    $stringurl1 = str_replace("/index.php", "", HTTP_PATH);

    exit("<p>Данной директории не существует. Ошибка 404</p>
<br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться назад'/>");
}
?>
<li><a href='addnews'>Добавить новую новость</a></li><br>
<table width="80%" class="pure-table">
    <thead>
    <tr><th>ID</th><th>заголовок</th><th>статус</th><th>дата добавления</th><th>Выбрать</th></tr>
    </thead>
    <tbody>
    <?php echo $data->showNews(); ?>
    </tbody>
</table>

