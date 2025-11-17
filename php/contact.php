<?php
require_once __DIR__.'/../includes/db.php';
$name=trim($_POST['name']??'');
$email=trim($_POST['email']??'');
$message=trim($_POST['message']??'');
if(!$name||!$email||!$message){http_response_code(400);exit;}
$stmt=$pdo->prepare('INSERT INTO contacts(name,email,message,created_at)VALUES(?,?,?,NOW())');
$stmt->execute([$name,$email,$message]);
$to='votre-email@example.com';
$subject='Message depuis le site';
$body=\"Nom: $name\\nEmail: $email\\n$message\";
$headers=\"From: $email\";
@mail($to,$subject,$body,$headers);
http_response_code(200);
echo 'OK';
