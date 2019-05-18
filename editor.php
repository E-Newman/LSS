<?php
require_once 'databaseconnect.php';
$link = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
mysqli_set_charset($link, "utf8");
$content_id= $_GET['id'];
$type=$_GET['type'];
$id_array = ['Articles' => 'article_id',
             'Blogs' => 'blog_id',
             'News' => 'news_id',
             'Events' => 'event_id'];
$query = "SELECT * FROM $type WHERE $id_array[$type] = '$content_id'";
$sqlresult = mysqli_query($link, $query);
$wrldarray = array();
while ($wrldresult = mysqli_fetch_array($sqlresult, MYSQLI_ASSOC)) {
	$wrldarray[] = $wrldresult;
}
?>
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
        echo ' <link rel="stylesheet" type="text/css" href="../../styleforexperiments.css"> ';
    } else {
		$_SESSION['prevpage'] = 'index.php';
        echo ' <link rel="stylesheet" type="text/css" href="../../styleBySanya.css"> ';
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
        <button id="Login" class="headbutton popup auth nouser" href="#loginForm">Войти</button>
        <button class="headbutton user" onClick='location.href="../../me.php"'>Личный кабинет</button>
		<button class="headbutton popup auth user" onClick='location.href="../../logout.php"'>Выйти</button>
        <button class="headbutton popup auth nouser" href="#regForm">Регистрация</button>
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
			<option>Блог</option>
			<option>Книги</option>
			<option>Обратная связь</option>
		</select>
	</div>
        
    <form action="edit.php" method="POST" style="width:100%;min-width:100%; background-color:transparent;">    
		<div>
			<!--<h1 id= "header_content" style="display:inline; font-family:Columbina; font-size:40px; color:white; padding-left:45%; padding-top:2%;">Заголовок<br>-->
			<input name="header" type="text" class="search" style="font-size:48px;" placeholder="Заголовок..." autofocus 
            value="<?php
			foreach ($wrldarray as $content) {
				echo $content["header"];
				}?>"/>        
		</div>
		<div class="content" style="background-color:silver; border-color:black; border-width:2px; border-style:solid; border-radius:1em;
					width:80%; margin-top:2%; margin-left:10%;">
			<p class="arttext" id= "contentp" style="height:40em; width:100%; text-align:center;">
				<textarea class="arttext" style="height:90%; width:90%; vertical-align:top;" type="text" name="content"
				placeholder="Введите текст статьи...">
                <?php
		        foreach ($wrldarray as $content) {
		        print $content["content"];
		        }
		        ?>
                </textarea>
			</p>
		</div>
       <p style="color:white; font-family:Columbina;"> Черновик <input type="checkbox" name="tmp"
        <?php
       foreach ($wrldarray as $content) {
        $templ = $content["isTemplate"];
        }
        if($templ == 1){
            echo "checked";
        }
        ?>/></p>
	   <p></p>
	   <input name="tags" type="text" class="search" style="margin-left:0%;" placeholder="Теги..."
       value="
       <?php
		        foreach ($wrldarray as $content) {
		        print $content["tags"];
		        }
		        ?>
       "/>
       <p></p>
       <input style="display:none;"name = "type" value='<?php print $_GET['type']; ?>'/>
	   <input style="display:none;"name = "id" value='<?php print $_GET['id']; ?>'/>
       <input style="display:none;"name = "world" value='<?php print $_GET['world']; ?>'/>
       <input style="display:none;"name = "article_type" value='<?php print $_GET['article_type']; ?>'/>
		<br>
		<button>Отправить</button>
	</form>
</body>
</html>
