<?php
  class Validate{
  	public function __construct(){
  		
  	}
	//Проверка , авторизован ли юзер
	public static function UserStatus(){
		if(isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id']) || isset($_COOKIE['user_id'])){
			return true;
		}
		
		return false;
	}
	/**
	 * Отчищаем от тегов строковые переменные
	 * 
	 * @param <string> $field - поле
	 * @param <boolean> $mode - использовать htmlspecialchars или strip_tags
	 * 
	 */
	public static function clear($field,$mode = false){
		if($mode === true)
		  return htmlspecialchars($field);
		
		return strip_tags($field);
	}
	/**
	 * Хеширование данных
	 * */
	public static function hashInit($data){
		return hash("sha256", $data);
	}
	
	public static function EmailValidate($email){
		return true;
	}
  }
