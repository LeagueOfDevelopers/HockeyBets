<?php
/**
 *	 VIP-Новости (выборка данных)
 **/
$return .= "
										<div class = 'news-block'>
											<a href='view-news/$result->id'>
												<div class = 'news-block-image' style = 'background-image: url({$result->img})'> </div>
												<div class ='news-block-title'> {$result->title}</div>
											</a>
										</div>";