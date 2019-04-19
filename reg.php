<?php
  require_once('databaseconnect.php');
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'libs/Mailer/Exception.php';
  require 'libs/Mailer/PHPMailer.php';
  require 'libs/Mailer/SMTP.php';
  $base_url = 'http://178.19.243.227/';
	$link = mysqli_connect(HOST, USER, PASSWORD, DB_NAME)
        or die("Ошибка " . mysqli_error($link));
        
          
        if(!empty($_POST['email']) && isset($_POST['email']) &&  !empty($_POST['password']) &&  isset($_POST['password']) &&  !empty($_POST['name']) &&  isset($_POST['name']))
        {
          $name =  $_POST['name'];
          $email = $_POST['email'];
          $password = $_POST['password'];   
          $password=md5($password); 
          $secret = 'vladislav';
          $activation=md5($secret.$name);  
          $count=mysqli_query($link,"SELECT user_id FROM Users WHERE email='$email'");
          $count1=mysqli_query($link,"SELECT user_id FROM Users WHERE username ='$name'");

          if(mysqli_num_rows($count) < 1 && mysqli_num_rows($count1) < 1)
          {
            $query = "INSERT INTO Users (username, email, pwd , token, activation_status) VALUES ('$name','$email','$password','$activation','0')";
            mysqli_query($link,$query);
            
            $mail = new PHPMailer;
            $mail->SMTPKeepAlive = true;
            $mail->isSMTP();
            $mail->Host = 'smtp.mail.ru';
            $mail->SMTPAuth = true;
            $mail->Username = 'linkastory@mail.ru';
            $mail->Password = '729427Genius';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('linkastory@mail.ru');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Registration';
            $mail->Body ='Здравствуйте! Мы должны убедиться в том, что вы человек. Пожалуйста, подтвердите адрес вашей электронной почты, и можете начать использовать ваш аккаунт на сайте. <br/> <br/> 
            <a href="'.$base_url.'act.php?code='.$activation.'">'.$base_url.'act.php?code='.$activation.'</a>';

          if(!$mail->send()){
              
          echo 'Error';

          } else {
          header('location: index.php');
          }       
          
        }
          
      }

?>