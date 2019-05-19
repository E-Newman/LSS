<?php
session_start();
if ($_SESSION['rank'] < 2){
    header("location: ../../error403.php");
}
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
    <title>Редактор статей</title>
    <link rel="stylesheet" href="../../libs/magnific-popup/magnific-popup.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="../..//JS/scripts2.js" type="text/javascript"></script>
    <script src="../../libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <style>
    </style>
</head>
<header class="headfoot">
    <div class="head" style="margin-left: 5px;">
        <button id="logo" onClick='location.href="https://vk.com/liankastory"' style="background: url(../../source/vk.png) round"></button>

        <button id="logo" onClick='location.href="https://instagram.com/firstova.helena"' style="background: url(../../source/inst.png) round"></button>
        <button class="headbutton">Другие проекты</button>
    </div>

    <div class="head" style="margin-right: 5px; ">
        <button id="Login" class="headbutton popup auth" <?php echo $logAction; ?>><?php echo $logCaption;?></button>
        <button class="headbutton popup auth" <?php echo $regAction; ?>><?php echo $regCaption;?></button>
    </div>

</header>
<body>
	<div class="content" style="align-items: flex-start;justify-content: flex-start;">
		<input name="search" type="text" class="search" placeholder="Поиск"/>
		<button class="headbutton" style="width:5%; margin-right:7%; height:25px; margin-top:1%;">Найти</button>
		<!--TODO: попытка перейти выдаёт undefined-->
		<select id ="select" class="navsel">
			<option value="0">Навигация</option>
			<option value="index">Главная страница</option>
			<option value="wiki">Вселенная</option>
			<option value="news">Новости</option>
			<option value="blog">Блог</option>
			<option>Книги</option>
			<option>Обратная связь</option>
		</select>
	</div>
        
    <form action="add.php" method="POST" style="width:100%;min-width:100%; background-color:transparent;">    
		<div>
			<!--<h1 id= "header_content" style="display:inline; font-family:Columbina; font-size:40px; color:white; padding-left:45%; padding-top:2%;">Заголовок<br>-->
			<input name="header" type="text" class="search" style="font-size:48px;" placeholder="Заголовок..."  
			autofocus />        
		</div>
		<div class="content" style="background-color:silver; border-color:black; border-width:2px; border-style:solid; border-radius:1em;
					width:80%; margin-top:2%; margin-left:10%;">
			<p class="arttext" id= "contentp" style="height:40em; width:100%; text-align:center;">
				<textarea class="arttext" style="height:90%; width:90%; vertical-align:top;" type="text" name="content"
				placeholder="Введите текст статьи..."></textarea>
			</p>
		</div>
	   <p style="color:white; font-family:Columbina;"> Черновик <input type="checkbox" name="tmp"/></p>
	   <p></p>
	   <input name="tags" type="text" class="search" style="margin-left:0%;" placeholder="Теги..."/>
	   <p></p>
	   <select id="select1" class="navsel" name = "type" style="margin-left:0%;" >			
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
