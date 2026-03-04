<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keyboard Selectie</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <img src="../img/Alter_Keyslogo.png" alt="LOGO">
    <nav>
      <ul>
        <div class="dropdown">
          <a href="./index.php" class="active">Home</a>
        </div>
        <div class="dropdown">
          <a href="./index.php">Bedrijf</a>
          <div class="dropdown-content">
            <a href="./Bedrijf/eco.php">Eco vriendelijk</a>
            <a href="./Bedrijf/LER.php">Levering en retour</a>
            <a href="./Bedrijf/medewerkers.php">Medewerkers</a>
            <a href="./Bedrijf/doelstelling.php">Doelstelling</a>
            <a href="./Bedrijf/geschiedenis.php">Geschiedenis</a>
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
          <a href="./index.php">Toevoegen</a>
          <div class="dropdown-content">
            <a href="./index/formulieren.php">Klant</a>
            <a href="./index.php">Leverancier</a>
            <a href="./index.php">Land</a>
            <a href="">Product</a>
            <a href="./Overzichten/category.php">Category</a>
            <a href="./index.php">Deel product</a>
          </div>
        </div>
        <div class="dropdown">
          <a href="./index.php">Uw Mening</a>
          <div class="dropdown-content">
            <a href="./uwmening/productklacht/procomplaint.php">Klacht product</a>
            <a href="./uwmening/complaint/complaint.php">Compliment site</a>
            <a href="./uwmening/complaint/complaint.php">Klacht site</a>
            <a href="./uwmening/complaintemployee/klachtmedewerker.php">Klacht medewerker</a>
            <a href="./uwmening//klachtmedewerker.php">Compliment keuzes</a>
          </div>
        </div>
      </ul>
    </nav>
  </header>

  <section class="bg-asset">
    <img src="../assets/mount2.png" class="mount2">
    <img src="../assets/mount1.png" class="mount1">
    <img src="../assets/bush2.png" class="bush2">

    <h1 class="title">Leveranciers</h1>

    <img src="../assets/bush1.png" class="bush1">
    <img src="../assets/leaf2.png" class="leaf2">
    <img src="../assets/leaf1.png" class="leaf1">
  </section>
<body>
<?php
require_once("../dbconn.php"); // Establish database connection

// Initialize selector variable
$selector = isset($_POST["categoryName"]) ? "%" . $_POST["categoryName"] . "%" : "%%";

// First SQL query to fetch data from the 'brand' table
$qrySelectBars = $dbconn->prepare("SELECT * FROM brand WHERE brandname LIKE :selector");
$qrySelectBars->bindValue(":selector", $selector);
$qrySelectBars->execute();
$selectedBars = $qrySelectBars->fetchAll(PDO::FETCH_ASSOC);

// Second SQL query to fetch aggregated data from the 'country' and 'brand' tables
$qrySelectCountries = $dbconn->prepare("SELECT country.name, country.code, COUNT(brand.id) AS brandid
                                        FROM country
                                        INNER JOIN brand ON country.code = brand.code
                                        GROUP BY country.idcountry");
$qrySelectCountries->execute();
$selectedCountries = $qrySelectCountries->fetchAll(PDO::FETCH_ASSOC);
?>
    </section>
    <section class="about">
        <form action="#" method="post">
            <label for="placeName">Categorynaam</label>
            <input type="text" name="categoryName">
            <input type="submit" value="Selecteren" name="selectCityName">
        </form>
        <h2>Leveranciers</h2>
        <table>
            <thead>
                <tr>
                    <th>Leverancier</th>
                    <th>Adres</th>
                    <th>Postcode</th>
                    <th>Plaats</th>
                    <th>Land</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Output data from the first query
                foreach ($selectedBars as $barData) {
                    echo "<tr>";
                    echo "<td>" . $barData['brandname'] . "</td>";
                    echo "<td>" . $barData['adress'] . "</td>";
                    echo "<td>" . $barData['zipcode'] . "</td>";
                    echo "<td>" . $barData['city'] . "</td>";
                    echo "<td>" . $barData['code'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <h2>Leveranciers per land</h2>
        <table>
            <thead>
                <tr>
                    <th>Land</th>
                    <th>Landcode</th>
                    <th>Aantal leveranciers</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Output data from the second query
                foreach ($selectedCountries as $countryData) {
                    echo "<tr>";
                    echo "<td>" . $countryData['name'] . "</td>";
                    echo "<td>" . $countryData['code'] . "</td>";
                    echo "<td>" . $countryData['brandid'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
    
    <script src="../script.js"></script>
</body>

</html>
