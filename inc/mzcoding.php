<?php

class Mzcoding{
	/**
	 * Инициализация скрипта
	 * */
	public static function init(){
	  //Подключаем конфигурацию
	  require dirname(__FILE__).'/config.php';
	  new route();
	  //Выводим шаблон
	  $tmp->show_display('main'); 	
	}
}
