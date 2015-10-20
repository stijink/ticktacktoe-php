<?php

namespace Tests;

use TickTackToe\Player;

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    public function testMakeMove()
    {
        $board = \Mockery::mock('TickTackToe\Board')
            ->shouldReceive('makeMove')->once()
            ->getMock();

        $strategy = \Mockery::mock('TickTackToe\Strategy\StrategyInterface')
            ->shouldReceive('findBestMove')->once()
            ->getMock();

        $player = new Player('Bob', $strategy);
        $player->makeMove($board);
    }
}
