<?php
namespace bd\test;

use bd\Dfs;

class DfsTest extends \PHPUnit_Framework_TestCase {
  protected $testTree1 = [
    3 => [1, 2],
    1 => [4, 5],
    4 => [6, 7],
    6 => [11, 18]
  ];
  protected $expectedOutput1 = [3, 1, 4, 6, 11, 18, 7, 5, 2];

  protected $testTree2 = [
    1 => [8, 7],
    8 => [2, 3],
    3 => [6]
  ];
  protected $expectedOutput2 = [1, 8, 2, 3, 6, 7];

  protected $testTree3 = [
    2 => [9, 16],
    9 => [4],
    4 => [11, 12, 13],
    11 => [22]
  ];
  protected $expectedOutput3 = [2, 9, 4, 11, 22, 12, 13, 16];

  public function testDfs()
  {
    $dfs = new Dfs($this->testTree1);
    $dfs->run();
    $this->assertEquals($this->expectedOutput1, $dfs->getOutput());

    $dfs->setTree($this->testTree2);
    $dfs->run();
    $this->assertEquals($this->expectedOutput2, $dfs->getOutput());

    $dfs->setTree($this->testTree3);
    $dfs->run();
    $this->assertEquals($this->expectedOutput3, $dfs->getOutput());
  }
}