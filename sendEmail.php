<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['email'])){
   
    $email = $_POST['email'];
    $body=rand(10,1000000);
 // echo $email;
  //echo $body;
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "moditejasv@gmail.com";
    $mail->Password = 'chzpkedktegamvyc';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email);
    $mail->addAddress($email);
    $mail->Subject = ("forgot password mail from Inventory Management System");
    $mail->Body = "Your code is ".$body;

    if($mail->send()){
        $status = "success";
        $_SESSION['email']=$email;
        $_SESSION['rcode']=$body;
        $_SESSION['message'] = "code  is sent to your email!";
        header('Location:referencecode.php');
    }
    else
    {
        $status = "failed";
        $_SESSION['message'] = "code  is sent to your email!";
        header('Location:forgetpassword.php');
    }

   // exit(json_encode(array("status" => $status, "response" => $response)));
}

?>
      