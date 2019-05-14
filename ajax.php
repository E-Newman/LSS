<?php

require_once 'databaseconnect.php';
$link = mysqli_connect(HOST, USER, PASSWORD, DB_NAME)
	or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8");
// с какой записи начать выборку
$type_query = (int)$_POST['type_query']; //Тип запроса
// запрос к бд
if ($type_query == 1) {
	$countView = (int)$_POST['count_add'];  // количество записей, получаемых за один раз
	$startIndex = (int)$_POST['count_show'];
	$query = "SELECT * FROM `NEWS` LIMIT $startIndex,$countView";
	$sqlresult = mysqli_query($link, $query);
	$newsData = array();
	while ($result = mysqli_fetch_array($sqlresult, MYSQLI_ASSOC)) {
		$newsData[] = $result;
	}
	if (empty($newsData)) {
		// если новостей нет
		echo json_encode(array(
			'result'    => 'finish'
		));
	} else {
		// если новости получили из базы, то сформируем html элементы
		// и отдадим их клиенту
		$html = "";
		foreach ($newsData as $oneNews) {
			$html .= "   
						<div class= 'b'>
						<p class= 'a'>
						{$oneNews['CONTENT']}
						</p>
						<p class= 'b'>
						{$oneNews['DATE_PUBLISHING']}
						</p>
						<p class= 'c'>
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
						<button class='btn'>Читать</button>
						</div>";
		}
		echo json_encode(array(
			'result'    => 'success',
			'query'    => 'News',
			'html'      => $html
		));
	}
}
if ($type_query == 2) {
	$countView = (int)$_POST['count_add'];  // количество записей, получаемых за один раз
	$startIndex = (int)$_POST['count_show'];
	$queryEvent = "SELECT * FROM `Events` LIMIT $startIndex,$countView";
	$sqlresultEvent = mysqli_query($link, $queryEvent);
	$eventsData = array();
	while ($resultEvent = mysqli_fetch_array($sqlresultEvent, MYSQLI_ASSOC)) {
		$eventsData[] = $resultEvent;
	}
	if (empty($eventsData)) {
		// если событий нет
		echo json_encode(array(
			'result'    => 'finish'
		));
	} else {
		// если события получили из базы, то сформируем html элементы
		// и отдадим их клиенту
		$html1 = "";
		foreach ($eventsData as $event) {
			$html .= "   
						<div class= 'b'>
						<p class= 'a'>
						{$event['Name']}
						</p>
						<p class= 'b'>
						{$event['Date']}
						</p>
						<p class= 'c'>
						{$event['preview']}
						</p>
						<button class='btn'>Читать</button>
						</div>";
		}
		echo json_encode(array(
			'result'    => 'success',
			'query'    => 'event',
			'html'      => $html
		));
	}
}
if ($type_query == 3) {
	$email = $_POST['email'];
	$name = $_POST['name'];
	$count = mysqli_query($link, "SELECT user_id FROM Users WHERE email='$email'");
	$count1 = mysqli_query($link, "SELECT user_id FROM Users WHERE username ='$name'");
	if (mysqli_num_rows($count) > 0 && mysqli_num_rows($count1) > 0) {
		$countn = 1;
	} elseif (mysqli_num_rows($count1) > 0) {
		$countn = 2;
	} elseif (mysqli_num_rows($count) > 0) {
		$countn = 3;
	}
	echo json_encode(array(
		'result'    => 'success',
		'value'    => $countn
	));
}
if ($type_query == 4) {
	$password = $_POST['password'];
	$password = md5($password);
	$name = $_POST['name'];
	$count = mysqli_query($link, "SELECT user_id FROM Users WHERE username ='$name' AND pwd = '$password'");
	$count1 = mysqli_query($link, "SELECT user_id FROM Users WHERE username ='$name'");
	$kostyl = 0;
	$jopa = mysqli_query($link, "SELECT user_id FROM Users WHERE username ='$name' AND activation_status = 1");
	$jopa1 = mysqli_query($link, "SELECT user_id FROM Users WHERE username ='$name' AND activation_status = 0");
	if (mysqli_num_rows($jopa) == 1 && mysqli_num_rows($count) == 1) {
		$countn = 1;
	} elseif (mysqli_num_rows($jopa1) == 1) {
		$countn = 2;
	} elseif (mysqli_num_rows($count) == 1) {
		$countn = 3;
	} elseif (mysqli_num_rows($count1) == 0) {
		$countn = 4;
	} elseif (mysqli_num_rows($count) == 0) {
		$countn = 5;
	}

	echo json_encode(array(
		'result'    => 'success',
		'value'    => $countn
	));
}
if ($type_query == 5) {
	
	$countView = (int)$_POST['count_add'];  // количество записей, получаемых за один раз
	$startIndex = (int)$_POST['count_show'];
	$world_type=$_POST['world_type'];
	$article_type=$_POST['article_type'];
	$query = "SELECT * FROM Articles WHERE isTemplate= 0 AND type = '$article_type' AND world = '$world_type' ORDER BY article_id ASC LIMIT $startIndex, $countView";

	$sqlresult = mysqli_query($link, $query);
	$wrldarray = array();
	while ($wrldresult = mysqli_fetch_array($sqlresult, MYSQLI_ASSOC)) {
		$wrldarray[] = $wrldresult;
	}

	if (empty($wrldarray)) {
		// если новостей нет
		echo json_encode(array(
			'result'    => 'finish'
		));
	} else {
		// если новости получили из базы, то сформируем html элементы
		// и отдадим их клиенту
		$html = "";
		foreach ($wrldarray as $character) {
			$temp=substr($character['content'],0,strpos($character['content'],".",strpos($character['content'],".")+1));
			$html .= "   
						<div class= 'b'>
						<p class= 'a'>
						{$character['header']}
						</p>
						<p class= 'c'>
						{$temp}...
						</p>
						<button class='btn'>Читать</button>
						</div>";
		}
		echo json_encode(array(
			'result'    => 'success',
			'query'    => $article_type,
			'html'      => $html
		));
	}
}
mysqli_close($link);
