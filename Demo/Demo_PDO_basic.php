<?php
header("content-type:text/html; charset=utf-8");

// 0. 請先建立 Class 資料庫 （執行 class.sql）

// 1. 連接資料庫伺服器
$db = new PDO("mysql:host=localhost;dbname=class;port=3306", "root", "");       // 新增一個PDO的連線
$db->exec("set names utf8");                                  // exec()主要是針對沒有結果集合返回的操作，不會從一條 SELECT 語句中返回結果，譬如：INSERT、UPDATE、DELETE
// $db->exec("set character set utf8");

// 2. 執行 SQL 敘述
$result = $db->query("select * from students");               // query 擷取出比較複雜的資料

// 3. 處理查詢結果
while ($row = $result->fetch())
{
  echo "ID：{$row['cID']}<br>";
  echo "Name：{$row['cName']}<br>";
  echo "<HR>";
}

// 4. 結束連線
$db = null;

echo "<br />-- Done --";
?>
