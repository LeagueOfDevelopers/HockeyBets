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
	   //Создаю переменную, которую если что я использовал вместо HTTP_PATH
	   $stringurl=str_replace("/index.php", "", HTTP_PATH);
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
					self::location($stringurl, 5);
				   exit("Произошла ошибка при активации акаунта! Пожалуйста, обратитесь к Администрации сайта.");	
				 }
				break;

				case "follow":
					$result = intval($route[1]);

					if($result == 1){
						self::location($stringurl, 5);
						echo "Оплата товара произошла успешно. Вы будете перенаправлены на главную страницу через 5 секунд";

						$iduser = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
						$data->activatefollow($iduser);



						// регистрационная информация (пароль #1)
						// registration info (password #1)
						$mrh_pass1 = "password_1";

						// чтение параметров
						// read parameters
						$out_summ = $_REQUEST["OutSum"];
						$inv_id = $_REQUEST["InvId"];
						$crc = $_REQUEST["SignatureValue"];

						$crc = strtoupper($crc);

						$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1"));

						// проверка корректности подписи
						// check signature
						if ($my_crc != $crc)
						{
							echo "bad sign\n";
							exit();
						}

						// проверка наличия номера счета в истории операций
						// check of number of the order info in history of operations
						$f=@fopen("order.txt","r+") or die("error");

						while(!feof($f))
						{
							$str=fgets($f);

							$str_exp = explode(";", $str);
							if ($str_exp[0]=="order_num :$inv_id")
							{
								echo "Операция прошла успешно\n";
								echo "Operation of payment is successfully completed\n";
							}
						}
						fclose($f);

						exit();
					}

					if($result == 2){
						self::location($stringurl, 5);
						echo "Вы отказались от оплаты.Вы будете перекинуты на главную страницу через 5 секунд";
						exit();
					}

					if($result == 3){

						// регистрационная информация (пароль #2)
						// registration info (password #2)
						$mrh_pass2 = "password_2";

						//установка текущего времени
						//current date
						$tm=getdate(time()+9*3600);
						$date="$tm[year]-$tm[mon]-$tm[mday] $tm[hours]:$tm[minutes]:$tm[seconds]";

						// чтение параметров
						// read parameters
						$out_summ = $_REQUEST["OutSum"];
						$inv_id = $_REQUEST["InvId"];
						$crc = $_REQUEST["SignatureValue"];

						$crc = strtoupper($crc);

						$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2"));

						// проверка корректности подписи
						// check signature
						if ($my_crc !=$crc)
						{
							self::location($stringurl, 5);
							echo "bad sign\n";
							exit();
						}

						// признак успешно проведенной операции
						// success
						echo "OK$inv_id\n";

						// запись в файл информации о проведенной операции
						// save order info to file
						$f=@fopen("order.txt","a+") or
						die("error");
						fputs($f,"order_num :$inv_id;Summ :$out_summ;Date :$date\n");
						fclose($f);
					}
				break;

				case "view-news":
					$result = intval($route[1]);
					$_SESSION['idnews'] = $result;
					$stringurl1 = str_replace("/index.php", "", HTTP_PATH);
					self::location($stringurl1.'view-news');
				break;

				case "profile":
					$result = intval($route[1]);
					$_SESSION['idprofile'] = $result;
					$stringurl1 = str_replace("/index.php", "", HTTP_PATH);
					self::location($stringurl1.'profile');
					break;

				case "deleteprofile":
					$result = intval($route[1]);
					$data->deleteProfile($result);
					$stringurl1 = str_replace("/index.php", "", HTTP_PATH);
					self::location($stringurl1.'users');
					break;

				case "editnews":
					$result = intval($route[1]);
					$_SESSION['ideditnews'] = $result;
					$stringurl1 = str_replace("/index.php", "", HTTP_PATH);
					self::location($stringurl1.'editnews');
					break;

				case "deletenews":
					$result = intval($route[1]);
					$data->deletNews($result);
					$stringurl1 = str_replace("/index.php", "", HTTP_PATH);
					self::location($stringurl1.'m-news');
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
				case "follow":
					return "follow";
					break;
				case "vip-news":
					return "vip-news";
					break;
				case "addnews":
					return "addnews";
					break;
				case "m-news":
					return "m-news";
					break;
				case "editnews":
					return "editnews";
					break;
				case "gen-news":
					return "gen-news";
					break;
				case "view-news":
					return "view-news";
					break;
				case "main":
					return "main";
					break;
				case "admin":
					return "admin";
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
	   $stringurl=str_replace("/index.php", "", HTTP_PATH);;
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
				echo "<div class='error'>Профиль не изменен!</div>";
			}
		}
		if(isset($_POST['pay'])) {
			$data->createfollow($_POST['myfollow'], $_POST['id']);
			exit($data->button($_POST['myfollow']));
		}

		 if(isset($_POST['addnews'])) {

			if($_FILES["filename"]["size"] > 1024*3*1024)
			{
				echo ("<div class='error'>Размер файла превышает три мегабайта</div>
						<br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться'/>
						");
				exit;
			}
			 $file = "tmp/img/".$_FILES["filename"]["name"];
			// Проверяем загружен ли файл
			if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
			{
				// Если файл загружен успешно, перемещаем его
				// из временной директории в конечную

				move_uploaded_file($_FILES["filename"]["tmp_name"], $file );
				if($data->addNews($file,$_POST)){
					self::location($stringurl);
				}
				else{
					echo("<div class='error'>Ошибка добавления новости</div>
						<br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться'/>
						");
				}
			} else {
				echo("<div class='error'>Ошибка загрузки файла</div>
				<br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться'/>
				");
			}


			 exit();
		 }

		 if(isset($_POST['editnews'])) {

			 if(is_uploaded_file($_FILES["filename"]["tmp_name"])){
				 if($_FILES["filename"]["size"] > 1024*3*1024)
				 {
					 echo ("<div class='error'>Размер файла превышает три мегабайта</div>
						<br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться'/>
						");
					 exit;
				 }
				 $file = "tmp/img/".$_FILES["filename"]["name"];
				 // Проверяем загружен ли файл
				 if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
				 {
					 // Если файл загружен успешно, перемещаем его
					 // из временной директории в конечную

					 move_uploaded_file($_FILES["filename"]["tmp_name"], $file );
					 if($data->editNews($file,$_POST)){
						 self::location($stringurl."m-news",2);
						 exit("Новость успешно изменена. Сейчас вас перенаправит на страницу управления новостями");
					 }
					 else{
						 echo("<div class='error'>Ошибка добавления новости</div>
						<br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться'/>
						");
					 }
				 } else {
					 echo("<div class='error'>Ошибка загрузки файла</div>
				<br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться'/>
				");
				 }
				 exit();
			 }
			 else{
				 $file = $_POST['img'];
				 if($data->editNews($file,$_POST)){

					 self::location($stringurl."m-news",2);
					 exit("Новость успешно изменена. Сейчас вас перенаправит на страницу управления новостями");
				 }
			 }
			 exit();
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


