<?php
  $data = new data();
?>
<table width="80%" class="pure-table">
	<thead>
	<tr><th>ID</th><th>email</th><th>страна</th><th>возраст</th><th>дата регистрации</th></tr>
	</thead>
	<tbody>
	<?php echo $data->showUsers(); ?> 
	</tbody>
</table>