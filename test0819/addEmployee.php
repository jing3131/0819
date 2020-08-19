<?php

if(isset($_POST["okbtn"])){
  // echo "hello";
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $cityId = $_POST["cityId"];
  require("connectDB.php");
  $sqlCommand = <<<sqlStatement
    INSERT INTO employee (firstName, lastName, cityId) 
    VALUES('$firstName','$lastName',$cityId);
  sqlStatement;
  mysqli_query($link, $sqlCommand);
  header("Location: index.php");
  exit();
}

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
<!-- mehtod="post" -->
<form style="margin:50px" method="post">
  <div class="form-group row">
    <label for="firstName" class="col-2 col-form-label">First Name:</label> 
    <div class="col-6">
      <input id="firstName" name="firstName" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="lastName" class="col-2 col-form-label">Last Name:</label> 
    <div class="col-6">
      <input id="lastName" name="lastName" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-2">City</label> 
    <div class="col-6">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityId" id="city_0" type="radio" class="custom-control-input" value="2"> 
        <label for="city_0" class="custom-control-label">Taipei</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityId" id="city_1" type="radio" class="custom-control-input" value="4"> 
        <label for="city_1" class="custom-control-label">Taichung</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityId" id="city_2" type="radio" checked="checked" class="custom-control-input" value="6"> 
        <label for="city_2" class="custom-control-label">Tainan</label>
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-2 col-6">
      <button name="okbtn" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
</body>
</html>