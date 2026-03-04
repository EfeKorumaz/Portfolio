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

    if (isset($_POST["brandname"])) {
        $_SESSION["brandname"] = $_POST["brandname"];
        $_SESSION["adress"] = $_POST["adress"];
        $_SESSION["zipcode"] = $_POST["zipcode"];
        $_SESSION["City"] = $_POST["City"];
        $_SESSION["code"] = $_POST["code"];

        echo "<p>Brand Name: ", $_SESSION["brandname"], "</p>";
        echo "<p>Address: ", $_SESSION["adress"], "</p>";
        echo "<p>Zipcode: ", $_SESSION["zipcode"], "</p>";
        echo "<p>City: ", $_SESSION["City"], "</p>";
        echo "<p>code: ", $_SESSION["code"], "</p>";
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