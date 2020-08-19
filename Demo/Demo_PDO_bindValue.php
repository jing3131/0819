<?php

if (!isset($_GET["id"])) {
	die("id not found.");
}
$id = $_GET["id"];

$pdo = new PDO("mysql:host=127.0.0.1;dbname=northwind", 'root', '');

// prepare 聲明
// : 後面屬於placeholder
$cmd = $pdo->prepare("select ProductID, ProductName, UnitPrice from products where productid = :pid lock in share mode");
$cmd->bindValue(":pid", $id);

$cmd->execute();								// 執行
$row = $cmd->fetch();
echo "$id => {$row['ProductName']}"; 


