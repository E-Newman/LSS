<?php
require_once 'databaseconnect.php';
$link = mysqli_connect(HOST, USER, PASSWORD, DB_NAME)
	or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8");
$header=$_POST['header'];
$content=$_POST['content'];
$type=$_POST['type'];
$tags = $_POST['tags'];
$id = $_POST['id'];
$page_array = ['Articles' => 'articlecontent.php?id=',
             'Blogs' => 'blogcontent.php?id=',
             'News' => 'newscontent.php?id=',
             'Events' => 'eventcontent.php?id='];
if($_POST['tmp']){
    $tmp = 1;
} else {
    $tmp = 0;
}
if($type == "News"){

    $query ="UPDATE $type SET header= '$header',content= '$content',tags='$tags',isTemplate= '$tmp' WHERE news_id = '$id'";

} elseif ($type == "Articles") {
    $article_type=$_POST['article_type'];
    $world_type=$_POST['world'];
    $query = "UPDATE $type SET header= '$header',content= '$content',tags='$tags',world='$world_type',isTemplate= '$tmp', type='$article_type' WHERE article_id = '$id'";
} elseif ($type == "Blogs") {
    $query ="UPDATE $type SET header= '$header',content= '$content',tags='$tags',isTemplate= '$tmp' WHERE blog_id = '$id'";
} elseif ($type == "Events") {
    $query ="UPDATE $type SET header= '$header',content= '$content',tags='$tags',isTemplate= '$tmp' WHERE event_id = '$id'";
}
mysqli_query($link, $query);
mysqli_close($link);
$redir = $page_array[$type].$id;
        header("location: $redir");
?>