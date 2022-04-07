<?php

require_once '../display-funcs.php';
//require_once '../add-to-db-func.php';
//require_once '../db-access-funcs.php';
// require_once '../db-access.php';

use PHPUnit\Framework\TestCase;

class colltests extends TestCase
{
  public function testDisplayAllGrapes_GivenEmptyArrayReturnEmptyString()
  {
    $array = [];

    $result = displayAllGrapes($array);

    $this->assertEquals('', $result);
  }

  public function testDisplayALlColours_GivenEmptyArrayReturnEmptyString()
  {
    $array = [];

    $result = displayAllColours($array);

    $this->assertEquals('', $result);
  }


  public function testGivenStringThrowError()
  {
    //Arrange - setting up the data
    $array = 'string';

    $this->expectException(TypeError::class);

    //Act - calling the function
    $result = createArrayOfWineObjects($array);
  }

//  }
}
?>