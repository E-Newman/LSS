<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php if(empty($_SESSION['login'])){

            
echo ' <link rel="stylesheet" type="text/css" href="styleforexperiments.css"> ';
} else {	
         echo ' <link rel="stylesheet" type="text/css" href="exprbySanya.css"> ';
}
?>
    <meta charset="utf-8" />
    <title>Лианкины истории</title>
    <link rel="stylesheet" href="libs/magnific-popup/magnific-popup.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="/JS/scripts.js" type="text/javascript"></script>
    <script src="libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <style>
    </style>
</head>
<header class = "headfoot">
            <div class = "head" style="margin-left: 5px;">
            <button id="logo" onClick='location.href="https://vk.com/liankastory"' style="background: url(source/vk.png) round"></button>
            
			<button id="logo" onClick='location.href="https://instagram.com/firstova.helena"' style= "background: url(source/inst.png) round"></button>
			<button class="headbutton">Другие проекты</button>	
            </div>
            
			<div class = "head" style="margin-right: 5px; ">
			<button class="headbutton popup auth" href = "#loginForm">Войти</button>
            <button class="headbutton user" onClick='location.href="userlc.php"' >Личный кабинет</button>
			<button class="headbutton popup auth" href = "#regForm">Регистрация</button>
            </div>
            
	    </header>
<body>
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

        <div style="height: 50em ;width:100%">
            
                <h1 style="color:white; font-size:2em; font-family: 'Mon Amour Two'; margin-left:2%">Лианкины Истории<br />писателя Елены Фирстовой</h1>

                <button class="mainLink" onClick='location.href="wiki.php"' style="display:inline-block; margin-left:15%; margin-top:2%;">Вселенная</button>

                <br>
                <button class="mainLink" onClick='location.href="news.php"' style="display:inline-block;margin-top:2%; margin-left:30%;">Новости</button>
                <br>
                <button class="mainLink" onClick='location.href="todo.php"' style="display:inline-block;margin-top:2%;margin-left:45%;">Блог</button>
                <br>
                <button class="mainLink" onClick='location.href="todo.php"' style="display:inline-block;margin-top:2%;margin-left:60%;">Книги</button>
                <br>
                <button class="mainLink" onClick='location.href="todo.php"' style="display:inline-block;margin-top:2%; margin-left:75%;">Обратная связь</button>
            
        </div>
        <footer style="border-top: medium solid black">
    </footer>
    
</body>
</html>