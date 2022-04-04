
<?php
function loopCollection($result)
{
  foreach ($result as $wine){
    $collectedwine =
      '<div class="test">
        <a href="" target="_blank">
          <div class="content-overlay">
          </div>
          <img class="cat" src="Images/' . $wine["image"] . '"/>
        </a>
      </div>';
        
    echo $collectedwine;
  }
}