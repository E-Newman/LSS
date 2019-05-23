$(document).ready(function () {
	var base_url = '';
	window.onload = function(){
		if (window.href == "index.php") base_url = "";
		else base_url = '/';
	}
	function loadmore(btn_more, count_show, count_add, type_query) {

		$.ajax({

			url: base_url + "ajax.php", // куда отправляем
			type: "post", // метод передачи
			dataType: "json", // тип передачи данных
			data: { // что отправляем
				"count_show": count_show,
				"count_add": count_add,
				"type_query": type_query
			},

			// после получения ответа сервера							
			success: function (data) {

				if (data.result == "success") {
					//Если запрос был к бд с Новостями 
					if (data.query == "News") {
						//Вставляем html код под блоком с Новостями
						console.log(data.html);
						$('#content').append(data.html);
						btn_more.val('Показать еще');
						//Увеличиваем начальный индекс на 3
						btn_more.attr('count_show', (count_show + 4));

					}
					//Если запрос был к бд с Событиями
					if (data.query == "event") {

						//Вставляем html код под блоком с Событиями
						$('#content1').append(data.html);
						btn_more.val('Показать еще');
						//Увеличиваем начальный индекс на 3
						btn_more.attr('count_show', (count_show + 4));

					}

				} else if (data.result == "finish") {
					btn_more.css("display", "none");
				}

			}

		});


	}
	function for_Articles(btn_more, count_show, count_add, type_query, world_type, article_type) {

		$.ajax({

			url: base_url + "ajax.php", // куда отправляем
			type: "post", // метод передачи
			dataType: "json", // тип передачи данных
			data: { // что отправляем
				"count_show": count_show,
				"count_add": count_add,
				"type_query": type_query,
				"world_type": world_type,
				"article_type": article_type
			},

			// после получения ответа сервера							
			success: function (data) {

				if (data.result == "success") {
					//Если запрос был к бд с Новостями 
					if (data.query == "char") {
						$('#charcontent').append(data.html);
						//$('#charcontent').append(data.html);
						btn_more.val('Показать еще');
						//Увеличиваем начальный индекс на 3
						btn_more.attr('count_show', (count_show + 4));
						
					}
					if (data.query == "prof") {

						$('#profcontent').append(data.html);
						btn_more.val('Показать еще');
						//Увеличиваем начальный индекс на 3
						btn_more.attr('count_show', (count_show + 4));
					}
					if (data.query == "race") {

						$('#racecontent').append(data.html);
						btn_more.val('Показать еще');
						//Увеличиваем начальный индекс на 3
						btn_more.attr('count_show', (count_show + 4));
					}
					if (data.query == "place") {

						$('#placecontent').append(data.html);
						btn_more.val('Показать еще');
						//Увеличиваем начальный индекс на 3
						btn_more.attr('count_show', (count_show + 4));
					}
					if (data.query == "build") {

						$('#buildcontent').append(data.html);
						btn_more.val('Показать еще');
						//Увеличиваем начальный индекс на 3
						btn_more.attr('count_show', (count_show + 4));
					}
					if (data.query == "event") {

						$('#eventcontent').append(data.html);
						btn_more.val('Показать еще');
						//Увеличиваем начальный индекс на 3
						btn_more.attr('count_show', (count_show + 4));
					}
					if (data.query == "art") {

						$('#artcontent').append(data.html);
						btn_more.val('Показать еще');
						//Увеличиваем начальный индекс на 3
						btn_more.attr('count_show', (count_show + 4));
					}
					
					


				} else {
					btn_more.css("display", "none");
				}

			}

		});


	}
	function for_Blogs(btn_more, count_show, count_add, type_query){
		$.ajax({

			url: base_url + "ajax.php", // куда отправляем
			type: "post", // метод передачи
			dataType: "json", // тип передачи данных
			data: { // что отправляем
				"count_show": count_show,
				"count_add": count_add,
				"type_query": type_query
			},
			// после получения ответа сервера							
			success: function (data) {

				if (data.result == "success") {
					console.log(data.html);
					$('#blogcontent').append(data.html);
					btn_more.val('Показать еще');
					btn_more.attr('count_show', (count_show + 4));
				} else {
					btn_more.css("display", "none");
				}
			}
		});
			
		
	}
	function check_Name_And_Password(name, password) {
		//Тип запроса
		var type_query = 4;

		$.ajax({

			url: base_url + "ajax.php",
			type: "post",
			dataType: "json",
			data: {

				"type_query": type_query,
				"name": name,
				"password": password

			},

			success: function (data) {

				if (data.result == "success") {

					//Если ответ с сервера пришел ,отправляем его в Функцию проверки
					//data.value = 1 -> Занят Логин и Почта
					//data.value = 2 -> Занят только Логин
					//data.value = 3 -> Занята только Почта
					Password_And_Login_Check(data.value);

				}

			}

		});

	}
	function check_worlds() {
		//Тип запроса
		var type_query = 6;
		
		$.ajax({

			url: base_url + "ajax.php",
			type: "post",
			dataType: "json",
			data: {

				"type_query": type_query,

			},

			success: function (data) {

				if (data.result == "success") {

					check_mat(data.html);

				}

			}

		});
		
	}
	function check_mat(array) {

		var html= " <select name = 'world_type' id='select2' class='navsel'>";
		array.forEach(function(data, index){
			
			html += "<option value='" + data['world'] + "'>" + data['world'] + "</option>";
			console.log(index);
		});
		html+= "</select>";
		html+=" <select  name = 'article_type' id='select3' class='navsel'>" +
		"<option value='race'>Расы</option>" +
		"	<option value='event'>События</option>" +
		"	<option value='event'>Персонажи</option>" +
		"	<option value='char'>Новость</option>" +
		"	<option value='prof'>Профессия</option> " +
		"	<option value='place'>Место</option>" +
		"	<option value='build'>Сооружение</option>" +
		"   <option value='art'>Артефакты</option>" +
			"</select>"
		
		$('#xui').append(html);
		
	}
	function check_Mail_And_Name(name, email) {
		//Тип запроса
		var type_query = 3;

		$.ajax({

			url: base_url + "ajax.php",
			type: "post",
			dataType: "json",
			data: {

				"type_query": type_query,
				"name": name,
				"email": email

			},

			success: function (data) {

				if (data.result == "success") {

					//Если ответ с сервера пришел ,отправляем его в Функцию проверки
					//data.value = 1 -> Занят Логин и Почта
					//data.value = 2 -> Занят только Логин
					//data.value = 3 -> Занята только Почта
					Mail_And_Login_Check(data.value);

				}

			}

		});

	}
	// Функция проверки занятости логина и почты 
	function Mail_And_Login_Check(value) {
		// Занят Логин и Почта

		if (value == 1) {
			//Выводятся 2 предупреждения и рамки полей ввода для Логина и Почты окрашиваются в красный
			$('#regField1').css("border-color", "red");
			$('#regField2').css("border-color", "red");
			$('#errField22').css("display", "block");
			$('#errField11').css("display", "block");

		}
		//Занят только Логин
		else if (value == 2) {

			$('#regField1').css("border-color", "red");
			$('#errField11').css("display", "block");
			$('#regField2').css("border-color", "black");
			$('#errField22').css("display", "none");

		}
		//Занята только Почта
		else if (value == 3) {

			$('#regField2').css("border-color", "red");
			$('#errField22').css("display", "block");
			$('#errField11').css("display", "none");
			$('#regField1').css("border-color", "black");

		}
		//Ничего не занято
		else {

			$('#regField1').css("border-color", "black");
			$('#regField2').css("border-color", "black");
			$('#errField22').css("display", "none");
			$('#errField11').css("display", "none");

		}
	}

	function Password_And_Login_Check(value) {
		if (value == 1) {
			document.getElementById('loginForm').submit(true);
		}
		else if (value == 2) {

			$('#logField1').css("border-color", "red");
			$('#errlogField3').css("display", "block");
			$('#logField2').css("border-color", "black");
			$('#errlogField2').css("display", "none");
			$('#errlogField1').css("display", "none");
		} else if (value == 3) {
			$('#logField1').css("border-color", "red");
			$('#errlogField1').css("display", "block");
			$('#logField2').css("border-color", "black");
			$('#errlogField2').css("display", "none");
		}
		else if (value == 4) {
			$('#logField1').css("border-color", "red");
			$('#errlogField1').css("display", "block");
			$('#logField2').css("border-color", "black");
			$('#errlogField2').css("display", "none");
		} else if (value == 5) {
			$('#logField2').css("border-color", "red");
			$('#errlogField2').css("display", "block");
			$('#logField1').css("border-color", "black");
			$('#errlogField1').css("display", "none");
		}
	}

	$(".popup").magnificPopup();
	//Функция-обработчик нажатия кнопки "Показать еще" под блоком Статей
	$('#show_more1').click(function () {

		var btn_more = $(this);
		//Начальный индекс, с которого идет добавление
		var count_show = parseInt($(this).attr('count_show'));
		//Количество записей для добавления
		var count_add = $(this).attr('count_add');
		//Тип запроса
		var type_query = parseInt($(this).attr('type_query'));
		btn_more.val('Подождите...');
		count_show = loadmore(btn_more, count_show, count_add, type_query);

	});
	//Функция-обработчик нажатия кнопки "Показать еще" под блоком Событий
	$('#show_more').click(function () {

		var btn_more = $(this);
		//Начальный индекс, с которого идет добавление 
		var count_show = parseInt($(this).attr('count_show'));
		//Количество записей для добавления
		var count_add = $(this).attr('count_add');
		//Тип запроса
		var type_query = parseInt($(this).attr('type_query'));
		btn_more.val('Подождите...');
		count_show = loadmore(btn_more, count_show, count_add, type_query);

	});
	$('.mooer').click(function () {
		var btn_more = $(this);
		var count_show = parseInt($(this).attr('count_show'));
		var count_add = $(this).attr('count_add');
		var type_query = parseInt($(this).attr('type_query'));
		var world_type = $(this).attr('world_type');
		var article_type = $(this).attr('article_type');
		btn_more.val('Подождите...');
		count_show = for_Articles(btn_more, count_show, count_add, type_query, world_type, article_type);
	});
	$('#show_blogs').click(function () {
		var btn_more = $(this);
		var count_show = parseInt($(this).attr('count_show'));
		var count_add = $(this).attr('count_add');
		var type_query = parseInt($(this).attr('type_query'));
		for_Blogs(btn_more,count_show, count_add, type_query);
	});

	$('#regComplete').click(function () {
		//Никнейм
		var name = $('#regField1').val();
		//Почта
		var email = $('#regField2').val();
		//Запрос к базе данных для проверки занятости Никнейма и Почты 
		var vall = check_Mail_And_Name(name, email);
		//Счетчик ошибок заполнения
		var fortest = 0;
		// Регулярные выражения для Валидации Никнейма(nickreg) , Пароля(pwdreg) , Почты(mailreg)
		var nickreg = /^[a-zA-Z0-9]+$/;
		var pwdreg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
		var mailreg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		//Валидация Никнейма
		if (!(nickreg.test($('#regField1').val()))) {

			$('#errField1').css("display", "block");
			$('#regField1').css("border-color", "red");
			fortest++;

		};

		$('#regField2').css("border-color", "black");
		$('#errField2').css("display", "none");
		//Валидация Почты
		if (!(mailreg.test($('#regField2').val()))) {
			$('#errField2').css("display", "block");
			$('#regField2').css("border-color", "red");
			fortest++;
		}
		//Валидация пароля
		//Проверка пароля на длину
		$('#regField3').css("border-color", "grey");
		$('#errField3').css("display", "none");
		$('#errField4').css("display", "none");
		if ($('#regField3').val().length < 8 || $('#regField3').val().length > 32) {
			$('#errField3').css("display", "block");
			$('#regField3').css("border-color", "red");
			fortest++;

		}
		//Проверка пароля регулярным выражением
		else if (!(pwdreg.test($('#regField3').val()))) {
			$('#errField4').css("display", "block");
			$('#regField3').css("border-color", "red");
			fortest++;

		}
		//Проверка пароля на равенство с вторым паролем
		$('#regField4').css("border-color", "grey");
		$('#errField5').css("display", "none");
		$('#errField4').css("display", "none");

		if ($('#regField3').val() != $('#regField4').val()) {
			$('#errField5').css("display", "block");
			$('#regField4').css("border-color", "red");
			fortest++;

		}
		//Валидация кнопки "Я соглашаюсь на обработку персональных данных"

		$('#errField6').css("display", "none");
		if (!($('#regField5').is(':checked'))) {
			$('#errField6').css("display", "block");
			fortest++;

		}
		//Валидация кнопки "Подписаться на e-mail рассылку" #TODO

		//Если ошибок не обнаружено, отправляем форму
		if (fortest == 0) {

			document.getElementById('regForm').submit(true);

		}
	});
	$('#logComplete').click(function () {
		var name = $('#logField1').val();
		var password = $('#logField2').val();
		check_Name_And_Password(name, password);
	});
	$('#pwdComplete1').click(function () {
		document.getElementById('loginForm').submit(true);
	});
	
	$('#select').change(function () {
		var links = { "index":  base_url + "index.php", "wiki": base_url + "wiki.php", "news": base_url + "news.php", "blog": base_url + "blog.php"};
		var a = this.value
		window.location.href = links[a];
	});
	$('#select1').change(function () {
		if(this.value == "Articles")
		{		
			check_worlds();
		} else {
			$('#select2').remove();
			$('#select3').remove();
		}
		console.log(this.value);
	});




});


