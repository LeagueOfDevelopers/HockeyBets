<?php
 class Data{
 	private $db;
 	public function __construct(){
 		$this->db = Connect::_self()->mysql();
    }
	/**
	 * Регистрация пользователей
	 * */
	 public function signup($data){
		 //СОздаю переменную, которую если что я использовал вместо HTTP_PATH
		 $stringurl="http://hockeybets/";
	 	if(strlen($data['password']) < 6)
		  throw new Exception('Длина пароля должна быть не менее 6 символов');
		if(empty($data['email']))
		  throw new Exception('E-mail не может быть пустым'); 
		if($data['captcha'] != $_SESSION['captcha']){
			throw new Exception("Капча введена не верно");
		}
	 	$email = validate::clear($data['email']);
		if(!$this->UniqEmail($email)) throw new Exception('Такой email уже зарегистрирован!');
		$password = validate::hashInit($data['password']);
		$name = validate::clear($data['name']);
		if(validate::EmailValidate($email) === false)
		   throw new Exception('Введите корректный email');
		$time = time();
	    //Регистрируем пользователя
	    $query = $this->db->prepare("INSERT INTO `users` (`email`,`password`,`name`,`date_register`, `activate`) 
	                                 VALUES(:email, :password, :name, $time, 0)");
		$query->bindParam(':email', $email, PDO::PARAM_STR, 155);
		$query->bindParam(':password', $password, PDO::PARAM_STR, 155);	
		$query->bindParam(':name', $name, PDO::PARAM_STR, 100);								 	
	   
	   if($query->execute()){
	    //отправляем письмо активации
	    $id = $this->db->lastInsertId();
	    $key_hash = validate::hashInit($email."::".$password);
	    $link_activate = $stringurl."activate/".$id."/".$key_hash;
	    mail::new_mail($email, "Активация аккаунта!", "Здравствуйте, вы зарегистрировались на сайте прогнозов HockeyBets \n\r
	     Для подтверждения аккаунта, кликните по ссылке активации:" .  $link_activate . "\n\r"); 
		 
	     return true;
	   }
	   
	   //Записываем в лог ошибку
	   $info = $this->db->errorInfo();
	   
	   error::ErrLog("- Ошибка PDO: ". $info[2] . "\n". __FILE__ . "\n" . __LINE__);
	  }
      /***
	   * Авторизация пользователей
	   * */
	   public function login($data){
	     if(empty($data['email']))
		  throw new Exception('E-mail не может быть пустым'); 
	   	 if(strlen($data['password']) < 5)
		  throw new Exception('Длина пароля должна быть не менее 6 символов');
		 
		 $email = validate::clear($data['email']);
		 $password = validate::hashInit($data['password']);
		 $query = $this->db->prepare("SELECT `id`,`email`, `password`,`activate` FROM `users` WHERE `email` = :email");
		 $query->bindParam(":email", $email, PDO::PARAM_STR);
		 $query->execute();
		 
		 $result = $query->fetch();
		 //Проверяем активирован ли аккаунт пользователя
		 if($result->activate == 0){
		 	throw new Exception("Ваш аккаунт не активирован!");
		 }
		 if($result->email === $email && $password === $result->password){
		 	//успех
		 	if($remember == 1){
		 		setCookie("user_id", $result->id, time() +3600 * 24 * 30);
		 	}
			$_SESSION['user']['id'] = $result->id;
			
			return true;
		 }
		 return false;
	   }
	   /**
	    * Активация аккаунта
	    * */
	    public function activate_account($id, $activate_key){
	      $query = $this->db->query("SELECT `email`, `password` FROM `users` WHERE `id` = $id");
		  $result = $query->fetch();
		  if($activate_key === validate::hashInit($result->email."::".$result->password)){
		  	if($this->db->exec("UPDATE `users` SET `activate` = 1")) return true;
		  }	
		  
		  return false;
	    }
		/**
		 * Вывод списка пользователей
		 **/
		 public function showUsers(){
		 	$query = $this->db->query("SELECT * FROM `users`");
			$return = "";
			while($result = $query->fetch()){
			  $return .= "<tr><td>{$result->id}</td><td>{$result->email}</td>
			             <td>{$result->country}</td><td>{$result->age}</td>
			             <td>".date('d-m-Y', $result->date_register)."</td></tr>";	
			} 
			
			return $return;
		 }
		 /**
		  * Проверка E-mail на уникальность
		  * */
		  public function UniqEmail($email){
		  	$query = $this->db->prepare("SELECT `id` FROM `users` WHERE `email` = :email");
			$query->bindParam(":email",$email, PDO::PARAM_STR);
			$query->execute();
			$result = $query->fetch();
			  if(empty($result->id)) return true;
			
			return false;
		  }
		  /**
		   * Востановление пароля
		   **/
		   public  function recover($email){
		   	 if(!$this->UniqEmail($email))
			    throw new Exception('Такого email адреса не существует в БД!');
			 //Генерируем новый пароль
			 $email = $this->db->quote($email);
			 $new_password = rand(10,100) . "hgkl" . rand(1,9);
			 $password = validate::hashInit($new_password);
			 //Перезаписываем пароль пользователю
			 $query = $this->db->query("UPDATE `users` SET `password` = '$password' WHERE `email` = $email");
			 if(!$query) return false;
			 //отправляем письмо пользователю с новым паролем
			 mail::new_mail($email, "Новый пароль", "Ваш новый пароль, для доступа к аккаунту\n". $new_password);
			 
			 return true;
		   }

	 		/**
	  		*	 Новости (выборка данных)
	  		**/
	        public function news($id){
				$id = intval($id);
				$query = $this->db->query("SELECT * FROM `users` WHERE `id` = $id");
				$idfollow = $query->fetch()->id_follow;
				if($idfollow > 0){

					$query2 = $this->db->query("SELECT * FROM `follow` WHERE `id` = $idfollow");

					$today = date('Y-m-d');
					$datefinish = $query2->fetch()->data_finish;
					if($datefinish >= $today){
						$query3 = $this->db->query("SELECT * FROM `news`");
						$return = "";
						while($result = $query3->fetch()){
							$return .= "<tr><td>{$result->title}</td><td>{$result->text}</td>
			             <td>{$result->date}</td><br/>";
						}

						return $return;
					}
					else{
						$query3 = $this->db->query("SELECT * FROM `news` WHERE `status`='general'");
						$return = "";
						while($result = $query3->fetch()){
							$return .= "<tr><td>{$result->title}</td><td>{$result->text}</td>
			             <td>{$result->date}</td><br/>";
						}

						echo "Ваша подписка закончилась, если хотите топовые ставки, обновите подписку";
						//нужно будет сылку на обновление подписки
						return $return;
					}
				}
				else{
					$query3 = $this->db->query("SELECT * FROM `news` WHERE `status`='general'");
					$return = "";
					while($result = $query3->fetch()){
						$return .= "<tr><td>{$result->title}</td><td>{$result->text}</td>
			             <td>{$result->date}</td><br/>";
					}

					echo "Вы еще не оформили подписку? Тогда скорее окунитесь в мир топовых ставок!";
					//нужно будет сылку на обновление подписки
					return $return;

				}

			}



		    /**
		    * Работа с подпиской
		    **/
		   public function  follow($id){
			   $id = intval($id);
			   $query = $this->db->query("SELECT * FROM `users` WHERE `id` = $id");
			   $idfollow = $query->fetch()->id_follow;
			   if($idfollow=0){

			   }

		   }




	       /**
		   * Профиль пользователя (выборка данных)
		   **/
		   public function showProfile($id){
		   	 $id = intval($id);
		   	 $query = $this->db->query("SELECT * FROM `users` WHERE `id` = $id");
			 
			 return  $query->fetch();
			 
			
		   }
		   /**
		    * Редактирование профиля пользователя
		    * */ 
		    public function editProfile($data){
		    	$id = intval($data['id']);	
		    	$query_pass = $this->db->query("SELECT `password` FROM `users` WHERE `id` = $id");
				if($data['password'] === "" || $data['password'] === 0){
					$password = $query_pass->fetch()->password;
				}else{
					$password = validate::hashInit($data['password']);
				}
		    	$query = $this->db->prepare("UPDATE `users` SET `email` = :email, `password` = :password, `name` = :name, `age` = :age, 
		    	                      `country` = :country WHERE `id` = :id");
				$query->bindParam(":email", $data['email'], PDO::PARAM_STR);
				$query->bindParam(":password", $password, PDO::PARAM_STR);
				$query->bindParam(":name", $data['name'], PDO::PARAM_STR);
				$query->bindParam(":age", $data['age'], PDO::PARAM_INT);
				$query->bindParam(":country", $data['country'], PDO::PARAM_STR);
				$query->bindParam(":id", $data['id'], PDO::PARAM_INT);
				
				return $query->execute();
		    }
		/**
		 * Выход пользователей
		 * */
		 public function logout(){
		 	session_destroy();
			setCookie("user_id", "" , time() -3600);
		 }
	   
 }
