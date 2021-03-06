<?php
header("content-type:text/html; charset=utf-8");

// 0. 請先建立 Class 資料庫 （SetupDB/setup_class.txt）


// 1. 連接資料庫伺服器  // localhost 可能要改成 127.0.0.1 null(資料庫=class),port:8889
// @ 暫停錯誤訊息，die(回報錯誤原因) 結束程式
$link = @mysqli_connect("localhost", "root", "root") or die(mysqli_connect_error());
// var_dump($link);
$result = mysqli_query($link, "set names utf8");        // 設定字元集為utf-8
mysqli_select_db($link, "class");                       // 切換預設資料庫

// 2. 執行 SQL 敘述
$commandText = "select * from students";
$result = mysqli_query($link, $commandText);            // 執行某個針對數據庫的查詢(取得資料)
// var_dump($result);
// echo $result->num_rows;

// $row = mysqli_fetch_assoc($result);
// var_dump($row);
// 3. 處理查詢結果
while ($row = mysqli_fetch_assoc($result))               // mysqli_fetch_assoc() 從結果集中取得一行作為關聯數組
{
  echo "ID：{$row['cID']}<br>";                          // " " 中如果要顯示陣列的內容要用 { }  包住陣列
  echo "Name：{$row['cName']}<br>";                      // or 陣列的' '和外面的{ } 拿掉
  echo "<HR>";
}

// 4. 結束連線
mysqli_close($link);                                    // 中斷連線

echo "<br />-- Done --";
?>
