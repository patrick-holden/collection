<?php

require_once '../collection-loop.php';
// require_once '../db-access.php';

use PHPUnit\Framework\TestCase;

class colltests extends TestCase
{
    public function testGivenEmptyArray()
    {
        $array = [];

        $result = loopCollection($array);

        $this->assertEquals('', $result);

    }

    public function testGivenValidWine()
    {
        $array[] = array(
            'id' => 1,
            'name' => 'Fave Wine',
            'blurb' => 'Def my favourite wine',
            'producer' => 'Italian Wine Man',
            'image' => 'wine_in_a_glass.jpg',
            'colour' => 'pink',
            'grape' => 'gewurtz',
            'region' => 'Bristol',
            'country' => 'UK'
          );

        $array[] = array(
          'id' => 1,
          'name' => 'Fave Wine',
          'blurb' => 'Def my favourite wine',
          'producer' => 'Italian Wine Man',
          'image' => 'wine_in_a_glass.jpg',
          'colour' => 'pink',
          'grape' => 'gewurtz',
          'region' => 'Bristol',
          'country' => 'UK'
      );

        $result = loopCollection($array);

        $this->assertEquals(
          '<div class="test">
            <a href="" target="_blank">
              <div class="content-overlay">
              </div>
              <img class="cat" src="Images/wine_in_a_glass.jpg"/>
              <div>
                <h3>Fave Wine</h3>
                <h4>Producer: Italian Wine Man</h4>
                <ul>
                  <li>pink</li>
                  <li>gewurtz</li>
                  <li>Bristol UK</li>
                </ul>
              </div>
            </a>
          </div>
          <div class="test">
            <a href="" target="_blank">
              <div class="content-overlay">
              </div>
              <img class="cat" src="Images/wine_in_a_glass.jpg"/>
              <div>
                <h3>Fave Wine</h3>
                <h4>Producer: Italian Wine Man</h4>
                <ul>
                  <li>pink</li>
                  <li>gewurtz</li>
                  <li>Bristol UK</li>
                </ul>
              </div>
            </a>
          </div>', $result);
    }


    public function testGivenStringThrowError()
    {
        //Arrange - setting up the data
        $array = 'string';

        $this->expectException(TypeError::class);

        //Act - calling the function
        $result = loopCollection($array);

    }
}
?>