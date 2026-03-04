<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bedankt!</title>
  <link rel="stylesheet" href="../../style.css">
  <?php
    require_once "../../dbconn.php";
    ?>
</head>

<body>
  <?php
    session_start();
    ?>
  <p>Uw Compliment is succesvol verstuurd!</p>
  <button><a href="../../index.php">Terug naar home</a></button>

  <?php
    $modelname = $_SESSION["modelname"];
    $price = $_SESSION["price"];
    $categoryid = $_SESSION["categoryid"];
    $brandid = $_SESSION["brandid"];
    $query = "INSERT INTO model (modelname, price, categoryid, brandid)
     VALUES (:modelname, :price, :categoryid, :brandid)";

    $stmt = $dbconn->prepare($query);
    $stmt->bindParam(':modelname', $modelname, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':categoryid', $categoryid, PDO::PARAM_STR);
    $stmt->bindParam(':brandid', $brandid, PDO::PARAM_STR);
    $stmt->execute();
    ?>
</body>

</html>