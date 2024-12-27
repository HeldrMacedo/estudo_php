<?php
require_once 'PHPMailer.php';
require_once 'PHPMailAdapter.php';

$mail = new PHPMailAdapter;
$mail->setFrom('johndoe@example.com', 'John Doe');
$mail->addAddress('johndoe@example.com', 'John Doe');
$mail->setSubject('Oii');
$mail->setTextBody('Isso é um teste');
$mail->send();
