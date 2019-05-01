<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php if(empty($_SESSION['login'])){

            
echo ' <link rel="stylesheet" type="text/css" href="styleforexperiments.css"> ';
} else {	
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
            <button class="headbutton user" onClick='location.href="userlc.php"' >Личный кабинет</button>
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
		<div class="content">
				<input name="search" type="text" style="font-family: Columbina; margin-left:15%; margin-top:1em; width:35%; height:40%;
					border-radius: 1em;" placeholder="Поиск"/>
				<button class="headbutton" style="width:5%">Найти</button>
				<!--TODO: попытка перейти выдаёт undefined-->
				<select id = "select" class="navsel">
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
				border-radius: 1em; width:35em; margin-left:25%; margin-top:1em;"> <!--норм див?--><!--норм,ток маргины лучше писать в %(с)Александер-->
				<img src="images/test.png" style="margin:1em;" height=150px />
				<img src="images/test.png" style="margin:1em;" height=150px />
				<img src="images/test.png" style="margin:1em;" height=150px />
			</div>
		</div>
		<div class="content">
			<div style=" padding-top:1%; padding-bottom:1%;"> 
				<div class="sub" style="margin-left:14em; display:inline-block;">Дрэго</div> 
				<a href='world.php'><img id="dregoim" src="images/planet.png" height=80px width=80px style="border-radius:50%; margin-left:85%;  display:inline-block;"/></a>		
				<div class="worldhint" id="dregohint" style="margin-left:35%">
					<p>Название мира: Астарм</p>
					<p>Книги по миру: "Дрэго", "Тинни и Тени"</p>
					<p>Упоминается в: (что здесь?)</p>
					<p>Расы: люди, различные виды драконов...</p>
					<p>Наличие магии: есть, развита</p>
					<p>Уровень развития: средний</p>
				</div>
				<div class="sub" style="margin-left:5em;display:inline-block; padding-top:1%; padding-bottom:1%;">Проект Королева</div>
				<img id="queenim" src="images/planet.png" height=80px width=80px caption="Проект Королева" style="border-radius:50%; display:inline-block;
					margin-left:60%;"/>
				<div class="worldhint" id="queenhint" style="margin-left:15%;">
					<p>Название мира: Земля R-2,1/imp-17-46-278-t(p)</p>
					<p>Книги по миру: "Проект Королева"</p>
					<p>Упоминается в: (что здесь?)</p>
					<p>Расы: люди, драконы</p>
					<p>Наличие магии: нет</p>
					<p>Уровень развития: современность</p>
				</div>
			</div>
			<div class="eventblock">
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
</html> medium solid black"></footer>
    </div>
</body>
</html>