<?php
require_once 'databaseconnect.php';
$link = mysqli_connect(HOST, USER, PASSWORD, DB_NAME)
	or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8");
$id_array = ['Articles' => 'article_id',
             'Blogs' => 'blog_id',
             'News' => 'news_id',
             'Events' => 'event_id'];
$page_array = ['Articles' => 'wiki.php',
             'Blogs' => 'blog.php',
             'News' => 'news.php',
             'Events' => 'news.php'];
$type = $_GET['type'];
$id = $_GET['id'];
$query = "DELETE FROM $type WHERE $id_array[$type] = $id";
mysqli_query($link, $query);
mysqli_close($link);
$redir = $page_array[$type];
        header("location: $redir");
?>