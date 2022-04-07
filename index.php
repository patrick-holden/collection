<?php
require_once 'db-access-funcs.php';
require_once 'display-funcs.php';
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
  <section  id="panel">
    <h2>
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
  <form id="form" action="add-to-db-func.php" method="post" enctype="multipart/form-data">
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
      <input type="file" name="newFile">
    </div>
    <br>
    <div>
      <label for="form-colour">
        Style(s) - MUST CHOOSE ONE:
      </label>
      <br>
      <?php echo displayAllColours($colours); ?>
    </div>
    <br>
    <div id="form-grapes">
      <label for="form-grapes">
        Grape(s)  - MUST CHOOSE ONE:
      </label>
      <br>
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
    <button>
      Submit
    </button>
  </form>
</footer>
</html>
