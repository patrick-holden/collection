<?php
require_once 'db-access.php';
require_once 'collection-loop.php';
$db = 'vinoverodb';
$result = fetchAllWines(connectToDB($db));
$colours = fetchAllColours(connectToDB($db));
$grapes = fetchAllGrapes(connectToDB($db));
$regions = fetchAllRegions(connectToDB($db));
$wines = createArrayOfWineObjects($result);
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
//echo '<pre>';
//echo print_r($colours);
//echo '</pre>';
?>
  <section  id="panel">
    <h2>
<!--      <a href="" target="_blank">-->
        <span id="the">
          Some
        </span>
        <br>
        VinoVero
        <br>
        <span id="collected">
          in a collection
        </span>
<!--      </a>-->
    </h2>
    <div  id="test-flex">
      <?php echo displayAllWines($wines); ?>
    </div>
  </section>
</body>
<footer>
    <br>
  <form id="form" action="add-to-db-func.php" method="post">
      <div>
        <label for="name">Wine name</label>
        <input name="name" id="name" type="text">
      </div>
    <br>
      <div>
        <label for="blurb">Blurb</label>
        <input name="blurb" id="blurb" type="text">
      </div>
    <br>
      <div>
        <label for="producer">Producer</label>
        <input name="producer" id="producer" type="text">
      </div>
    <br>
      <div>
        <label for="image">Image file:</label>
        <input name="image" id="image" type="text">
      </div>
      <br>
      <br>
      <div>
        <label for="colour">
            Style(s):
        </label>
          <?php echo displayAllColours($colours); ?>
      </div>
      <br>
      <div>
          <label for="grape">
              Grape(s):
          </label>
            <?php echo displayAllGrapes($grapes); ?>
      </div>
      <br>
      <div>
          <label for="region">
          Region:
        </label>
          <select id="region" name="region">
            <?php echo displayAllRegions($regions); ?>
          </select>
      </div>
      <button>Submit</button>
      </div>

  </form>
</footer>
</html>
