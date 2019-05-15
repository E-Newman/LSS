<?php
	session_start();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php if(empty($_SESSION['login'])){           
		echo ' <link rel="stylesheet" type="text/css" href="../../styleforexperiments.css"> ';
	} else {	
		$_SESSION['prevpage'] = 'articles/drego/makakorukie_volki.php';
		echo ' <link rel="stylesheet" type="text/css" href="../../styleBySanya.css"> ';
	}
?>
<meta charset="utf-8" />
<title>Макакорукие волки</title> <!--TODO: название статьи через запрос-->
<link rel="stylesheet" href="../../libs/magnific-popup/magnific-popup.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="../../JS/scripts2.js" type="text/javascript"></script>
<script src="../../libs/magnific-popup/jquery.magnific-popup.min.js"></script>
<style>
</style>
</head>
<header class = "headfoot">
	<div class = "head" style="margin-left: 5px;">
		<div class="headfoot" style="height:0.1em"></div>
			<button id="logo" onClick='location.href="https://vk.com/liankastory"' style="background: url(../../source/vk.png) round"></button>            
			<button id="logo" onClick='location.href="https://instagram.com/firstova.helena"' style= "background: url(../../source/inst.png) round"></button>
			<button class="headbutton">Другие проекты</button>	
		</div>    
		<div class = "head" style="margin-right: 5px; ">
			<button class="headbutton popup auth nouser" href = "#loginForm">Войти</button>
			<button class="headbutton user" onClick='location.href="../../me.php"' >Личный кабинет</button>
			<button class="headbutton popup auth user" onClick='location.href="../../logout.php"'>Выйти</button>
			<button class="headbutton popup auth nouser" href = "#regForm">Регистрация</button>
		</div>
	</div>
</header>
<body>
	<div class="headfoot" style="height:0.1em"></div>
		<div class="hidden">
		<form id="regForm" action="../../reg.php" method="POST" onsubmit="return false">
			<h1>Регистрация</h1>
			<p>Имя пользователя:</p>
			<input id="regField1" type="text" name="name" required maxlength="15"/><br>
			<p id="errField1" style="display:none; color:red;">Никнейм должен состоять из английских букв и цифр</p>
			<p id="errField11" style="display:none; color:red;">Никнейм уже занят</p>
			<p>E-mail:</p>
			<input id="regField2" type="text" name="email" required maxlength="30"/><br>
			<p id="errField2" style="display:none; color:red;">Введите корректный e-mail</p>
			<p id="errField22" style="display:none; color:red;">e-mail занят</p>
			<p>Пароль:</p>
			<input id="regField3" type="password" name="password" required maxlength="32"/><br>
			<p id="errField3" style="display:none; color:red;">Пароль должен состоять минимум из 8 символов и максимум из 32</p>
			<p id="errField4" style="display:none; color:red;">Пароль должен содержать минимум 1 цифру, 1 букву каждого регистра и минимум 8 символов</p>	
			<p>Повторите пароль:</p>
			<input id="regField4" type="password" name="password1" required maxlength="32"/><br>
			<p id="errField5" style="display:none; color:red;">Пароли не совпадают</p>
			<p>
				<input id="regField5" type="checkbox" name="personal" required />
				Я соглашаюсь на обработку персональных данных
			</p>
			<p id="errField6" style="display:none; color:red;">Согласитесь, ну пожалуйста!</p>
			<p>
				<input type="checkbox" name="personal" />
				Подписаться на e-mail рассылку(Необязательно)
			</p>
			<div style="text-align:center">
				<button id="regComplete"  > Зарегистрироваться</button>
			</div>
		</form>
	</div>
	<div class="hidden">
		<form id="loginForm" action="../../login.php" method="POST" onsubmit="return false">
			<h1>Войти</h1>
			<p>Имя пользователя:</p>
			<input id="logField1" type="text" name="name" required maxlength="15"/><br>
			<p id="errlogField1" style="display:none; color:red;">Такого пользователя не существует</p>
			<p>Пароль:</p>
			<input id="logField2" type="password" name="password" required maxlength="32"/><br>
			<p id="errlogField2" style="display:none; color:red;">Неправильный пароль</p>
			<div style="text-align:center">
				<button id="logComplete">Войти</button>
				<button>Забыли пароль?</button>
			</div>
			</form>
	</div>
	<div>
		<h1 style="display:inline; font-family:Columbina; font-size:40px; color:white; padding-left:45%; padding-top:2%;">Макакорукие волки</h1>
		<img src="../../images/star.png" style="display:inline; margin-left:10%;" width=50 height=50 />
	</div>
	<div class="content" style="align-items: flex-start;justify-content: flex-start; margin-top:1em;">
				<input name="search" type="text" class="search" placeholder="Поиск"/>
				<button class="headbutton" style="width:5%">Найти</button>
				<!--TODO: попытка перейти выдаёт undefined-->
				<select id ="select" class="navsel">
					<option value="0">Навигация</option>
					<option value="index">Главная страница</option>
					<option value="wiki">Вселенная</option>
					<option value="news">Новости</option>
					<option>Блог</option>
					<option>Книги</option>
					<option>Обратная связь</option>
				</select>
		</div>
	<div class="content" style="background-color:silver; border-color:black; border-width:2px; border-style:solid; border-radius:1em;
				width:80%; margin-top:2%; margin-left:10%;">
		<p class="arttext">
			Макакорукие волки  — бурые волки размером с овчарку, отличительная черта: пять пальцев как у обезьян на передних лапах, строение передних лап
			похоже на руки человекообразных обезьян.
			Волки не смотрят в небо. Съедают убитых. Обращают раненых. Обращённые мельче рождённых.
			Волки подчиняются вожаку вожаков, который находится в другом мире. 
		</p>
	</div>
	<div style="background-color:silver; border-color:black; border-width:2px; border-style:solid; border-radius:1em; height:15em;
				width:80%; margin-top:2%; margin-left:10%;">
		<p style="margin-left:15%;">Никнейм</p>
		<p style="margin-left:15%;">Дата</p>
		<div class="content" style="background-color:grey; border-color:black; border-width:2px; border-style:solid; border-radius:1em; height:9em;
				width:90%; margin-top:2%; margin-left:5%;">
		</div>
	</div>
</body>
</html>