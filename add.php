<?php
require_once 'databaseconnect.php';
$link = mysqli_connect(HOST, USER, PASSWORD, DB_NAME)
	or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8");
$header=$_POST['header'];
$content=$_POST['content'];
$type=$_POST['type'];
$tags = $_POST['tags'];
if($_POST['tmp']){
    $tmp = 1;
} else {
    $tmp = 0;
}

if($type != "Articles"){

    $query ="INSERT INTO $type (`header`, `content`, `tags`, `isTemplate`) VALUES ('$header','$content','$tags','$tmp')";

} else {
    $article_type=$_POST['article_type'];
    $world_type=$_POST['world_type'];
    
    $query = "INSERT INTO $type (`header`, `content`, `tags`, `world`, `isTemplate`, `type`) VALUES ('$header','$content','$tags','$world_type','$tmp','$article_type')";
}
$res;
if(($res = mysqli_query($link, $query)) == FALSE)
{
    exit("$header $content $tags $world_type $tmp $article_type");
}
mysqli_close($link);
$redir = $_SERVER['HTTP_REFERER'];
        header("location: $redir");
?>