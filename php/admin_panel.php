<?php
session_start();
require_once __DIR__.'/../includes/db.php';
if(empty($_SESSION['admin'])){header('Location: admin_login.php');exit;}
$q=$pdo->query('SELECT id,key_name,content FROM site_content');
$r=$q->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link rel="stylesheet" href="../css/style.css"><title>Admin</title></head>
<body><main class="container"><h1>Admin Panel</h1><a href="logout.php">Déconnexion</a>
<form method="post" action="update.php">
<?php foreach($r as $x):?>
<label><?=htmlspecialchars($x['key_name'])?></label>
<textarea name="content[<?=intval($x['id'])?>]" required><?=htmlspecialchars($x['content'])?></textarea>
<?php endforeach;?>
<button type="submit" class="btn">Sauvegarder</button></form></main></body></html>
