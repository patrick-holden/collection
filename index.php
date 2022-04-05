<?php
require_once 'db-access.php';
require_once 'collection-loop.php';
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="CSS/normalize.css" rel="stylesheet">	
  <link href="CSS/styles.css" rel="stylesheet">	
  <title>Vino Vero</title>
</head>

<body>
<?php
$db = 'vinoverodb';
$result = fetchAllWines(connectToDB($db));
?>

<section  id="panel">
  <h2>
    <a href="" target="_blank">
      <span id="the">
        Some
      </span>
      <br>
      VinoVero
      <br>
      <span id="collected">
        in a collection
      </span>
    </a>
  </h2>
  <div  id="test-flex">
    <?php 
      echo loopCollection($result); ?>
  </div>
</section>
</body>

</html>
