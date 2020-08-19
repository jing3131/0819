<?php
if(isset($_POST["cancelbtn"])){
  header("Location: index.php");
  exit();
}

if(!isset($_GET["id"])){
  die("id not found");
}

$id = $_GET["id"];
if(! is_numeric($id)){
  die("id not a number");
}

$id = $_GET["id"];
// echo $id;
require("connectDB.php");

if(isset($_POST["okbtn"])){
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $cityId = $_POST["cityId"];

  $sql = <<<sqlStatement
    update employee set 
      firstName = '$firstName',
      lastName = '$lastName',
      cityId = $cityId
    where employeeId = $id;
  sqlStatement;
  echo $sql;
  mysqli_query($link, $sql);
  
  header("Location: index.php");
  exit();
}
else{
  $sql = <<<sqlStatement
    select * from employee where employeeId = $id;
  sqlStatement;

  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_assoc($result);           // 一個陣列
}
// var_dump($row);

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form style="margin:50px" method="post">
  <div class="form-group row">
    <label for="firstName" class="col-2 col-form-label">First Name:</label> 
    <div class="col-6">
      <input id="firstName" name="firstName" type="text" class="form-control" value="<?= $row["firstName"] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="lastName" class="col-2 col-form-label">Last Name:</label> 
    <div class="col-6">
      <input id="lastName" name="lastName" type="text" class="form-control" value="<?= $row["lastName"] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-2">City</label> 
    <div class="col-6">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityId" id="city_0" type="radio" class="custom-control-input" value="2"
          <?= ($row["cityId"]==2) ? "checked": "" ?>
        > 
        <label for="city_0" class="custom-control-label">Taipei</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityId" id="city_1" type="radio" class="custom-control-input" value="4"
          <?= ($row["cityId"]==4) ? "checked": "" ?>
        > 
        <label for="city_1" class="custom-control-label">Taichung</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityId" id="city_2" type="radio" class="custom-control-input" value="6"
          <?= ($row["cityId"]==6) ? "checked": "" ?>
        > 
        <label for="city_2" class="custom-control-label">Tainan</label>
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-2 col-6">
      <button name="okbtn" type="submit" class="btn btn-outline-primary">Submit</button>
      <button name="cancelbtn" type="submit" class="btn btn-outline-warning">Cancel</button>
    </div>
  </div>
</form>
</body>
</html>