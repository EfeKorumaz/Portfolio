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
    $firstname = $_SESSION["firstname"];
    $lastname = $_SESSION["lastname"];
    $email = $_SESSION["email"];
    $compliment = $_SESSION["compliment"];
    $query = "INSERT INTO compliment (firstname, lastname, email, compliment)
     VALUES (:firstname, :lastname, :email, :compliment)";

    $stmt = $dbconn->prepare($query);

    $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':compliment', $compliment, PDO::PARAM_STR);
    $stmt->execute();
    ?>
</body>

</html>