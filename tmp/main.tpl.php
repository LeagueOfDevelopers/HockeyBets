<!doctype html>
<html>
	<head>
		<title>
		  Личный кабинет пользователя	
		</title>
		<link rel="stylesheet" href="tmp/css/pure-min.css" type="text/css">
		<link rel="stylesheet" href="tmp/css/base-min.css" type="text/css">
		<link rel="stylesheet" href="tmp/css/buttons-min.css" type="text/css">
		<link rel="stylesheet" href="tmp/css/forms-min.css" type="text/css">
		<link rel="stylesheet" href="tmp/css/menus-min.css" type="text/css">
		<link rel="stylesheet" href="tmp/css/style.css" type="text/css">
		<!--JS Scripts-->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript">
	    $(function(){
          $(".email").blur(function(){
          var email = $(".email").val();	
         if(email.length < 4 || !email.match(/[\d\w\-\_\.]+@[\d\w\-\_\.]+\.[\w]{2,4}/i)){
        	$(".email").css({'border-color': 'red'});
        	$(".result_email").html('<strong style="color:red">Введите корректный email</strong>');
        }else{
        	$(".email").css({'border-color':'green'});
        	$(".result_email").html('<strong style="color:green">E-mail адрес корректен</strong>');
        }
        });
      
       $(".password").blur(function(){
        var password = $(".password").val();
        if(password.length < 6){
         	$(".password").css({'border-color': 'red'});
        	$(".result_password").html('<strong style="color:red">Пароль должен содержать, минимум 6 символов</strong>');
        }else{
        	$(".password").css({'border-color':'green'});
        	$(".result_password").html('<strong style="color:green">Пароль корректен</strong>');
      }
      })			 
	});
</script> 
<style type='text/css'>
	div.success{
		color:green;
		font-size:1.8em;
		text-align:center;
	}
	div.error{
		color:red;
		font-size:1.8em;
		text-align:center;
	}
	div.copyright{
		margin-top:60px;
		border-top: 1px solid silver;
		padding-top: 10px;
		text-align:center;
	}
</style>
	</head>
	<body>
		
		<div align="center">
			<h3>Добро пожаловать на HockeyBets</h3>
			<br>
				
		     <!-- Проверяем авторизован ли юзер -->
			<?php if(Validate::UserStatus() == true): ?>
			  	
			  <div class="pure-menu pure-menu-open pure-menu-horizontal">
    <ul>
        <li><a href="main">Главная</a></li>
        <li><a href="users">Другие пользователи</a></li>
        <li><a href="profile">Профиль</a></li>
        <li><a href="logout">Выход</a></li>
    </ul>
</div>	
<br><br>
<?php if(route::dispatcher() == "users"): ?>
	<?php include_once 'users.tpl.php'; ?>
<?php elseif(route::dispatcher() == "profile"):?>
	<?php include_once 'profile.tpl.php';	?>
<?php else: ?>		 	
<p>Здесь может быть Все, что угодно.. Для авторизованных юзеров</p>
					<?php include_once 'news.tpl.php'; ?>
	<?php endif; ?>			  	
			 <?php else: ?>
			 			 	  	  <div class="pure-menu pure-menu-open pure-menu-horizontal">
    <ul>
        <li><a href="main">Главная</a></li>
        <li><a href="login">Вход</a></li>
        <li><a href="signup">Регистрация</a></li>

    </ul>
</div>	 <br><br>
			 <?php if(route::dispatcher() == "login"): ?>
			 	  <?php include_once 'login.tpl.php'; ?>
			 	<?php elseif(route::dispatcher() == "signup"): ?>
			 	  <?php include_once 'sign.tpl.php'; ?>
			  <?php elseif(route::dispatcher() == "recover"): ?>
			 	  <?php include_once 'repassword.tpl.php'; ?>
			 	
			 	<?php endif; ?>	
			 <?php endif; ?>
		</div>
		<div class="copyright">
			&copy; <?=date('Y');?> HockeyBets.ru
		</div>
	</body>
</html>