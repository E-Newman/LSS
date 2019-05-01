<?php
    session_start();
?>
<html>
    <head>
        <title>Лианкины истории: новости</title>
        <?php if(empty($_SESSION['login'])){

            
            echo 'ЗАЛОГИНЬСЯ ПИДОР';
            } else {	
                     echo ' <link rel="stylesheet" type="text/css" href="styleforexperiments.css"> ';
            }
	    ?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
        <script src="/JS/scripts.js" type="text/javascript"></script>
	</head>
    <body>
        <header class="headfoot" style="width:100%" align="center">
            <a style="margin-top: -1vh" href="https://vk.com/liankastory"><img src="images/vk.png" style="width:3em; height:100%" /></a>
            <a href="https://instagram.com/firstova.helena"><img src="images/ins.png" style="width:3em; height:100%" /></a>
            <a class="headbutton " style="margin-left:1em;" href="">Другие проекты</a>
            <a class="headbutton popup auth" style="margin-left:75em;" href="/logout.php">Выйти</a>
        </header>

        <div class="headfoot" style="height:0.1em"></div>
        <img src="images/test.png" style="margin:1em;" height=150px />   
    </body>
</html>
