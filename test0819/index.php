<?php
require("connectDB.php");
$sqlCommand = <<<sqlStatement
select firstName, lastName, c.cityId, cityName, employeeId
from employee e join city c on e.cityId = c.cityId
sqlStatement;
$result = mysqli_query($link, $sqlCommand);
// var_dump($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Employee</h2>    
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>City</th>
        <th><span class="float-right"><a href="./addEmployee.php" class="btn btn-outline-primary">New</a></span></th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>

      <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row["firstName"] ?></td>
            <td><?= $row["lastName"] ?></td>
            <td><?= $row["cityName"] ?></td>
            <td>
                <span class="float-right">
                    <a href="./editForm.php?id=<?= $row["employeeId"] ?>" class="btn btn-outline-success">Edit </a> |
                    <a href="./Deleteemployee.php?id=<?= $row["employeeId"] ?>" class="btn btn-outline-warning">Delete</a>
                </span>
            </td>
        </tr>
      <?php } ?>


     
      
    </tbody>
  </table>
</div>

</body>
</html>

