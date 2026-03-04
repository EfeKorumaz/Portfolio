<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bedankt!</title>
  <link rel="stylesheet" href="../../style.css">
  <?php
    require "../../dbconn.php";
    ?>
</head>

<body>
  <?php
    session_start();
    ?>
  <p>Uw complaint is succesvol verstuurd!</p>
  <button><a href="../../index.php">Terug naar home</a></button>

  <?php
    $firstname = $_SESSION["firstname"];
    $lastname = $_SESSION["lastname"];
    $email = $_SESSION["email"];
    $complaint = $_SESSION["complaint"];
    $compensation = $_SESSION["compensation"];
    $query = "INSERT INTO productcomplain (firstname, lastname, email, complaint, compensation)
     VALUES (:firstname, :lastname, :email, :complaint, :compensation)";

    $stmt = $dbconn->prepare($query);
    
    $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':complaint', $complaint, PDO::PARAM_STR);
    $stmt->bindParam(':compensation', $compensation, PDO::PARAM_STR);
    $stmt->execute();
    ?>
</body>

</html>