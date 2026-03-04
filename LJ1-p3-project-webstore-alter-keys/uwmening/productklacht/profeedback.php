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

    if (isset($_POST["submit"])) {
        $_SESSION["firstname"] = $_POST["firstname"];
        $_SESSION["lastname"] = $_POST["lastname"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["complaint"] = $_POST["complaint"];
        $_SESSION["compensation"] = $_POST["compensation"];

        echo "<p>mijn voornaam is: ", $_SESSION["firstname"], "</p>";
        echo "<p>mijn achternaam is: ", $_SESSION["lastname"], "</p>";
        echo "<p>mijn email is: ", $_SESSION["email"], "</p>";
        echo "<p>mijn complaint is: ", $_SESSION["complaint"], "</p>";
        echo "<p>ik verwacht als compensatie:", $_SESSION["compensation"], "</p>";
    } else {
        echo "<p>Er is iets fout gegaan probeer opnieuw</p>";
    }
    ?>
    
  <form action="./prooutput.php" method="post">
    <!-- Display the complaint details here -->
    <input type="submit" value="alles klopt" name="submit">
  </form>
  <form action="./procomplaint.php">
    <input type="submit" value="het klopt niet" name="submit">
  </form>
  
  <div class="footer">
    &copy; Copyright 2024 AlterKeys
  </div>
</body>

</html>
