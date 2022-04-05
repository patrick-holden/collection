<?php
require_once 'db-access.php';

$dB = 'vinoverodb';
$connection = (connectToDb($dB));

function addToDB($pdo){

$query = $pdo->prepare(
  'INSERT INTO `wines` (`name`, `blurb`, `producer`)'
  . ' VALUES (:newName, :newBlurb, :newProducer)'
);

$name = $_POST["name"];
$blurb = $_POST['blurb'];
$producer = $_POST['producer'];

$query->execute([
    'newName' => $name,
    'newBlurb' => $blurb,
    'newProducer' => $producer
]);

}

echo addToDB($connection);
header('Location: index.php');
?>