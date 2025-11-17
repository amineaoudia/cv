<?php
session_start();
require_once __DIR__.'/../includes/db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $u=trim($_POST['user']??'');
  $p=trim($_POST['pass']??'');
  $s=$pdo->prepare('SELECT id,password_hash FROM admins WHERE username=?');
  $s->execute([$u]);
  $r=$s->fetch(PDO::FETCH_ASSOC);
  if($r&&password_verify($p,$r['password_hash'])){$_SESSION['admin']=true;header('Location: admin_panel.php');exit;}
  $err='Identifiants invalides';
}
?>
<!doctype html>
<html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link rel="stylesheet" href="../css/style.css"><title>Connexion Admin</title></head>
<body><main class="container"><h1>Connexion Admin</h1><form method="post">
<label>Utilisateur</label><input name="user" required>
<label>Mot de passe</label><input name="pass" type="password" required>
<button type="submit" class="btn">Connexion</button></form></main></body></html>
