<?php
	session_start();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php if (empty($_SESSION['login'])) {
        echo ' <link rel="stylesheet" type="text/css" href="../../styleforexperiments.css"> ';
		$logAction = 'href="#loginForm"';
		$logCaption = 'Войти';
		$regAction = 'href="#regForm"';
		$regCaption = 'Регистрация';
    } else {
		$_SESSION['prevpage'] = 'articles/kailria/vnutrennye_rasy_drakonov.php';
        echo ' <link rel="stylesheet" type="text/css" href="../../styleBySanya.css"> ';
		$logAction = "onClick='location.href=\"../../logout.php\"'";
		$logCaption = 'Выйти';
		$regAction = "onClick='location.href=\"../../me.php\"'";
		$regCaption = 'Личный кабинет';
    }
    ?>
<meta charset="utf-8" />
<title>Внутренние Расы Драконов</title> <!--TODO: название статьи через запрос-->
<link rel="stylesheet" href="../../libs/magnific-popup/magnific-popup.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="../../JS/scripts2.js" type="text/javascript"></script>
<script src="../../libs/magnific-popup/jquery.magnific-popup.min.js"></script>
<style>
</style>
</head>
<header class = "headfoot">
	<div class = "head" style="margin-left: 5px;">
		<div class="headfoot" style="height:0.1em"></div>
			<button id="logo" onClick='location.href="https://vk.com/liankastory"' style="background: url(../../source/vk.png) round"></button>            
			<button id="logo" onClick='location.href="https://instagram.com/firstova.helena"' style= "background: url(../../source/inst.png) round"></button>
			<button class="headbutton">Другие проекты</button>	
		</div>    
		<div class = "head" style="margin-right: 5px; ">
			<button id="Login" class="headbutton popup auth" <?php echo $logAction; ?>><?php echo $logCaption;?></button>
			<button class="headbutton popup auth" <?php echo $regAction; ?>><?php echo $regCaption;?></button>
			<?php
				if($_SESSION['rank'] >= 2){
				echo "<button class='headbutton user' onclick='location.href=\"../../creator.php\"' style='vertical-align:center;'>Редактор статей</button>";
				}
			?>
		</div>
	</div>
</header>
<body>
	<div class="headfoot" style="height:0.1em"></div>
		<div class="hidden">
		<form id="regForm" action="../../reg.php" method="POST" onsubmit="return false">
			<h1>Регистрация</h1>
			<p>Имя пользователя:</p>
			<input id="regField1" type="text" name="name"  maxlength="15"/><br>
			<p id="errField1" style="display:none; color:red;">Никнейм должен состоять из английских букв и цифр</p>
			<p id="errField11" style="display:none; color:red;">Никнейм уже занят</p>
			<p>E-mail:</p>
			<input id="regField2" type="text" name="email"  maxlength="30"/><br>
			<p id="errField2" style="display:none; color:red;">Введите корректный e-mail</p>
			<p id="errField22" style="display:none; color:red;">e-mail занят</p>
			<p>Пароль:</p>
			<input id="regField3" type="password" name="password"  maxlength="32"/><br>
			<p id="errField3" style="display:none; color:red;">Пароль должен состоять минимум из 8 символов и максимум из 32</p>
			<p id="errField4" style="display:none; color:red;">Пароль должен содержать минимум 1 цифру, 1 букву каждого регистра и минимум 8 символов</p>	
			<p>Повторите пароль:</p>
			<input id="regField4" type="password" name="password1"  maxlength="32"/><br>
			<p id="errField5" style="display:none; color:red;">Пароли не совпадают</p>
			<p>
				<input id="regField5" type="checkbox" name="personal"  />
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
        <form id="loginForm" action="../../login.php" method="POST" onsubmit="return false">
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
        <form id="pwdForm" action="../../login.php" method="POST">
            <h1>Смена пароля</h1>
            <p>Введите почту</p>
            <input id="pwdField1" type="text" name="email" maxlength="30" /><br>
            <div style="text-align:center">
                <button id="pwdComplete1">Сменить пароль</button>
            </div>
        </form>
    </div>
	<div>
		<h1 style="display:inline; font-family:Columbina; font-size:40px; color:white; padding-left:25%; padding-top:2%;">Внутренние Расы Драконов</h1>
		<img src="../../images/star.png" style="display:inline; margin-left:10%;" width=50 height=50 />
	</div>
	<div class="content" style="align-items: flex-start;justify-content: flex-start; margin-top:1em;">
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
	<div class="content" style="background-color:silver; border-color:black; border-width:2px; border-style:solid; border-radius:1em;
				width:80%; margin-top:2%; margin-left:10%;">
		<p class="arttext">
			Основная специализация всех драконов — защита государства от вторжения внешних врагов и поддержание в нём порядка. Древние запретили драконам
			нападать на чужие земли и проявлять агрессию по отношению к соседям, поэтому Каильрия расширялась бескровно: путём переговоров, с помощью звонкой
			монеты или интриг. Способствовали тому две расы: разведчики и дипломаты. Они считаются самыми умными и хитрыми драконами.
			<br><br> 
			Непосредственную защиту всех жителей Каильрии обеспечивают в основном стражи, воины и маги. Кроме поддержания правопорядка, Маги занимались
			целительством, врачеванием, изменением погоды, а также бытовой, артефактной и строительной магией. Пожалуй, только у магов присутствовала
			внутренняя специализация. 
			Если стражи, воины и маги поддерживали порядок в социуме, то охотники взяли на себя ответственность за окружающую среду, сохраняя баланс в
			экосистемах. 
			Гонцы осуществляли быструю и надежную связь в Каильрии и за её пределами. 
			Ремеслом, торговлей, сельским хозяйством, строительством, добычей полезных ископаемых, наукой и всем остальным в государстве занимались
			нечистокровные драконы (месь),  люди и другие разумные существа, проживавшие на территории страны. 
		</p>
	</div>
	<div style="background-color:silver; border-color:black; border-width:2px; border-style:solid; border-radius:1em; height:15em;
				width:80%; margin-top:2%; margin-left:10%;">
		<p style="margin-left:15%;">Никнейм</p>
		<p style="margin-left:15%;">Дата</p>
		<div class="content" style="background-color:grey; border-color:black; border-width:2px; border-style:solid; border-radius:1em; height:9em;
				width:90%; margin-top:2%; margin-left:5%;">
		</div>
	</div>
</body>
</html>