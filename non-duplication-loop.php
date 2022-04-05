<?php

function displayUsersLocations(array $userlocations): void
{
  $i = 0;
  while ($i < count($userlocations)) {
    $currentId = $userlocations[$i]['id'];
    $str = $currentId
      . ' ' . $userlocations[$i]['name']
      . ' ' . $userlocations[$i]['location'];
    $nextId = $i + 1 < count($userlocations) - 1 ? $userlocations[$i + 1]['id'] : -1;
    while ($nextid == $currentid) {
      $i++;
      
      $str = $str . ' ' . $userlocations[$i]['location'];
      $nextId = $userlocations[$i + 1]['id'];
    }

    echo '<p>' . $str . '</p>';
    $i++;
  }
}
?>