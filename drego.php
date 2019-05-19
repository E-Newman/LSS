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
		$_SESSION['prevpage'] = 'drego.php';
        echo ' <link rel="stylesheet" type="text/css" href="styleBySanya.css"> ';
		$logAction = "onClick='location.href=\"logout.php\"'";
		$logCaption = 'Выйти';
		$regAction = "onClick='location.href=\"me.php\"'";
		$regCaption = 'Личный кабинет';
    }
    ?>
	<meta charset="utf-8" />
	<title>Лианкины истории: Дрэго</title>
	<!--TODO: название мира через запрос-->
	<link rel="stylesheet" href="libs/magnific-popup/magnific-popup.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="/JS/scripts2.js" type="text/javascript"></script>
	<script src="libs/magnific-popup/jquery.magnific-popup.min.js"></script>
	
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
				<div id="charcontent">
					<h2>Персонажи</h2>
					<div class="b">
						<p class="a">
							Лиара
						</p>
						<p class="c">
							Лиара — тень Лианки. Как и Лианка имеет три формы.
						</p>
						<button class="btn" onClick='location.href="articles/drego/liara.php"'>Читать</button>
					</div>
					<div class="b">
						<p class="a">
							Дрэго
						</p>
						<p class="c">
							Полное имя: Дрэго'н Фан Дэ Дрэйго из династии серебряного дракона Фан Дэ Дрэйго. Родом из Дракийского королевства.
						</p>
						<button class="btn" onClick='location.href="articles/drego/drego.php"'>Читать</button>
					</div>
				</div>
				<h5>
					<input id="show_characters" count_show="0" count_add="4" type_query="5" world_type="dr" article_type = "char" type="button" class="loadmore mooer" value="Показать еще" />
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
					<input id="show_prof" count_show="0" count_add="4" type_query="5" world_type="dr" article_type = "prof" type="button"
					class="loadmore mooer" value="Показать еще" style="display:none"/>
				</h5>
				<div id="racecontent">
					<h2>Расы</h2>
					<div class="b">
						<p class="a">
							Макакорукие волки
						</p>
						<p class="c">
							Макакорукие волки  — бурые волки размером с овчарку, отличительная черта: пять пальцев как у обезьян на передних лапах,
							строение передних лап похоже на руки человекообразных обезьян. Волки не смотрят в небо.
						</p>
						<button class="btn" onClick='location.href="articles/drego/makakorukie_volki.php"'>Читать</button>
					</div>
					<div class="b">
						<p class="a">
							Статья3
						</p>
						<p class="c">
							аааа
						</p>
						<button class="btn">Читать</button>
					</div>
				</div>
				<h5>
					<input id="show_race" count_show="0" count_add="4" type_query="5" world_type="dr" article_type = "race" type="button" class="loadmore mooer" value="Показать еще" />
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
					<input id="show_place" count_show="0" count_add="4" type_query="5" world_type="dr" article_type = "place" type="button"
					class="loadmore mooer" value="Показать еще" style="display:none" />
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
					<input id="show_build" count_show="0" count_add="4" type_query="5" world_type="dr" article_type = "build" type="button"
					class="loadmore mooer" value="Показать еще" style="display:none" />
				</h5>
				<div id="eventcontent" style="display:none">
					<h2>События</h2>
					<div class="b">
						<p class="a">
							ссс
						</p>
						<p class="c">
							ппп
						</p>
						<button class="btn">Читать</button>
					</div>if($_SESSION['rank'] >= 2){
						
						echo "<div class='eventblock'>
						<h3>Готовятся к публикации</h3>
						<!--TODO: заполнить, видят ток адмен и эдитор-->
					</div>";
					}
					<div class="b">
						<p class="a">
							ррр
						</p>
						<p class="c">
							ннн
						</p>
						<button class="btn">Читать</button>
					</div>
				</div>
				<h5>
					<input id="show_event" count_show="0" count_add="4" type_query="5" world_type="dr" article_type = "event" type="button"
					class="loadmore mooer" value="Показать еще" style="display:none"/>
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
					<input id="show_art" count_show="0" count_add="4" type_query="5" world_type="dr" article_type = "art" type="button"
					class="loadmore mooer" value="Показать еще" style="display:none"/>
				</h5>
			</div>
			<div style="display:inline-block; width:25%; margin-top:7%; margin-left:12%;">
				<!--у всех боттом нормальный?-->
				<div class="eventblock" style="margin-bottom:20%;">
					<h3>Навигация по энциклопедии</h3>
					<!--TODO: заполнить-->
				</div>
				<?php
				
				if($_SESSION['rank'] >= 2){

					echo "<div class='eventblock'>
					<h3>Готовятся к публикации</h3>
					<!--TODO: заполнить, видят ток адмен и эдитор-->
				</div>";
				}
				?>
			</div>
		</div>
	</div>
</body>

</html>