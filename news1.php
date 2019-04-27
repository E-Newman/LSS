<html>
    <head>
        <title>Лианкины истории: новости</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	    
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="libs/magnific-popup/magnific-popup.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
		<script src="/JS/scripts.js" type="text/javascript"></script>
		<script src="libs/magnific-popup/jquery.magnific-popup.min.js" ></script>
		<script src="libs/magnific-popup/jquery.magnific-popup.js" ></script>
		<style>
		</style>
	</head>
    <body>
        <header class="headfoot" style="width:100%" align="center">
            <a style="margin-top: -1vh" href="https://vk.com/liankastory"><img src="images/vk.png" style="width:3em; height:100%" /></a>
            <a href="https://instagram.com/firstova.helena"><img src="images/ins.png" style="width:3em; height:100%" /></a>
            <a class="headbutton" style="margin-left:1em;" href="">Другие проекты</a>
            <a class="headbutton popup" style="margin-left:65em;" href="#loginForm">Войти</a>
            <a class="headbutton popup" style="margin-left:75em;" href="#regForm">Регистрация</a>
        </header>
        <div class="headfoot" style="height:0.1em"></div>
        <div class="hidden">
            <form id="regForm" onsubmit="trythis();">
                <h1>Регистрация</h1>
                <p>Имя пользователя:</p>
                <input id="regField1" type="text" name="name" maxlength="15" title="#todo"/><br>
				<p id="errField1" style="display:none; color:red;">Никнейм должен состоять из английских букв и цифр</p>
                <p>E-mail:</p>
                <input id="regField2" type="email" name="email" autocomplete="off" maxlength="30"/><br>
				<p id="errField2" style="display:none; color:red;">Введите корректный e-mail</p>
                <p>Пароль:</p>
                <input id="regField3" type="password" name="password" maxlength="32"/><br>
				<p id="errField3" style="display:none; color:red;">Пароль должен состоять минимум из 8 символов и максимум из 32</p>
				<p id="errField4" style="display:none; color:red;">Пароль должен содержать минимум 1 цифру, 1 букву каждого регистра и минимум 8 символов</p>
                <p>Повторите пароль:</p>
                <input id="regField4" type="password" name="password1" maxlength="32"/><br>
				<p id="errField5" style="display:none; color:red;">Пароли не совпадают</p>
                <p>
                    <input id="regField5" type="checkbox" name="personal" />
                    Я соглашаюсь на обработку персональных данных
                </p>
				<p id="errField6" style="display:none; color:red;">Согласитесь, ну пожалуйста!</p>
                <p>
                    <input type="checkbox" name="personal" />
                    Подписаться на e-mail рассылку(Необязательно)
                </p>
				<div style="text-align:center">
                    <button id="regComplete">Зарегистрироваться</button>
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
        <h1>
            <div style="margin-left: 49%">
                Новости
            </div>
        </h1>
        <h2>
            poistr
        </h2>
        <h3>
            <div class="b">
                <p class="a">
                    Название
                </p>
                <p class="b">
                    Дата
                </p>
                <p class="c">
                    Содержание 1 статьи
                    Содержание 1 статьи
                    Содержание 1 статьи
                    Содержание 1 статьи
                    Содержание 1 статьи
                    Содержание 1 статьи
                    Содержание 1 статьи
                    Содержание 1 статьи
                    Содержание 1 статьи
                    Содержание 1 статьи
                    Содержание 1 статьи
                    Содержание 1 статьи
                    Содержание 1 статьи
                </p>
                <button class="btn">Читать</button>
            </div>
            <div class="b">
                <p class="a">
                    Название 2 статьи
                <p class="b">
                    Дата
                </p>
                <p class="c">
                    Содержание 2 статьи
                    Содержание 2 статьи
                    Содержание 2 статьи
                    Содержание 2 статьи
                    Содержание 2 статьи
                    Содержание 2 статьи
                    Содержание 2 статьи
                    Содержание 2 статьи
                    Содержание 2 статьи
                    Содержание 2 статьи
                    Содержание 2 статьи
                    Содержание 2 статьи
                    Содержание 2 статьи
                </p>

                </p>
                <button class="btn">Читать</button>
            </div>
            <div class="b">
                <p class="a">
                    Название 3
                </p>
                <p class="b">
                    Дата
                </p>
                <p class="c">
                    Содержание 3 статьи
                    Содержание 3 статьи
                    Содержание 3 статьи
                    Содержание 3 статьи
                    Содержание 3 статьи
                    Содержание 3 статьи
                    Содержание 3 статьи
                    Содержание 3 статьи
                    Содержание 3 статьи
                    Содержание 3 статьи
                    Содержание 3 статьи
                    Содержание 3 статьи
                    Содержание 3 статьи
                </p>
                <button class="btn">Читать</button>
            </div>
        </h3>
        <div id="content">
        </div>
        <h5>
            <input id="show_more1" count_show="0" count_add="3" type_query="1" type="button" class="loadmore" value="Показать еще" />
        </h5>
        <h1>
            <div style="margin-left: 49%">
                События
            </div>
        </h1>
        <h2>
            <div class="b">
                <p class="a">
                    Событие 1
                </p>
                <p class="b">
                    Дата
                </p>
                <p class="c">
                    Превью
                </p>
                <button class="btn">Читать</button>
            </div>
            <div class="b">
                <p class="a">
                    Событие2
                </p>
                <p class="b">
                    Дата
                </p>
                <p class="c">
                    Превью
                </p>
                <button class="btn">Читать</button>
            </div>
            <div class="b">
                <p class="a">
                    Событие 3
                </p>
                <p class="b">
                    Дата
                </p>
                <p class="c">
                    Превью
                </p>
                <button class="btn">Читать</button>
            </div>
        </h2>
        <div id="content1">
        </div>
        <h5>
            <input id="show_more" count_show="0" count_add="3" type_query="2" type="button" class="loadmore" value="Показать еще" />
        </h5>
    </body>
</html>
