<?php

namespace Tests;

use TickTackToe\Board;
use TickTackToe\Game;
use TickTackToe\Player;
use TickTackToe\Strategy\RandomStrategy;

class GameTest extends \PHPUnit_Framework_TestCase
{
    public function testStart()
    {
        $board = \Mockery::mock('TickTackToe\Board')
            ->shouldReceive('findWinner')->atLeast(2)
            ->shouldReceive('hasMovesLeft')->atLeast(2)
            ->shouldReceive('getFields')->atLeast(2)->andReturn([0, 0, 0, 0, 0, 0, 0, 0, 0])
            ->getMock();

        $player1 = \Mockery::mock('TickTackToe\Player')
            ->shouldReceive('makeMove')->atLeast(1)
            ->getMock();

        $player2 = \Mockery::mock('TickTackToe\Player')
            ->shouldReceive('makeMove')->atLeast(1)
            ->getMock();

        $game = new Game($board, $player1, $player2);
        $game->start();
    }


    /**
     * @param array $fields
     * @param mixed $expected
     * @dataProvider combinationDataProvider
     */
    public function testFindWinner(array $fields, $expected)
    {
        $board = new Board($fields);

        $player1 = new Player('Bob', new RandomStrategy());
        $player2 = new Player('Joe', new RandomStrategy());

        $game = new Game($board, $player1, $player2);
        $this->assertSame($expected, $game->findWinner());
    }


    public function combinationDataProvider()
    {
        return [
            // no winner
            [[0, 0, 0, 0, 0, 0, 0, 0, 0], null],
            [[1, 0, 0, 0, 0, 0, 0, 0, 0], null],
            [[1, 0, 1, 0, 1, 0, 1, 0, 0], null],
            [[1, 1, 0, 1, 1, 0, 0, 0, 1], null],

            // horizontal
            [[1, 1, 1, 0, 0, 0, 0, 0, 0], 1],
            [[0, 0, 0, 2, 2, 2, 0, 0, 0], 2],
            [[0, 0, 0, 0, 0, 0, 1, 1, 1], 1],

            // vertical
            [[1, 0, 0, 1, 0, 0, 1, 0, 0], 1],
            [[0, 2, 0, 0, 2, 0, 0, 2, 0], 2],
            [[0, 0, 1, 0, 0, 1, 0, 0, 1], 1],
        ];
    }
}
