<?php
  $data = new data();
$result = $data->checkAdmin($id);

if(!$result){
	$stringurl1 = str_replace("/index.php", "", HTTP_PATH);

	exit("<p>Данной директории не существует. Ошибка 404</p>
<br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться назад'/>");
}
?>
<table width="80%" class="pure-table">
	<thead>
	<tr><th>ID</th><th>email</th><th>страна</th><th>статус</th><th>дата регистрации</th><th>выбрать</th></tr>
	</thead>
	<tbody>
	<?php echo $data->showUsers(); ?> 
	</tbody>
</table>