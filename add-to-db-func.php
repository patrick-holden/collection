<?php
require_once 'db-access-funcs.php';

$dB = 'vinoverodb';
$connection = connectToDb($dB);

function uploadFile(): string
{
  try {
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it as invalid.
    if (!isset($_FILES['newFile']['error'])
      || is_array($_FILES['newFile']['error'])
    ) {
      throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['newFile']['error'] value.
    switch ($_FILES['newFile']['error']) {
      case UPLOAD_ERR_OK:
        break;
      case UPLOAD_ERR_NO_FILE:
        throw new RuntimeException('No file sent.');
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
        throw new RuntimeException('Exceeded filesize limit.');
      default:
        throw new RuntimeException('Unknown error.');
    }

    $tempFilename = $_FILES['newFile']['tmp_name'];

    $fileSize = filesize($tempFilename);

    if ($fileSize === 0) {
      throw new RuntimeException('The file is empty.');
    }

    if ($fileSize > 100000000) {
      throw new RuntimeException('Exceeded filesize limit.');
    }

    // As the $_FILES['upfile']['mime'] value could be tampered with we will
    // check it ourselves.
    $finfo = new finfo(FILEINFO_MIME_TYPE);

    $fileFormat = $finfo->file($tempFilename);

    $allowedTypes = [
      'image/png' => 'png',
      'image/jpeg' => 'jpg'
    ];

    $isValidFormat = in_array(
      $fileFormat,
      array_keys($allowedTypes),
      true);

    if (false === $isValidFormat) {
      throw new RuntimeException('Invalid file format.');
    }

    $extension = $allowedTypes[$fileFormat];

    // The uploaded file needs naming uniquely.
    // We should not trust $_FILES['upfile']['name'] in case it contains
    // something dodgy.
    // Hashing the given name will make it both unique and safe.
    $safeUniqueName = sha1_file($tempFilename) . '.' . $extension;

    // __DIR__ is the directory of the current PHP file
    $targetDirectory = __DIR__ . '/Images';
    $newFilepath = $targetDirectory . '/' . $safeUniqueName;

    if (!move_uploaded_file($tempFilename, $newFilepath)) {
      throw new RuntimeException('Failed to move uploaded file.');
    }

    return '-success-' . $safeUniqueName;

  } catch (RuntimeException $e) {
    return $e->getMessage();
  }
}


$imageString = uploadFile(); // this calls the function and puts the return value in $imageString

if (strpos(strtolower($imageString), 'success')) { // if the variable contains the string 'success'

  $imageString = substr($imageString, 9); // remove the first 9 characters from -success-
} else {
  $imageString = '';
}

function addToDB($pdo, string $imageName)
{

  $query = $pdo->prepare(
    'INSERT INTO `wines` (`name`, `blurb`, `producer`, `image`)'
    . ' VALUES (:newName, :newBlurb, :newProducer, :newImage);'
  );

  $name = $_POST["name"];
  $blurb = $_POST['blurb'];
  $producer = $_POST['producer'];
  $image = $imageName;

  $query->execute([
    'newName' => $name,
    'newBlurb' => $blurb,
    'newProducer' => $producer,
    'newImage' => $image
  ]);

  $wineId = (int)$pdo->lastInsertId();

  $query = $pdo->prepare(
    'INSERT INTO `junc_grape` (`wines_id`, `grape_id`)'
    . ' VALUES (:wineId, :existingGrapeId);'
  );
  if (isset($_POST['grape'])) {
    for ($i = 0; $i < count($_POST['grape']); $i++) {
      $existingGrapeId = $_POST['grape'][$i];

      $query->execute([
        'wineId' => $wineId,
        'existingGrapeId' => $existingGrapeId,
      ]);
    }
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
  if (isset($_POST['colour'])) {
    for ($i = 0; $i < count($_POST['colour']); $i++) {

      $existingColourId = $_POST['colour'][$i];

      $query->execute([
        'wineId' => $wineId,
        'existingColourId' => $existingColourId,
      ]);
    }
  }
}

addToDB($connection, $imageString);
header('Location: index.php');
