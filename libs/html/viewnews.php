<?php
/**
 * Вывод единичной новости по клику на заголовок
 **/
$return .= "<p class = 'view-news-title'>{$result->title}</p>
								<img src='{$result->img}' alt='Картинка к новости' style='width: 25%; height: 25%;'>
								<p>{$result->text}</p>
			             		<p class = 'view-news-date'>{$result->date}</p>
			             		";