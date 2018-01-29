<?php
//-------------------------------------------------
// DB接続準備
//-------------------------------------------------
$dsn  = 'mysql:dbname=NetworkingGameDB;host=127.0.0.1';   //接続先
$user = 'root';         //MySQLのユーザーID
$pw   = 'H@chiouji1';   //MySQLのパスワード

$sql = 'select id from user';
$dbh = new PDO($dsn, $user, $pw);   //接続
$sth = $dbh->prepare($sql);         //SQL準備
$sth->execute();
$buff = $sth->fetch(PDO::FETCH_ASSOC);
$id = $buff['id'];
header('Access-Control-Allow-Origin: *');
echo json_encode($id);
