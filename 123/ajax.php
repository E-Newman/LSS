<?php
define('MYSQL_ASSOC',MYSQLI_ASSOC);
require_once 'databaseconnect.php';
$link = mysqli_connect(HOST, USER, PASSWORD, DB_NAME)
    or die("Ошибка " . mysqli_error($link));

$countView = (int)$_POST['count_add'];  // количество записей, получаемых за один раз
$startIndex = (int)$_POST['count_show']; // с какой записи начать выборку
$query = "SELECT * FROM `NEWS` LIMIT $startIndex,$countView"; //$startIndex, $countView";
// запрос к бд
$sqlresult = mysqli_query($link,$query);
//Создаем ассоциативный массив и закидываем туды результат запроса
$newsData = array();
//
while($result = mysqli_fetch_array($sqlresult, MYSQL_ASSOC)){
     $newsData[] = $result;
}
//$row = mysqli_fetch_array($sqlresult, MYSQLI_ASSOC);
//printf ("%s (%s)\n", $row["CONTENT"], $row["DATE_PUBLISHING"]);
if(empty($newsData)){
    // если новостей нет
    echo json_encode(array(
        'result'    => 'finish'
    ));
}else{
    // если новости получили из базы, то сформируем html элементы
    // и отдадим их клиенту
    $html = "";
    foreach($newsData as $oneNews){
        $html .= "
            <div>
                <b>{$oneNews['CONTENT']}</b>
                <p>{$oneNews['DATE_PUBLISHING']}</p>
            </div>
        ";
    }
    echo json_encode(array(
        'result'    => 'success',
        'html'      => $html
    ));
}






mysqli_close($link);
?>
