<?php
require_once '../display-funcs.php';
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
    $array = 'string';

    $this->expectException(TypeError::class);

    $result = createArrayOfWineObjects($array);
  }
}
