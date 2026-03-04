<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Klanten</title>
  <link rel="stylesheet" href="../../style.css">
</head>

<body>
  <header>
    <img src="../../img/Alter_Keyslogo.png" alt="LOGO">
    <nav>
      <ul>
        <div class="dropdown">
          <a href="../index.php" class="active">Home</a>
        </div>
        <div class="dropdown" class="active">
          <a href="../index.php">Bedrijf</a>
          <div class="dropdown-content">
            <a href="./eco.php">Eco vriendelijk</a>
            <a href="./LER.php">Levering en retour</a>
            <a href="./medewerkers.php">Medewerkers</a>
            <a href="./doelstelling.php">Doelstelling</a>
            <a href="./geschiedenis.php">Geschiedenis</a>
          </div>
        </div>
        <div class="dropdown">
          <a href="../index.php">Overzichten</a>
          <div class="dropdown-content">
            <a href="#">Enkelvoudig</a>
            <div>
              <a href="">Categorieën</a>
              <a href="">Klanten</a>
              <a href="">Leveranciers</a>
              <a href="">Producten</a>
              <a href="">Aankopen</a>
              <a href="">Landen</a>
              <a href="">Product</a>
            </div>
            <a href="../index.php">Sublink 2</a>
          </div>
        </div>
        <div class="dropdown">
          <a href="../index.php">Informatie</a>
          <div class="dropdown-content">
            <a href="./index.php">Sublink 1</a>
            <a href="./index.php">Sublink 2</a>
            <a href="./index.php">Sublink 3</a>
          </div>
        </div>
        <div class="dropdown">
          <a href="../index.php">Toevoegen</a>
          <div class="dropdown-content">
            <a href="./index.php">Klant</a>
            <a href="./index.php">Leverancier</a>
            <a href="./index.php">Land</a>
            <a href="./index.php">Product</a>
            <a href="./index.php">Categorie</a>
            <a href="./index.php">Deel product</a>
          </div>
        </div>
        <div class="dropdown">
          <a href="../index.php">Uw Mening</a>
          <div class="dropdown-content">
            <a href="./index.php">Klacht product</a>
            <a href="./index.php">Compliment site</a>
            <a href="./index.php">Klacht site</a>
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

    <h1 class="title">Klanten</h1>

    <img src="../../assets/bush1.png" class="bush1">
    <img src="../../assets/leaf2.png" class="leaf2">
    <img src="../../assets/leaf1.png" class="leaf1">
  </section>


  <section class="about">
    <?php
  require_once("../../dbconn.php");

  $query = $dbconn->prepare(
  "SELECT
  customer.id AS klantid,
  customer.firstname AS voornaam,
  customer.lastname AS achternaam,
  customer.woonplaats AS woonplaats,
  customer.adress AS adress,
  COUNT(orders.quantity) AS Aantal
FROM
  customer
INNER JOIN orders ON customer.id = orders.userid    
GROUP BY
  customer.id
ORDER BY
  customer.id
");

    // Execute the query
    $query->execute();

    // Fetch the results
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

  ?>
    <table>
      <tr>
        <th>klant</th>
        <th>Aantal producten</th>
        <th>voornaam</th>
        <th>achternaam</th>
        <th>woonplaats</th>
        <th>adress</th>
      </tr>
      <?php foreach ($results as $row): ?>
      <tr>
        <td><?php echo ($row['klantid']); ?></td>
        <td><?php echo ($row['Aantal']); ?></td>
        <td><?php echo ($row['voornaam']); ?></td>
        <td><?php echo ($row['achternaam']); ?></td>
        <td><?php echo ($row['woonplaats']); ?></td>
        <td><?php echo ($row['adress']); ?></td>
      </tr>
      <?php endforeach; ?>
    </table>

  </section>