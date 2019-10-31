<?php 

$to      = 'patrickjames.witt@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: patrick.witt@students.mq.edu.au.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

?>