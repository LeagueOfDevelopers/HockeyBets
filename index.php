<?php

session_start();
//Проверка версии пыхи
if(version_compare(phpversion(), '5.3.0', '<') == true){
    die ('Ваша версия PHP старее 5.3. 
          Для корректной работы скрипта, требуется версия 5.3 и выше!');
}

/**
* Константа полного пути до корня
*/
define("ROOT_DIR", dirname(__FILE__));

/**
 * Путь до папки с библиотеками (libs)
 * */
 define("LIBS", ROOT_DIR.'/libs');
 /**
  * Путь до шаблонов
  * */
  define("TMP", ROOT_DIR.'/tmp');
 

//Инициализируем скрипт
require_once ROOT_DIR.'/inc/mzcoding.php';
Mzcoding::init();
?>
