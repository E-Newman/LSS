<?php
require_once 'databaseconnect.php';
$link = mysqli_connect(HOST, USER, PASSWORD, DB_NAME)
	or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8");
$header=$_POST['header'];
$content=$_POST['content'];
$type=$_POST['type'];
$id_array = ['Articles' => 'article_id',
             'Blogs' => 'blog_id',
             'News' => 'news_id',
             'Events' => 'event_id'];
$page_array = ['Articles' => 'articlecontent.php?id=',
             'Blogs' => 'blogcontent.php?id=',
             'News' => 'newscontent.php?id=',
             'Events' => 'eventcontent.php?id='];
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
$query1 = "SELECT * FROM $type ORDER BY $id_array[$type] DESC LIMIT 1";
if(($pageid = mysqli_query($link, $query1)) == FALSE)
{
    exit("");
}

foreach ($pageid as $page_id) {
   $page_id1 = $page_id[$id_array[$type]] + 1 ;
    };
$res;
if(($res = mysqli_query($link, $query)) == FALSE)
{
    exit("$type $header $content $tags $world_type $tmp $$id_array[$type] $page_array[$type]");
}
mysqli_close($link);
$redir = $page_array[$type].$page_id1;
        header("location: $redir");
?>