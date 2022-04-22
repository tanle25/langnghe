<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

@include 'Common.php';
@include 'Image.php';
if (!function_exists('DummyFunction')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function DummyFunction()
    {

    }
}

if (!function_exists('get_avatar')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function get_avatar($user)
    {
        $str_image = $user->image;
        if ($str_image == null || $str_image == "") {
            $image = config('admin.base_url') . 'storage/app/avatars/no_image.jpg';
        } else {
            $image = config('admin.base_url') . 'storage/app/avatars/' . $str_image;
        }
        return $image;
    }
}

if (!function_exists('send_mail')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function send_mail($email, $title, $subject, $content)
    {
        $mail = new PHPMailer(true);
        try
        {
            $mail->CharSet = 'UTF-8'; // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'tranhoang750@gmail.com'; // SMTP username
            $mail->Password = 'bejmftnaedixeibg'; // SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587; // TCP port to connect to
            $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true,
                    ),
                )
            );
            $mail->setFrom('trinhphuongk18@gmail.com', $title);
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $content;
            $mail->send();
        } catch (Exception $e) {
        }
    }
}