<?php

namespace Tests;

use TickTackToe\Board;

class BoardTest extends \PHPUnit_Framework_TestCase
{
    public function testhasMovesLeft()
    {
        $board = new Board();
        $this->assertTrue($board->hasMovesLeft());
    }

    public function testhasNoMoreMovesLeft()
    {
        $board = new Board([1, 2, 1, 2, 1, 2, 1, 2, 2]);
        $this->assertFalse($board->hasMovesLeft());
    }

    public function testGetFields()
    {
        $board = new Board();
        $this->assertTrue(is_array($board->getFields()));
    }

    /**
     * @param $fields
     * @dataProvider unusedFieldsDataProvider
     */
    public function testFindUnusedFields($fields, $expected)
    {
        $board = new Board($fields);
        $this->assertSame($expected, $board->findUnusedFields());
    }

    public function unusedFieldsDataProvider()
    {
        return [
            [[0, 0, 0, 1, 1, 2, 2, 1, 0], [0, 1, 2, 8]],
            [[0, 0, 0, 0, 0, 0, 0, 0, 0], [0, 1, 2, 3, 4, 5, 6, 7, 8]],
            [[1, 1, 1, 1, 1, 2, 2, 1, 1], []]
        ];
    }
}
