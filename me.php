<?php
    session_start();
?>
<html>
    <head>
        <title>Лианкины истории: <?php echo 'профиль пользователя ' . $_SESSION["login"]; ?></title>
        <?php if(empty($_SESSION['login'])){            
            echo 'Авторизуйтесь'; // TODO: нормальное сообщение об ошибке
            } else {
				$_SESSION['prevpage'] = 'index.php';
                echo ' <link rel="stylesheet" type="text/css" href="styleforexperiments.css"> ';
            }
	    ?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="libs/magnific-popup/magnific-popup.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
        <script src="/JS/scripts.js" type="text/javascript"></script>
		<script src="libs/magnific-popup/jquery.magnific-popup.min.js"></script>
		<style>
			p {
				color: white;
				font-family: Columbina;
			}
		</style>
	</head>
	<?php if(isset($_SESSION['login'])) { ?>
    <body>
        <header class="headfoot">
			<div class="head" style="margin-left:80%;">
				<button class="headbutton popup auth" onClick='location.href="logout.php"'>Выйти</button>
			</div>
        </header>
        <div class="headfoot" style="height:0.1em"></div>
		<h1 style="font-family:Columbina; font-size:40px; color:white; margin-left:20%; margin-top:2%;"><?php echo 'Профиль пользователя ' . $_SESSION["login"]; ?> </h1>
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
		<div class="content">
		<!--без маргина вниз уезжает--> 
			<div style="margin-right:1%; margin-bottom:170em; width:50%;">
				<p>Поле статки 1</p>
				<p>Поле статки 2</p>
				<p>Поле статки 3</p>
				<p>Поле статки 4</p>
				<div class="eventblock" style="margin-bottom:20%; margin-left:0%;">
					<h3>Избранные статьи</h3>
					<!--TODO: заполнить-->
					<div style="height:80%;"></div>
					<input id="show_more1" type="button" class="loadmore" value="Показать еще" />
				</div>
			</div>
			<div style="width:35%; margin-top:1%; margin-bottom:140em; margin-left:1%;">
				<img src="images/test.png" style="margin:2em;" height=150px />
				<button class="headbutton" style="margin-top:1em; width:60%;">Изменить аватар</button>
				<button class="headbutton" style="margin-top:1em; width:60%;">Изменить пароль</button>
				<h3 style="margin-left:5%;">О себе</h3>
				<input name="search" type="text" style="font-family: Columbina; margin-top:1em; width:70%; height:15em;
				border-radius: 1em;"/>
				<button class="headbutton" style="margin-top:1em; width:60%;">Сохранить изменения</button>
				<button class="headbutton" style="margin-top:1em; width:60%;">Работа с рассылкой <!--текст меняется от статуса рассылки--></button>
				<button class="headbutton" style="margin-top:1em; width:60%;">Статистика</button>
				<h3 style="margin-left:5%;">Зарегистрированные пользователи</h3>
				<div class="eventblock" style="margin-bottom:20%; margin-left:0%; width: 100%;">
					<!--TODO: заполнить-->
				</div>
			</div>
		</div>
    </body> <?php } ?>
</html>
