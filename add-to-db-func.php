<?php
require_once 'db-access-funcs.php';

$dB = 'vinoverodb';
$connection = (connectToDb($dB));


function addToDB($pdo)
{

  $query = $pdo->prepare(
    'INSERT INTO `wines` (`name`, `blurb`, `producer`)'
    . ' VALUES (:newName, :newBlurb, :newProducer);'
  );

  $name = $_POST["name"];
  $blurb = $_POST['blurb'];
  $producer = $_POST['producer'];


  $query->execute([
    'newName' => $name,
    'newBlurb' => $blurb,
    'newProducer' => $producer,
  ]);

  $wineId = (int)$pdo->lastInsertId();

  $query = $pdo->prepare(
    'INSERT INTO `junc_grape` (`wines_id`, `grape_id`)'
    . ' VALUES (:wineId, :existingGrapeId);'
  );

  for ($i = 0; $i < count($_POST['grape']); $i++) {

    $existingGrapeId = $_POST['grape'][$i];

    $query->execute([
      'wineId' => $wineId,
      'existingGrapeId' => $existingGrapeId,
    ]);
  }

  $query = $pdo->prepare(
    'INSERT INTO `junc_region` (`wines_id`, `region_id`)'
    . ' VALUES (:wineId, :existingRegionId);'
  );

  $existingRegionId = $_POST['region'];

  $query->execute([
    'wineId' => $wineId,
    'existingRegionId' => $existingRegionId
  ]);

  $query = $pdo->prepare(
    'INSERT INTO `junc_colour` (`wines_id`, `colour_id`)'
    . ' VALUES (:wineId, :existingColourId);'
  );

  for ($i = 0; $i < count($_POST['colour']); $i++) {

    $existingColourId = $_POST['colour'][$i];

    $query->execute([
      'wineId' => $wineId,
      'existingColourId' => $existingColourId,
    ]);
  }
}

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

echo addToDB($connection);
header('Location: index.php');

?>