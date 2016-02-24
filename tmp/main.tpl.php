<!doctype html>
<html>
<head>
	<title>
		HockeyBets
	</title>
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	
	<link rel="stylesheet" href="tmp/css/main.css" type="text/css">
	<link rel="stylesheet" href="tmp/css/login.css" type="text/css">
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	<script src="tmp/js/main_script.js"></script>
		
</head>

<body>
<div id = "header">
	<div id = "menu">
		
		<div id = "buttons">
			<div>
				<a href="news"><div class = "button header-button-left"><span class = "center">Новости</span> </div></a>
				<a href="statistics"><div class = "button header-button-left"><span class = "center">Статистика</span></div></a>
				<a href="aboutus"><div class = "button header-button-left"><span class = "center">О нас</span></div></a>
			</div>
			<a href="main"><div class = "logo">
				Hockey Bets
			</div></a>
			<div>
				
				<?php if(Validate::UserStatus() == false): ?>
				<a href="login"><div class = "button header-button-right"><span class = "center">Войти</span></div></a>
				<?php else: ?>
				<a href="profile"><div class = "button header-button-right"><span class = "center">Личный кабинет</span></div></a>
				<?php endif; ?>
				<a href="faq"><div class = "button header-button-right"><span class = "center">FAQ</span></div></a>
			</div>
		</div>
	</div>
</div>
<div id = "content">
	<div id = "content-inner">
		<?php if(Validate::UserStatus() == true): ?>			
			<?php include_once 'admin/menu.tpl.php'; ?>
		<?php endif; ?>
		
		<?php if(route::dispatcher() == "login"): ?>
			<?php include_once 'login.tpl.php'; ?>
		<?php elseif(route::dispatcher() == ""): ?>
			<?php include_once 'landing.tpl.php'; ?>
		<?php elseif(route::dispatcher() == "main"): ?>
			<?php include_once 'landing.tpl.php'; ?>
		<?php elseif(route::dispatcher() == "aboutus"): ?>
			<?php include_once 'aboutus.tpl.php'; ?>
		<?php elseif(route::dispatcher() == "statistics"): ?>
			<?php include_once 'statistics.tpl.php'; ?>
		<?php elseif(route::dispatcher() == "faq"): ?>
			<?php include_once 'faq.tpl.php'; ?>
		<?php elseif(route::dispatcher() == "signup"): ?>
			<?php include_once 'sign.tpl.php'; ?>
		<?php elseif(route::dispatcher() == "recover"): ?>
			<?php include_once 'repassword.tpl.php'; ?>
		<?php endif; ?>
		
		<?php if(Validate::UserStatus() == true): ?>		
		
			<?php if(route::dispatcher()=="follow"):?>
				<?php include_once 'follow.tpl.php'; ?>
			<?php elseif(route::dispatcher()=="news"):?>
				<?php include_once 'news.tpl.php'; ?>
			<?php elseif(route::dispatcher()=="vip-news"):?>
				<?php include_once 'news.tpl.php'; ?>
			<?php elseif(route::dispatcher()=="gen-news"):?>
				<?php include_once 'news.tpl.php'; ?>
			<?php elseif(route::dispatcher()=="view-news"):?>
				<?php include_once 'news.tpl.php'; ?>
			<?php elseif(Route::dispatcher() == "addnews"):?>
				<?php include_once 'admin/addnews.tpl.php';	?>
			<?php elseif(Route::dispatcher() == "m-news"):?>
				<?php include_once 'admin/m-news.tpl.php';	?>
			<?php elseif(Route::dispatcher() == "editnews"):?>
				<?php include_once 'admin/edit-news.tpl.php';	?>
			<?php elseif(Route::dispatcher() == "profile"):?>
				<?php include_once 'profile.tpl.php';	?>
			<?php elseif(Route::dispatcher() == "users"):?>	
				<?php include_once 'users.tpl.php'; ?>
			<?php endif; ?>
		<?php else: ?>
			<?php if(route::dispatcher()=="news"):?>
				<?php include_once 'news-main.tpl.php'; ?>
			<?php elseif(route::dispatcher()=="view-news"):?>
				<?php include_once 'news-main.tpl.php'; ?>
			<?php elseif(route::dispatcher()=="gen-news"):?>
				<?php include_once 'news-main.tpl.php'; ?>
			<?php endif; ?>
		<?php endif; ?>	
	</div>
</div>

<div id = "footer">
	<div id="footer-content">
		&copy
		<a href = "http://lod-misis.ru/" ><div id="lodlogo"></a>
		
		</div>
	</div>
</div>
</body>
</html>