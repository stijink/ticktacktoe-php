<?php

namespace Tests\Strategy;

use TickTackToe\Board;
use TickTackToe\Strategy\RandomStrategy;

class RandomStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testMakeMove()
    {
        $board = new Board();
        $strategy = new RandomStrategy();

        $this->assertGreaterThanOrEqual(0,  $strategy->findBestMove($board));
        $this->assertLessThanOrEqual(8,     $strategy->findBestMove($board));
    }
}
