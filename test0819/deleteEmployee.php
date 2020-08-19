<?php

if(!isset($_GET["id"])){
    die("id not found");
}

$id = $_GET["id"];
if(! is_numeric($id)){
    die("id not a number");
}

require("connectDB.php");
$sql = <<<sqlStatement
    delete from employee where employeeId = $id;
sqlStatement;
mysqli_query($link, $sql);
header("Location: index.php");
exit();

?>