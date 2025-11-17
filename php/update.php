<?php
session_start();
require_once __DIR__.'/../includes/db.php';
if(empty($_SESSION['admin'])){http_response_code(403);exit;}
$d=$_POST['content']??[];
$pdo->beginTransaction();
$s=$pdo->prepare('UPDATE site_content SET content=? WHERE id=?');
foreach($d as $id=>$c){$s->execute([$c,intval($id)]);}
$pdo->commit();
header('Location: admin_panel.php');
