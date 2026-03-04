<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bestelregels en Producten</title>
  <link rel="stylesheet" href="../../style.css">
</head>

<body>
  <header>
    <img src="../../img/Alter_Keyslogo.png" alt="LOGO">
    <nav>
      <ul>
        <div class="dropdown">
          <a href="../../index.php">Home</a>
        </div>
        <div class="dropdown">
          <a href="./index.php">Bedrijf</a>
          <div class="dropdown-content">
            <a href="../Bedrijf/eco.php">Eco vriendelijk</a>
            <a href="../Bedrijf/LER.php">Levering en retour</a>
            <a href="../Bedrijf/medewerkers.php">Medewerkers</a>
            <a href="../Bedrijf/doelstelling.php">Doelstelling</a>
            <a href="../Bedrijf/geschiedenis.php">Geschiedenis</a>
          </div>
        </div>
        <div class="dropdown">
          <a href="./index.php">Overzichten</a>
          <div class="dropdown-content">
            <a href="#">Enkelvoudig</a>
            <a href="./Overzichten/klanten.php">klanten</a>
            <a href="./Overzichten/Landen.php">Landen</a>
            <a href="./Overzichten/category.php">Category</a>
            <a href="./Overzichten/Leverancier.php">Leveranciers</a>
            <a href="">Aankopen</a>
            <a href="">Product</a>
          </div>
        </div>
        </div>
        <div class="dropdown">
          <a href="./index.php">Informatie</a>
          <div class="dropdown-content">
            <a href="./index.php">Levering per land</a>
            <a href="./index.php">Product per catergorie</a>
            <a href="./index.php">Aankoop per klant</a>
            <a href="./index.php">Regels per aankoop</a>
            <a href="./index.php">Aantal per product</a>
            <a href="./index.php">Deel per product</a>
            <a href="./index.php">Deel per catergorie</a>
            <a href="./index.php">Product prijs -Levering</a>
            <a href="./index.php">Product prijs -Catergorie</a>
            <a href="./index.php">Totaal prijs -Aankoop</a>
          </div>
        </div>
        <div class="dropdown">
          <a href="../index.php">Toevoegen</a>
          <div class="dropdown-content">
            <a href="../index/formulieren.php">Klant</a>
            <a href="../index.php">Leverancier</a>
            <a href="../index.php">Land</a>
            <a href="">Product</a>
            <a href="../category.php">Category</a>
            <a href="../index.php">Deel product</a>
          </div>
        </div>
        <div class="dropdown">
          <a href="./index.php">Uw Mening</a>
          <div class="dropdown-content">
            <a href="./index.php">Klacht product</a>
            <a href="./index.php">Compliment site</a>
            <a href="./uwmening/complaint/complaint.php">Klacht site</a>
            <a href="./index.php">Klacht medewerker</a>
            <a href="./uw mening/klachtmedewerker.php">Compliment keuzes</a>
          </div>
        </div>
      </ul>
    </nav>
  </header>

  <section class="bg-asset">
    <img src="../../assets/mount2.png" class="mount2">
    <img src="../../assets/mount1.png" class="mount1">
    <img src="../../assets/bush2.png" class="bush2">

    <h1 class="title">Bestelregels en Producten</h1>

    <img src="../../assets/bush1.png" class="bush1">
    <img src="../../assets/leaf2.png" class="leaf2">
    <img src="../../assets/leaf1.png" class="leaf1">
  </section>

  <section class="about">
    <div class="filter">
      <p>Filter: </p>
      <form action="" method="post">

        <div>
          <input type="search" placeholder="Productnaam" name="product_finder" id="search">
        </div>
        <div>
          <input type="submit" value="Zoeken" name="product_searcher">
        </div>
      </form>
    </div>

    <?php
    require_once("../../dbconn.php");
    $query = "SELECT orders.id, orders.orderdate, orders.quantity, orders.land, customer.firstname AS username, model.modelname AS modelname
    FROM orders
    INNER JOIN customer ON customer.id = orders.userid
    INNER JOIN model ON model.id = orders.productid
    ";

    if (isset($_POST['product_searcher'])) {
      $productName = "%" . $_POST['product_finder'] . "%";

      if ($productName) {
        $query .= " WHERE model.modelname LIKE :modelname";
      }

      try {
        $statement = $dbconn->prepare($query);
      } catch (PDOException $e) {
        die("Failed to connect to database: " . $e->getMessage());
      }

      $statement->bindValue('modelname', $productName);
      $statement->execute();
    } else {
      try {
        $statement = $dbconn->prepare($query);
      } catch (PDOException $e) {
        die("Failed to connect to database: " . $e->getMessage());
      }

      $statement->execute();
    }

    echo "<div class='cal'>
    <br><p>Resultaten: " . $statement->rowCount() . "</p>
    ";
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($statement->rowCount() > 0) {
      foreach ($results as $row) {
        echo "<table class='table'>
                <tr>
                    <th>Bestelregel ID:</th>
                    <td>". $row['id'] . "</td>
                </tr>
                <tr>
                    <th>order datum</th>
                    <td>" . $row['orderdate'] . "</td>
                </tr>
                <tr>
                    <th>aantal</th>
                    <td>" . $row['quantity'] . "</td>
                </tr>
                <tr>
                    <th>land</th>
                    <td>" . $row['land'] . "</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>" . $row['username'] . "</td>
                </tr>
                <tr>
                    <th>Product</th>
                    <td>" . $row['modelname'] . "</td>
                </tr>
                </table>
                <br>
            ";
      }
    }
    echo "</div>";

    ?>
  </section>

  <div class="footer">
    &copy; Copyright 2024 AlterKeys
  </div>
</body>
<script src="../../script.js"></script>

</html>