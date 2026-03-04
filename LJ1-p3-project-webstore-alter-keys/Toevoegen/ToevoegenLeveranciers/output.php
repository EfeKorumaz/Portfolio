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
    $brandname = $_SESSION["brandname"];
    $adress = $_SESSION["adress"];
    $zipcode = $_SESSION["zipcode"];
    $City = $_SESSION["City"];
    $code = $_SESSION["code"];
    $query = "INSERT INTO brand (brandname, adress, zipcode, city, code)
     VALUES (:brandname, :adress, :zipcode, :City, :code)";

    $stmt = $dbconn->prepare($query);

    $stmt->bindParam(':brandname', $brandname, PDO::PARAM_STR);
    $stmt->bindParam(':adress', $adress, PDO::PARAM_STR);
    $stmt->bindParam(':zipcode', $zipcode, PDO::PARAM_STR);
    $stmt->bindParam(':City', $City, PDO::PARAM_STR);
    $stmt->bindParam(':code', $code, PDO::PARAM_STR);
    $stmt->execute();
    ?>
</body>

</html>