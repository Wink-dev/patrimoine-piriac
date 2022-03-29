<?php  

$to      = 'c.brudes@pb-electricite.fr';

$subject = 'the subject';
$message = 'hello';

$headers = 'From: webmaster@pb-electricite.fr';

$result = mail($to, $subject, $message, $headers);
var_dump($result);

?> 

