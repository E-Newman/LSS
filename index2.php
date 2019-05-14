<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php if(empty($_SESSION['login'])){

            
echo ' <link rel="stylesheet" type="text/css" href="style.css"> ';
} else {	
         echo ' <link rel="stylesheet" type="text/css" href="styleBySanya.css"> ';
}
?>
    <meta charset="utf-8" />
    <title>Лианкины истории</title>
    <link rel="stylesheet" href="libs/magnific-popup/magnific-popup.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="/JS/scripts2.js" type="text/javascript"></script>
    <script src="libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <style>
    </style>
</head>
<body>
    <div>
    <header class="headfoot" style="width:100%">
            <a style="margin-top: -1vh" href="https://vk.com/liankastory"><img src="images/vk.png" style="width:3em; height:100%" /></a>
            <a href="https://instagram.com/firstova.helena"><img src="images/ins.png" style="width:3em; height:100%" /></a>
            <a class="headbutton" style="margin-left:1em;" href="">Другие проекты</a>
            <a class="headbutton popup auth" style="margin-left:65em;" href="#loginForm">Войти</a>
            <a class="headbutton user" style="margin-left:65em;" href="/me.php">Личный кабинет</a>
            <a class="headbutton popup auth" style="margin-left:75em;" href="#regForm">Регистрация</a>
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
        <div style="height:30em; width:100%">
            <nobr>
                <h1 style="color:white; font-size:2em; font-family: 'Mon Amour Two'; margin-left:5%">Лианкины Истории<br />писателя Елены Фирстовой</h1>
                <a class="mainLink" href="wiki.php" style="margin-left:5em">Вселенная</a>
                <div style="height:1em"></div>
                <a class="mainLink" href="news.php" style="margin-left:15em;">Новости</a>
                <div style="height:1.5em"></div>
                <a class="mainLink" style="margin-left:25em;">Блог</a>
                <div style="height:0.1em"></div>
                <a class="mainLink" style="margin-left:35em;">Книги</a>
                <div style="height:1em"></div>
                <a class="mainLink" style="margin-left:45em;">Обратная связь</a>
            </nobr>
        </div>
        <footer style="border-top: medium solid black"></footer>
    </div>
</body>
</html>