<?php
session_start();
if ($_SESSION['rank']<2){
    header("location: error403.php");
}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php if (empty($_SESSION['login'])) {
        echo ' <link rel="stylesheet" type="text/css" href="styleforexperiments.css"> ';
    } else {
		$_SESSION['prevpage'] = 'index.php';
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
<header class="headfoot">
    <div class="head" style="margin-left: 5px;">
        <button id="logo" onClick='location.href="https://vk.com/liankastory"' style="background: url(source/vk.png) round"></button>

        <button id="logo" onClick='location.href="https://instagram.com/firstova.helena"' style="background: url(source/inst.png) round"></button>
        <button class="headbutton">Другие проекты</button>
    </div>

    <div class="head" style="margin-right: 5px; ">
        <button id="Login" class="headbutton popup auth nouser" href="#loginForm">Войти</button>
        <button class="headbutton user" onClick='location.href="me.php"'>Личный кабинет</button>
		<button class="headbutton popup auth user" onClick='location.href="logout.php"'>Выйти</button>
        <button class="headbutton popup auth nouser" href="#regForm">Регистрация</button>
    </div>

</header>
<body>
<div class="content" style="margin-top:2%;">
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
        
        <form action="add.php" method="POST" style="width:100%;min-width:100%; background-color:transparent;">
        
    <div>
		<h1 id= "header_content" style="display:inline; font-family:Columbina; font-size:40px; color:white; padding-left:45%; padding-top:2%;">Заголовок<br>
        <input style= "margin-left:45%; width:30%;" type="text" name="header"/>        
        </h1>
		<img src="../../images/star.png" style="display:inline; margin-left:10%;" width=50 height=50 />
	</div>
	<div class="content" style="background-color:silver; border-color:black; border-width:2px; border-style:solid; border-radius:1em;
				width:80%; margin-top:2%; margin-left:10%;">
		<p class="arttext" id= "contentp">
		<input class="arttext"  type="text" name="content"/>
		</p>
	</div>
   <p style="color:white;"> Черновик <input type= "checkbox" name="tmp"/></p>
   <p style="color:white;"> Тэги <input type= "text" name="tags"/></p>

    <select id="select1" class="navsel" name = "type" >			
			<option value="News">Новость</option>
            <option value="Articles">Статья</option>
			<option value="Blogs">Запись в блоге</option>
			<option value="Events">Событие</option>
	</select>          
    <p id="xui"></p>
<br>
    <button>Отправить</button>
</form>

</body>
</html>