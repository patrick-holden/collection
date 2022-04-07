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

  public function testDisplayAllGrapes_GivenArrayReturnString()
  {
    $array[] = ['id' => 1, 'grape' => 'riesling'];
    $expected = '<label for="grape">Riesling</label><input name="grape[]" id="grape" type="checkbox" value="1">';

    $result = displayAllGrapes($array);

    $this->assertEquals($expected, $result);
  }

  public function testDisplayAllColours_GivenEmptyArrayReturnEmptyString()
  {
    $array = [];

    $result = displayAllColours($array);

    $this->assertEquals('', $result);
  }

  public function testDisplayAllColours_GivenArrayReturnString()
  {
    $array[] = ['id' => 1, 'colour' => 'white'];
    $expected = '<label for="colour">White</label><input name="colour[]" id="colour" type="checkbox" value="1">';

    $result = displayAllColours($array);

    $this->assertEquals($expected, $result);
  }

  public function testDisplayAllRegions_GivenEmptyArrayReturnEmptyString()
  {
    $array = [];

    $result = displayAllRegions($array);

    $this->assertEquals('', $result);
  }

  public function testDisplayAllRegions_GivenArrayReturnString()
  {
    $array[] = ['id' => 1, 'region' => 'Bristol', 'country' => 'UK'];
    $expected = '<option value="1">Bristol, UK</option>';

    $result = displayAllRegions($array);

    $this->assertEquals($expected, $result);
  }

  public function testCreateArrayOfWineObjects_GivenStringThrowError()
  {
    $array = 'string';

    $this->expectException(TypeError::class);

    $result = createArrayOfWineObjects($array);
  }

  public function testDisplayAllWines_GivenStringThrowError()
  {
    $array = 'string';

    $this->expectException(TypeError::class);

    $result = displayAllWines($array);
  }
}
