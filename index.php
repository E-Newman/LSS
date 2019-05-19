<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php if (empty($_SESSION['login'])) {
        echo ' <link rel="stylesheet" type="text/css" href="styleforexperiments.css"> ';
		$logAction = 'href="#loginForm"';
		$logCaption = 'Войти';
		$regAction = 'href="#regForm"';
		$regCaption = 'Регистрация';
    } else {
		$_SESSION['prevpage'] = 'index.php';
        echo ' <link rel="stylesheet" type="text/css" href="styleBySanya.css"> ';
		$logAction = "onClick='location.href=\"logout.php\"'";
		$logCaption = 'Выйти';
		$regAction = "onClick='location.href=\"me.php\"'";
		$regCaption = 'Личный кабинет';
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
<header class="headfoot">
    <div class="head" style="margin-left: 5px;">
        <button id="logo" onClick='location.href="https://vk.com/liankastory"' style="background: url(source/vk.png) round"></button>

        <button id="logo" onClick='location.href="https://instagram.com/firstova.helena"' style="background: url(source/inst.png) round"></button>
        <button class="headbutton">Другие проекты</button>
    </div>

    <div class="head" style="margin-right: 5px; ">
        <button id="Login" class="headbutton popup auth" <?php echo $logAction; ?>><?php echo $logCaption;?></button>
        <button class="headbutton popup auth" <?php echo $regAction; ?>><?php echo $regCaption;?></button>
		<?php
		if($_SESSION['rank'] >= 2){
			echo "<button class='headbutton user' onclick='location.href=\"creator.php\"' style='vertical-align:center;'>Редактор статей</button>";
			}
		?>
    </div>

</header>

<body>
    <div class="headfoot" style="height:0.1em"></div>
    <div class="hidden">
        <form id="regForm" action="reg.php" method="POST" onsubmit="return false">
            <h1>Регистрация</h1>
            <p>Имя пользователя:</p>
            <input id="regField1" type="text" name="name" required maxlength="15" /><br>
            <p id="errField1" style="display:none; color:red;">Никнейм должен состоять из английских букв и цифр</p>
            <p id="errField11" style="display:none; color:red;">Никнейм уже занят</p>
            <p>E-mail:</p>
            <input id="regField2" type="text" name="email" required maxlength="30" /><br>
            <p id="errField2" style="display:none; color:red;">Введите корректный e-mail</p>
            <p id="errField22" style="display:none; color:red;">e-mail занят</p>
            <p>Пароль:</p>
            <input id="regField3" type="password" name="password" required maxlength="32" /><br>
            <p id="errField3" style="display:none; color:red;">Пароль должен состоять минимум из 8 символов и максимум из 32</p>
            <p id="errField4" style="display:none; color:red;">Пароль должен содержать минимум 1 цифру, 1 букву каждого регистра и минимум 8 символов</p>

            <p>Повторите пароль:</p>
            <input id="regField4" type="password" name="password1" required maxlength="32" /><br>
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
                <button id="regComplete"> Зарегистрироваться</button>
            </div>
        </form>
    </div>
    <div class="hidden">
        <form id="loginForm" action="login.php" method="POST" onsubmit="return false">
            <h1 id="logh1">Войти</h1>
            <p id="errlogField4"></p>
            <p id="logp1">Имя пользователя:</p>
            <input id="logField1" type="text" name="name" maxlength="15" /><br>
            <p id="errlogField1" style="display:none; color:red;">Такого пользователя не существует</p>
            <p id="errlogField3" style="display:none; color:red;">Чтобы войти, подтвердите почту</p>
            <p id="logp2">Пароль:</p>
            <input id="logField2" type="password" name="password" maxlength="32" /><br>
            <p id="errlogField2" style="display:none; color:red;">Неправильный пароль</p>

            <div id="logdiv" style="text-align:center">
                <button id="logComplete">Войти</button>
                <button id="pwdComplete" class="popup" href="#pwdForm">Забыли пароль?</button>
            </div>

    </div>
    </form>
    </div>
    <div class="hidden">
        <form id="pwdForm" action="login.php" method="POST">
            <h1>Смена пароля</h1>
            <p>Введите почту</p>
            <input id="pwdField1" type="text" name="email" maxlength="30" /><br>
            <div style="text-align:center">
                <button id="pwdComplete1">Сменить пароль</button>
            </div>
        </form>
    </div>


    <div style="height: 50em ;width:100%">

        <h1 style="color:white; font-size:2em; font-family: 'Mon Amour Two'; margin-left:2%">Лианкины Истории<br />писателя Елены Фирстовой</h1>

        <button class="mainLink" onClick='location.href="wiki.php"' style="display:inline-block; margin-left:15%; margin-top:2%;">Вселенная</button>

        <br>
        <button class="mainLink" onClick='location.href="news.php"' style="display:inline-block;margin-top:2%; margin-left:30%;">Новости</button>
        <br>
        <button class="mainLink" onClick='location.href="blog.php"' style="display:inline-block;margin-top:2%;margin-left:45%;">Блог</button>
        <br>
        <button class="mainLink" onClick='location.href="todo.php"' style="display:inline-block;margin-top:2%;margin-left:60%;">Книги</button>
        <br>
        <button class="mainLink" onClick='location.href="todo.php"' style="display:inline-block;margin-top:2%; margin-left:75%;">Обратная связь</button>

    </div>
    <footer style="border-top: medium solid black">
    </footer>

</body>

</html>