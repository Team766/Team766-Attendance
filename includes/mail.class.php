<?php

/* * * *** *** *** *** ***
 * @package Team766-Attendance
 * @file    mail.class.php 
 * @start   Aug 10, 2014
 * @author  pjztam
 * @link    attendance.team766.com
 * ** *** *** *** *** *** */

/**
 * Description of mail
 *
 * @author pjztam
 */
class mail {

    function sendConfirmationEmail($student_name, $email_address) {
        require 'PHPmailer/PHPMailerAutoload.php';
        $conf = require 'config.php';
        $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $conf['email_Host'];  // Specify main and backup SMTP servers
        $mail->SMTPAuth = $conf['email_SMTPAuth'];
        $mail->AuthType = $conf['email_AuthType'];        // Enable SMTP authentication
        $mail->Username = $conf['email_Username'];                // SMTP username
        $mail->Password = $conf['email_Password'];                         // SMTP password


        $mail->From = $conf['email_From'];
        $mail->FromName = $conf['email_FromName'];


        $mail->addAddress($email_address, $student_name);     // Add a recipient


        $mail->WordWrap = 100;                                 // Set word wrap to 50 characters


        $mail->Subject = 'Welcome to the Team766-Attendance System';
        $mail->Body = 'Thanks for signing up to the Team766-Attendance system.';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo '';
        }
    }

}
