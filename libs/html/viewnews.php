<?php
/**
 * Вывод единичной новости по клику на заголовок
 **/
$return .= "				<div>
								<img src='{$result->img}' alt='Картинка к новости' id='view-news-img'>
								<div id = 'view-news-title'>{$result->title}</div>
							</div>
							<div class = 'clear'></div>
								<p>{$result->text}</p>
			             		<p id = 'view-news-date'>{$result->date}</p>
			             		";