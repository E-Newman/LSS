<?php
  require_once('databaseconnect.php');
 $link = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
 $msg='';
 if(!empty($_GET['code']) && isset($_GET['code']))
 {
 $code=$_GET['code'];
 $c=mysqli_query($link,"SELECT user_id FROM Users WHERE token='$code'");
 if(mysqli_num_rows($c) > 0)
 {
 $count=mysqli_query($link,"SELECT user_id FROM Users  WHERE token='$code' and activation_status ='0'");

 if(mysqli_num_rows($count) == 1)
 {
mysqli_query($link,"UPDATE Users SET activation_status ='1' WHERE token='$code'");
 $msg="Ваш аккаунт активирован"; 
 }
 else
 {
 $msg ="Ваш аккаунт уже активирован, нет необходимости активировать его снова.";
 }
 }
 else
 {
 $msg ="Неверный код активации.";
 }
 }
?>

<?php 
echo $msg;

header( "refresh:2 ; url=index.php" );

?>