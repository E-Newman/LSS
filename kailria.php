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
		$_SESSION['prevpage'] = 'kailria.php';
        echo ' <link rel="stylesheet" type="text/css" href="styleBySanya.css"> ';
		$logAction = "onClick='location.href=\"logout.php\"'";
		$logCaption = 'Выйти';
		$regAction = "onClick='location.href=\"me.php\"'";
		$regCaption = 'Личный кабинет';
    }
    ?>
	<meta charset="utf-8" />
	<title>Лианкины истории: Каильрия</title>
	<!--TODO: название мира через запрос-->
	<link rel="stylesheet" href="libs/magnific-popup/magnific-popup.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="/JS/scripts2.js" type="text/javascript"></script>
	<script src="libs/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript">
		var links = {
			'index': 'index.php',
			'wiki': 'wiki.php',
			'news': 'news.php'
		};
	</script>
	<style>
		h2 {
			margin-left: 1.5%;
		}

		.b {
			width: 45%;
		}

		.eventblock {
			width: 90%;
			margin-left: 0%;
			margin-right: 5%;
		}
	</style>
</head>
<header class="headfoot">
	<div class="head" style="margin-left: 5px;">
		<div class="headfoot" style="height:0.1em"></div>
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
	</div>
</header>

<body>
	<div>
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
				<h1>Войти</h1>
				<p>Имя пользователя:</p>
				<input id="logField1" type="text" name="name" required maxlength="15" /><br>
				<p id="errlogField1" style="display:none; color:red;">Такого пользователя не существует</p>
				<p>Пароль:</p>
				<input id="logField2" type="password" name="password" required maxlength="32" /><br>
				<p id="errlogField2" style="display:none; color:red;">Неправильный пароль</p>
				<div style="text-align:center">
					<button id="logComplete">Войти</button>
					<button>Забыли пароль?</button>
				</div>
			</form>
		</div>
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
		<div class="content-top">
			<div style="margin-right:1%; width:70%;">
				<div id="charcontent" style="display:none">
					<h2>Персонажи</h2>
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
				</div>
				<h5>
					<input id="show_characters" count_show="0" count_add="4" type_query="5" world_type="ka" article_type = "char" type="button"
					class="loadmore mooer" value="Показать еще" style="display:none"/>
				</h5>
				<div id="profcontent" style="display:none">
					<h2>Профессии</h2>
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
				</div>
				<h5>
					<input id="show_prof" count_show="0" count_add="4" type_query="5" world_type="ka" article_type = "prof" type="button"
					class="loadmore mooer" value="Показать еще" style="display:none"/>
				</h5>
				<div id="racecontent">
					<h2>Расы</h2>
					<div class="b">
						<p class="a">
							Древние
						</p>
						<p class="c">
							Раса создателей драконов. Создана Движением.
						</p>
						<button class="btn" onClick='location.href="articles/kailria/drevnie.php"'>Читать</button>
					</div>
					<div class="b">
						<p class="a">
							Внутренние Расы Драконов
						</p>
						<p class="c">
							Основная специализация всех драконов — защита государства от вторжения внешних врагов и поддержание в нём порядка. Древние запретили драконам
							нападать на чужие земли и проявлять агрессию по отношению к соседям, поэтому Каильрия расширялась бескровно: путём переговоров, с помощью звонкой
							монеты или интриг.
						</p>
						<button class="btn" onClick='location.href="articles/kailria/vnutrennye_rasy_drakonov.php"'>Читать</button>
					</div>
				</div>
				<h5>
					<input id="show_race" count_show="0" count_add="4" type_query="5" world_type="ka" article_type = "race" type="button" class="loadmore mooer" value="Показать еще" />
				</h5>
				<div id="placecontent" style="display:none">
					<h2>Места</h2>
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
				</div>
				<h5>
					<input id="show_place" count_show="0" count_add="4" type_query="5" world_type="ka" article_type = "place" type="button" 
					class="loadmore mooer" value="Показать еще" style="display:none"/>
				</h5>
				<div id="buildcontent" style="display:none">
					<h2>Сооружения</h2>
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
				</div>
				<h5>
					<input id="show_build" count_show="0" count_add="4" type_query="5" world_type="ka" article_type = "build" type="button"
					class="loadmore mooer" value="Показать еще" style="display:none"/>
				</h5>
				<div id="eventcontent">
					<h2>События</h2>
					<div class="b">
						<p class="a">
							Создание государства Каильрии
						</p>
						<p class="c">
							Первое время Древние и драконы вели кочевой образ жизни. Однако драконов становилось всё больше и их создателям пришлось осесть,
							тогда же они разработали основной свод законов и этикет, по которым до сих пор следуют каильрийцы.

						</p>
						<button class="btn" onClick='location.href="articles/kailria/sozdanie_gosudarstva_kailrii.php"'>Читать</button>
					</div>
					<div class="b">
						<p class="a">
							Гражданская война в Каильрии
						</p>
						<p class="c">
							Причины войны
							
							Драконов становилось всё больше, в то время как число Древних практически не менялось, поэтому со временем большинство
							крылатых забыли, как выглядят их создатели. Через несколько столетий Древние начали переселяться в иную плоскость.
						</p>
						<button class="btn" onClick='location.href="articles/kailria/grazhdanskaya_voyna_v_kailrii.php"'>Читать</button>
					</div>
				</div>
				<h5>
					<input id="show_event" count_show="0" count_add="4" type_query="5" world_type="ka" article_type = "event" type="button" class="loadmore mooer" value="Показать еще" />
				</h5>
				<div id="artcontent" style="display:none">
					<h2>Артефакты</h2>
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
				</div>
				<h5>
					<input id="show_art" count_show="0" count_add="4" type_query="5" world_type="ka" article_type = "art" type="button"
					class="loadmore mooer" value="Показать еще" style="display:none"/>
				</h5>
			</div>
			<div style="display:inline-block; width:25%; margin-top:7%; margin-left:12%;">
				<!--у всех боттом нормальный?-->
				<div class="eventblock" style="margin-bottom:20%;">
					<h3>Навигация по энциклопедии</h3>
					<!--TODO: заполнить-->
				</div>
				<div class="eventblock">
					<h3>Готовятся к публикации</h3>
					<!--TODO: заполнить, видят ток адмен и эдитор-->
				</div>
			</div>
		</div>
	</div>
</body>

</html>