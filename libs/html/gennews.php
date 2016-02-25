<?php
/**
 *	 Общие новости (выборка данных)
 * Чтобы выводить картинки для блоков на главной добавь строчку ниже)
 * и еще я не устанавливам им размер, в стилях поставь
 * <td><img src='{$result->img}' alt='Картинка к новости'></td><br>
 **/
$return .= "
										<div class = 'news-block' style = 'background-image: url({$result->img})'>
										<a href='view-news/$result->id'>
											<div class ='news-block-title'> {$result->title}</div>
										</a>
										</div>";