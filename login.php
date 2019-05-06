<?php
session_start();
require_once('databaseconnect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'libs/Mailer/Exception.php';
require 'libs/Mailer/PHPMailer.php';
require 'libs/Mailer/SMTP.php';
$base_url = 'http://178.19.243.227/';
$link = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
$login = $_POST['name'];

if (isset($_POST['email'])) {

    $email = $_POST['email'];

    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
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
    $mail->Subject = 'Смена пароля';
    $mail->Body = 'Чтобы сменить пароль ,перейдите по ссылке <br/> <br/> 
            <a href="' . $base_url . 'act.php?code=' . $activation . '">' . $base_url . 'act.php?code=' . $activation . '</a>'; //DODELAT`
    if (!$mail->send()) {
        exit("$email");
    }
} else {
    $password = $_POST['password'];
    $password = md5($password); //шифруем пароль
    //$id_user = mysqli_query($link,"SELECT user_id FROM Users WHERE username ='$login' AND pwd='$password'");
    $queryUser = "SELECT * FROM Users WHERE username ='$login' AND pwd='$password'";
    $sqlresult = mysqli_query($link, $queryUser);
    $userData = mysqli_fetch_array($sqlresult, MYSQLI_ASSOC);
    $id = $userData['user_id'];
    if ($id == NULL) {
        exit("Извините, введённый вами логин или пароль неверный.");
    } else {
        $queryUser1 = "SELECT * FROM Users WHERE user_id = '$id'  AND  activation_status = 1";
        if (($sqlresult1 = mysqli_query($link, $queryUser1)) == FALSE) {
            exit("1231231232");
        }
        $_SESSION['password'] = $password;
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $userData['user_id'];
        $_SESSION['description'] = $userData['description'];
        $_SESSION['photo'] = $userData['photo'];
        session_write_close(); //закрытие сессии 
        $redir = $_SERVER['HTTP_REFERER'];
        header("location: $redir"); //перенаправление
        header("location: index.php");
    }
}
