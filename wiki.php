<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php if(empty($_SESSION['login'])){            
		echo ' <link rel="stylesheet" type="text/css" href="styleforexperiments.css"> ';
	} else {
		$_SESSION['prevpage'] = 'wiki.php';
		 echo ' <link rel="stylesheet" type="text/css" href="styleBySanya.css"> ';
	}
?>
    <meta charset="utf-8" />
	<title>Лианкины истории: вселенная</title>
    <link rel="stylesheet" href="libs/magnific-popup/magnific-popup.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="/JS/scripts.js" type="text/javascript"></script>
    <script src="libs/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript">
		var links = { 'index': 'index.php', 'wiki': 'wiki.php', 'news': 'news.php' };
	</script>
    <style>
    </style>
</head>
<header class = "headfoot">
			<div class = "head" style="margin-left: 5px;">
            <div class="headfoot" style="height:0.1em"></div>
            <button id="logo" onClick='location.href="https://vk.com/liankastory"' style="background: url(source/vk.png) round"></button>
            
			<button id="logo" onClick='location.href="https://instagram.com/firstova.helena"' style= "background: url(source/inst.png) round"></button>
			<button class="headbutton">Другие проекты</button>	
            </div>
            
			<div class = "head" style="margin-right: 5px; ">
			<button class="headbutton popup auth nouser" href = "#loginForm">Войти</button>
            <button class="headbutton user" onClick='location.href="me.php"' >Личный кабинет</button>
			<button class="headbutton popup auth user" onClick='location.href="logout.php"'>Выйти</button>
			<button class="headbutton popup auth nouser" href = "#regForm">Регистрация</button>
            </div>
            
	    </header>
<body>
    <div>
        <div class="headfoot" style="height:0.1em"></div>
        <div class="hidden">
            <form id="regForm" action="reg.php" method="POST" onsubmit="return false">
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
            <form id="loginForm" action="login.php" method="POST" onsubmit="return false">
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
		<div class="content" style="align-items: flex-start;justify-content: flex-start;">
				<input name="search" type="text" class="search" placeholder="Поиск"/>
				<button class="headbutton" style="width:5%; margin-right:7%; height:25px; margin-top:1%;">Найти</button>
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
		<div style="text-align:center">
			<h2>Галерея</h2>
			<div class="content" style="background-color:white; border-style:solid; border-color:black; border-width:2px;
				border-radius: 1em; width:40%; height:10em; margin-left:30%; margin-top:1em;"> <!--норм див?--><!--норм,ток маргины лучше писать в %(с)Александер-->
				<!--<img src="images/test.png" style="margin:1em; height:5%;" />
				<img src="images/test.png" style="margin:1em; height:5%;" />
				<img src="images/test.png" style="margin:1em; height:5%;" />-->
			</div>
		</div>
		<div class="content" style="align-items: flex-start;justify-content: flex-start;">
			<div style="padding-top:1%; padding-bottom:1%;  width:78%;"> 
				<div class="sub" style="display:inline-block; margin-left:5%;">Дрэго (Астарм)</div> 
				<a id="dregoim" href='drego.php'><img src="images/planet.png" height=80px width=80px style="border-radius:50%; margin-left:5%; display:inline-block;"/></a>
				<div class="sub" style="margin-left:3em;display:inline-block;">Проект Королева</div>
				<a id="queenim" href='queen.php'><img src="images/planet.png" height=80px width=80px caption="Проект Королева" style="border-radius:50%; display:inline-block;
					margin-left:5%;"/></a>
				<div class="sub" style="margin-left:3em;display:inline-block;">Каильрия</div>
				<a id="kaim" href='kailria.php'><img src="images/planet.png" height=80px width=80px caption="Каильрия" style="border-radius:50%; display:inline-block;
					margin-left:5%;"/></a>
				<p></p>
				<div class="worldhint" id="dregohint" style="margin-left:5%; display:inline-block;">
					<p>Книги по миру: "Дрэго", "Тинни и Тени"</p>
					<p>Упоминается в: -</p>
					<p>Расы: люди, различные виды драконов...</p>
					<p>Наличие магии: стихийная, у единиц - истинная</p>
					<p>Уровень развития: традиционное патриархальное общество</p>
				</div>
				<div class="worldhint" id="queenhint" style="margin-left:5%; display:inline-block;">
					<p>Книги по миру: "Проект Королева", "Проект Королева. Пески Бескрайней"</p>
					<p>Упоминается в: -</p>
					<p>Расы: люди, драконы</p>
					<p>Наличие магии: магия стихий</p>
					<p>Уровень развития: современность</p>
				</div>
				<div class="worldhint" id="kahint" style="margin-left:5%; display:inline-block;">
					<p>Книги по миру: -</p>
					<p>Упоминается в: "Проект Королева", "Проект Королева. Пески Бескрайней", "Дрэго", цикл "Белый дневник"</p>
					<p>Расы: драконы, люди, оборотни и др.</p>
					<p>Наличие магии: все виды магии</p>
					<p>Уровень развития: традиционное патриархальное общество</p>
				</div>
			</div>
			<div class="eventblock" style="margin-left:0%; margin-right:0%;">
				<h3>Ближайшие события</h3>
				<div style="height:70%;">
					<!--TODO сюда грузим события-->
				</div>
				<button class="headbutton" style="margin-left:40%; height:3em;">Перейти к календарю</button>
			</div>
		</div>
		<footer style="border-top: medium solid black"></footer>
    </div>
</body>
</html>