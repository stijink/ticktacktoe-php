<?php

namespace Tests;

use TickTackToe\Player;
use TickTackToe\Strategy\RandomStrategy;
use TickTackToe\StrategyComparer;

class StrategyComparerTest extends \PHPUnit_Framework_TestCase
{
    public function testStart()
    {
        $player1 = new Player('Bob', new RandomStrategy());
        $player2 = new Player('Joe', new RandomStrategy());

        $gameLooper = new StrategyComparer();
        $gameLooper->start($player1, $player2, 3);
    }
}
