<?php

class Route {
   private static $tmp;
   public function __toString(){}
   public function __construct(){
       self::$tmp = new tmp();   
       self::dispatcher();   
	   self::data(); 
	}
   /**
    * Роутирование данных
    * */
   public static function dispatcher(){
	   //СОздаю переменную, которую если что я использовал вместо HTTP_PATH
	   $stringurl="http://hockeybets/";
     if(isset($_GET['route']) && !empty($_GET['route'])){
     	$route = explode("/", strip_tags($_GET['route']));
		$data  = new Data();
		if(count($route) > 1){
			switch($route[0]){
				case "activate":
				 $activate_key = trim($route[2]);
			     $id = intval($route[1]);		
				 
				 if($data->activate_account($id, $activate_key)){
				   self::location($stringurl.'login', 3);
				   exit("Аккаунт успешно активирован!" . nl2br("\n"). 
				        "Через несколько минут, вас перенаправит на страницу авторизации...");
				 }		
				 else{ 
				   exit("Произошла ошибка при активации акаунта! Пожалуйста, обратитесь к Администрации сайта.");	
				 }
				break;
				
					
			}
				
		}else{
			switch($route[0]){
				case "signup":
				  return "signup";
				break;
				case "login":
					return "login";
				break;
				case "users":
					return "users";
				break;
				case "profile":
					return "profile";
				break;
				case "recover":
					return "recover";
			   break;				
				case "logout":
					self::location($stringurl, 1);
					$data->logout();
				break;		
			}
		}
     }
	 
   }
   /**
    * Работа с данными POST / COOKIE / SESSION
    * */
   public static function data(){
   	try{
		//СОздаю переменную, которую если что я использовал вместо HTTP_PATH
	   $stringurl="http://hockeybets/";
   	 if(isset($_POST) && !empty($_POST)){
   	 	$data = new Data();
   	 	if(isset($_POST['signup'])){
   	 		if($data->signup($_POST)){
   	 		 die("Успешная регистрация! На ваш E-mail отправлено письмо с инструкцией по активации аккаунта");	
   	 		}else{
   	 			echo "<div class='error'>Произоша ошибка в момент регистрации!</div>";
   	 		}	
   	 	}
		if(isset($_POST['login'])){
			if($data->login($_POST)){
						self::location($stringurl);
					}else{
						echo "<div class='error'>Ошибка при входе</div>";
					}
		}
		if(isset($_POST['recover'])){
			$email = validate::clear($_POST['email']);
			if($data->recover($email)){
				die("На ваш e-mail отправлен новый пароль!");
			}
		}
		if(isset($_POST['profile'])){
			if($data->editProfile($_POST)){
				echo "<center><strong>Профиль успешно изменен!</strong></center>";
			}else{
				echo "<div class='error'>Профиль успешно изменен!</div>";
			}
		}
   	 }
	 
	}catch(Exception $e){
		echo "<div class='error'>".$e->getMessage()."</div>";
	
	} 
   } 
   /**
	 * Редирект
	 * */
	 public static function location($url, $time = 0){
	 	if($time == 0)
		  @header("Location:" . $url);
		else 
		  @header("Refresh:". $time . ";url=". $url);	
	 }
}


