<?php
/**
 *	 VIP-Новости (выборка данных)
 **/
$return .= "
										<div class = 'news-block' style = 'background-image: url({$result->img})'>
										<a href='view-news/$result->id'>
											<div class ='news-block-title'> {$result->title}</div>
										</a>
										</div>";