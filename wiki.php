<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
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
<body style="height:200vh">
    <div>
        <header class="headfoot" style="width:100%" align="center">
            <a style="margin-top: -1vh" href="https://vk.com/liankastory"><img src="images/vk.png" style="width:3em; height:100%" /></a>
            <a href="https://instagram.com/firstova.helena"><img src="images/ins.png" style="width:3em; height:100%" /></a>
            <a class="headbutton" style="margin-left:1em;" href="">Другие проекты</a>
            <a class="headbutton popup" style="margin-left:65em;" href="#loginForm">Войти</a>
            <a class="headbutton popup" style="margin-left:75em;" href="#regForm">Регистрация</a>
        </header>
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
            <form id="loginForm">
                <h1>Войти</h1>
                <p>Имя пользователя:</p>
                <input type="text" name="name" /><br>
                <p>Пароль:</p>
                <input type="password" name="password" /><br>
                <div style="text-align:center">
                    <button>Войти</button>
                    <button>Забыли пароль?</button>
                </div>
            </form>
        </div>
		<div style="height:5em; width:100%;">
			<nobr>
				<input name="search" type="text" style="font-family: Columbina; margin-left:25em; margin-top:1em; width:35em; height:40%;
					border-radius: 1em;" placeholder="Поиск"/>
				<a class="headbutton" style="position:absolute; top:6.3em; margin-left:1em;" href="">Найти</a>
				<!--TODO: попытка перейти выдаёт undefined-->
				<select id = "select" class="navsel" style="margin-left:10em;">
					<option value="0">Навигация</option>
					<option value="index">Главная страница</option>
					<option value="wiki">Вселенная</option>
					<option value="news">Новости</option>
					<option>Блог</option>
					<option>Книги</option>
					<option>Обратная связь</option>
				</select>
			</nobr>
		</div>
		<div style="text-align:center;">
			<h2>Галерея</h2>
			<div style="text-align:center; background-color:white; border-style:solid; border-color:black; border-width:2px;
				border-radius: 1em; width:35em; margin-left:25em;">
				<img src="images/test.png" style="margin:1em;" height=150px />
				<img src="images/test.png" style="margin:1em;" height=150px />
				<img src="images/test.png" style="margin:1em;" height=150px />
			</div>
		</div>
		<div style="height:50em; margin-top:2em;">
			<div style="width:50%; display:inline-block;">
					<img id="dregoim" src="images/planet.png" height=80px width=80px style="border-radius:50%; margin-left:15em; display:block;"/>
					<div class="worldhint" id="dregohint" style="top:30em; left:22em; ">
						<p>Название мира: Дрэго</p>
						<p>Книги по миру: "Дрэго", "Тинни и Тени"</p>
						<p>Упоминается в: (что здесь?)</p>
						<p>Расы: люди, различные виды драконов...</p>
						<p>Наличие магии: есть, развита</p>
						<p>Уровень развития: средний</p>
					</div>
					<p class="sub" style="margin-left:11em;">Дрэго</p>
					<img id="queenim" src="images/planet.png" height=80px width=80px caption="Проект Королева" style="border-radius:50%; display:block; margin-left:30em;"/>
					<div class="worldhint" id="queenhint" style="top:40em; left:37em; z-index:1">
						<p>Название мира: Земля R-2,1/imp-17-46-278-t(p)</p>
						<p>Книги по миру: "Проект Королева"</p>
						<p>Упоминается в: (что здесь?)</p>
						<p>Расы: люди, драконы</p>
						<p>Наличие магии: нет</p>
						<p>Уровень развития: современность</p>
					</div>
					<p class="sub" style="margin-left:22em;">Проект Королева</p>
			</div>
			<div class="eventblock">
				<h3 style="font-family:Columbina; margin-left:1em;">Ближайшие события</h3>
				<div style="height:80%;">
					<!--TODO сюда грузим события-->
				</div>
				<a class="headbutton" style="margin-left:40%; top:81%; height:3em;" href="news.php">Перейти к календарю</a>
			</div>
		</div>
		<footer style="border-top: medium solid black"></footer>
    </div>
</body>
</html>