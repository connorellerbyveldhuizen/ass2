<?php 

$message = '<html><body>';

$message .= '<p>COMP344 Assignment 1, 2019</p>';
$message .= '<p>Patrick witt</p>';
$message .= '<p>4368924</p>';



$message .= '<h1 style="color:#f40;"> Hi! ' . $firstname . " " .  $lastname . '</h1>';

// $message .= '<p>You have registerd in to' . $class .' </p>';

$message .= '<p>You have registered with username : ' . $username . '</p>';

$message .= '<p> COMP344 </p>';

$message .= '<p> You have registered :</p> <ul></ul>';

foreach($students as $student) {
     $message .= $student['FIRSTNAME'];
     $message .= " ";
     $message .= $student['LASTNAME'];
     $message .= "<br>";
     $message .= "<br>";

}

$message .= "Sent From : patrick.witt@students.mq.edu.au - 43689248";


$message .= '</body></html>';

?>