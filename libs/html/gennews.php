<?php
/**
 *	 Общие новости (выборка данных)
 * Чтобы выводить картинки для блоков на главной добавь строчку ниже)
 * и еще я не устанавливам им размер, в стилях поставь
 * <td><img src='{$result->img}' alt='Картинка к новости'></td><br>
 **/
$return .= "
										<div class = 'news-block'>
											<a href='view-news/$result->id'>
												<div class = 'news-block-image' style = 'background-image: url({$result->img})'> ,</div>
												<div class ='news-block-title'> {$result->title}</div>
											</a>
										</div>";