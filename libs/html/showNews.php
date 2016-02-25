<?php
/**
 * Вывод списка новостей для Админа
 **/
$return .= "<tr><td>{$result->id}</td><td>{$result->title}</td>
							 <td>{$status}</td>
							 <td>{$result->date}</td>
							 <td><a href='editnews/$result->id'> Редактировать</a><span> ||</span>
							 <a href='deletenews/$result->id'> Удалить</a></td></tr>";