<?php

function sendEmail($to, $subject, $body) {
require("./PHPMailer-master/src/Exception.php");
require("./PHPMailer-master/src/PHPMailer.php");
require("./PHPMailer-master/src/SMTP.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();     
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com'; // Thay bằng máy chủ SMTP của bạn
        $mail->Port = 465; // Thay bằng cổng SMTP của bạn
        $mail->isHTML(true);
        $mail->Username = 'devtestcongviec@gmail.com'; 
        $mail->Password = 'odkk ezoc gkxi dynk'; 
        $mail->setFrom('devtestcongviec@gmail.com', 'The Quang');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->addAddress($to);

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false; 
    }
}
// aowg mxjw qavv sapi: mật khẩu cho nguyenthequangdev
?>