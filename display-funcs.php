<?php
require_once 'Wine.php';

function createArrayOfWineObjects(array $winesDb): array
{
  $wines = [];
  $currentId = -1;
  foreach ($winesDb as $wine) {
    $wineName = $wine['name'];
    $wineBlurb = $wine['blurb'];
    $wineProducer = $wine['producer'];
    $wineColour = $wine['colour'];
    $wineGrape = $wine['grape'];

    if ($wine['id'] !== $currentId) {

      if ($wineName === null) {
        $wineName = '';
      }

      if ($wineBlurb === null) {
        $wineBlurb = '';
      }

      if ($wineProducer === null) {
        $wineProducer = '';
      }

      if ($wineColour === null) {
        $wineColour = '';
      }

      if ($wineGrape === null) {
        $wineGrape = '';
      }
      $wineRegion = $wine['region'];
      if ($wineRegion === null) {
        $wineRegion = '';
      }
      $wineCountry = $wine['country'];
      if ($wineCountry === null) {
        $wineCountry = '';
      }
      $wineImage = $wine['image'];
      if ($wineImage === null) {
        $wineImage = '';
      }

      $wineObj = new Wine(
        $wine['id'],
        $wineName,
        $wineBlurb,
        $wineProducer,
        $wineImage,
        $wineRegion,
        $wineCountry,
        $wineColour,
        $wineGrape
      );

      $currentId = $wine['id'];
      $wines[$currentId] = $wineObj;
      } else {
      $currentWineColours = $wines[$currentId]->getColours();
      $inArray = in_array($wineColour, $currentWineColours);
      if (!$inArray) {
        $wines[$currentId]->addColour($wineColour);
      }
      $currentWineGrapes = $wines[$currentId]->getGrapes();
      $inArray = in_array($wineGrape, $currentWineGrapes);
      if (!$inArray) {
        $wines[$currentId]->addGrape($wineGrape);
      }
    }
  }
  return $wines;
}

function displayAllWines(array $wines): void
{
  foreach ($wines as $wine) {
    echo '<div class="content">
      <a href="" target="_blank">
        <div class="content-overlay">
        </div>
        <img class="wine-image" alt="A bottle image of this wine" src="Images/' . $wine->getImage() . '"/>
        <div class="content-details">
          <h3>' . ucfirst($wine->getName()) . '</h3>
          <h4>Producer:<br>' . ucfirst($wine->getProducer()) . '</h4>';
    $colours = $wine->getColours();
    $grapes = $wine->getGrapes();
    echo '<ul>';
    foreach ($colours as $colour) {
      echo '<li>' . ucfirst($colour) . '</li>';
    }
    foreach ($grapes as $grape) {
      echo '<li>' . ucfirst($grape) . '</li>';
    }
    echo '<li>' . $wine->getRegion() . ', ' . $wine->getCountry() . ' </li >
          </ul >
        </div >
      </a >
    </div > ';
  }
}

function displayAllColours(array $colours): string
{
  $colourStr = '';
  foreach ($colours as $colour) {
    $colourStr .= '<label for="colour">' . ucfirst($colour["colour"]) . '</label>
      <input name="colour[]" id="colour" type="checkbox" value="'
      . $colour["id"] . '">';
  }
  return $colourStr;
}

function displayAllGrapes(array $grapes): string
{
  $grapeStr = '';
  foreach ($grapes as $grape) {
    $grapeStr .= '<label for="grape">' . ucfirst($grape["grape"]) . '</label>
      <input name="grape[]" id="grape" type="checkbox" value="'
      . $grape["id"] . '">';
  }
  return $grapeStr;
}

function displayAllRegions(array $regions): string
{
  $regionStr = '';
  foreach ($regions as $region) {
    $regionStr .= '<option value="'
      . $region["id"] . '">' . ucfirst($region["region"]) . ', ' . ucfirst($region["country"]) . '</option>';
  }
  return $regionStr;
}

?>