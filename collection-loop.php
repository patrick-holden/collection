<?php
function loopCollection(array $result): string
{
  $collectedwine = '';
  for ($i=0; $i < count($result); $i++) {
    $currentId = $result[$i]['id'];
    $nextId = $i + 1 < count($result) - 1 ? $result[$i + 1]['id'] : -1;
    while ($nextId == $currentId) {
      if ($result[$i]['colour'] !== $result[$i+1]['colour']) {
        $result[$i+1]['colour'] = $result[$i]['colour'] . ' & ' . $result[$i+1]['colour'];
      }
      if ($result[$i]['grape'] !== $result[$i+1]['grape']) {
        $result[$i+1]['grape'] = $result[$i]['grape'] . ' & ' . $result[$i+1]['grape'];
      }
      $i++; 
      $nextId = $result[$i + 1]['id'];
    }

    $collectedwine .=
      '<div class="test">
        <a href="" target="_blank">
          <div class="content-overlay">
          </div>
          <img class="cat" src="Images/' . $result[$i]["image"] . '"/>
          <div>
            <h3>' . ucfirst($result[$i]["name"]) . '</h3>
            <h4>Producer: ' . ucfirst($result[$i]["producer"]) . '</h4>
            <ul>
              <li>' . $result[$i]["colour"] . '</li>
              <li>' . $result[$i]["grape"] . '</li>
              <li>' . $result[$i]["region"] . ' ' .  $result[$i]["country"] . '</li>
            </ul>
          </div>
        </a>
      </div>';
  } 
  return $collectedwine;
}

?>