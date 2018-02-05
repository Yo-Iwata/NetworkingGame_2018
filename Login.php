<?php
//-------------------------------------------------
// DB接続準備
//-------------------------------------------------
$dsn  = 'mysql:dbname=NetworkingGameDB;host=127.0.0.1';   //接続先
$user = 'root';         //MySQLのユーザーID
$pw   = 'H@chiouji1';   //MySQLのパスワード

if (array_key_exists('name', $_GET)) {
	$sql = 'insert into User(name) values(:name)';
	$dbh = new PDO($dsn, $user, $pw);   //接続
	$sth = $dbh->prepare($sql);         //SQL準備
	$sth->bindValue(':name', $_GET['name'], PDO::PARAM_STR);	
	$sth->execute();
}
$sql = 'select id from User';
$dbh = new PDO($dsn, $user, $pw);   //接続
$sth = $dbh->prepare($sql);         //SQL準備
$sth->execute();
$id = $sth->rowCount();
header('Access-Control-Allow-Origin: *');
echo json_encode($id);
