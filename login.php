<?php
session_start();
require_once('databaseconnect.php');
$link = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
$login = $_POST['name'];
$password=$_POST['password'];
$password = md5($password);//шифруем пароль
//$id_user = mysqli_query($link,"SELECT user_id FROM Users WHERE username ='$login' AND pwd='$password'");
$queryUser = "SELECT * FROM Users WHERE username ='$login' AND pwd='$password'";
$sqlresult = mysqli_query($link,$queryUser);
$userData = mysqli_fetch_array($sqlresult, MYSQLI_ASSOC);
			 
if (empty($userData['user_id'])) 
{
    exit ("Извините, введённый вами логин или пароль неверный.");
}
else {
    $_SESSION['password']=$password; 
    $_SESSION['login']=$login; 
    $_SESSION['id']=$userData['user_id']; 
    $_SESSION['description']=$userData['description']; 
    $_SESSION['photo']=$userData['photo']; 
    session_write_close(); //закрытие сессии 
    $redir = $_SERVER['HTTP_REFERER'];
    header("location: $redir");//перенаправление
}
//echo "<meta http-equiv='Refresh' content='0; URL=index.html'>";
?>






