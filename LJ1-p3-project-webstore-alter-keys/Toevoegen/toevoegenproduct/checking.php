<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Goed of niet goed?</title>
  <link rel="stylesheet" href="../../style.css">
</head>

<body>
  <?php
  session_start();

  if (isset($_POST["modelname"])) {
    $_SESSION["modelname"] = $_POST["modelname"];
    $_SESSION["price"] = $_POST["price"];
    $_SESSION["categoryid"] = $_POST["categoryid"];
    $_SESSION["brandid"] = $_POST["brandid"];


    echo "<p>Brand Name: ", $_SESSION["modelname"], "</p>";
    echo "<p>Address: ", $_SESSION["price"], "</p>";
    echo "<p>Zipcode: ", $_SESSION["categoryid"], "</p>";
    echo "<p>City: ", $_SESSION["brandid"], "</p>";
  } else {
    echo "<p>Er is iets fout gegaan probeer opnieuw</p>";
  }
  ?>

  <form action="./output.php">
    <input type="submit" value="alles klopt" name="submit">
  </form>
  <form action="../../index.php">
    <input type="submit" value="het klopt niet" name="submit">
  </form>
  <div class="footer">
    &copy; Copyright 2024 AlterKeys
  </div>
</body>

</html>