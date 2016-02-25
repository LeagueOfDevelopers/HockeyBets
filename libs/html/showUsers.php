<?php
$return .= "<tr><td>{$result->id}</td><td>{$result->email}</td>
			             <td>{$result->country}</td><td>{$status}</td>
			             <td>".date('d-m-Y', $result->date_register)."</td>
			             <td><a href='profile/$result->id'> Редактировать</a><span> ||</span>
			             <a href='deleteprofile/$result->id'>Удалить</a></td></tr>";
/**
 * Вывод списка пользователей
 **/