<?php

namespace TickTackToe\Strategy;

use TickTackToe\Board;

class CenterFirstStrategy implements StrategyInterface
{
    /**
     * @param  Board $board
     * @return int $field
     */
    public function findBestMove(Board $board)
    {
        $unusedFields = $board->findUnusedFields();

        shuffle($unusedFields);
        return $unusedFields[0];
    }
}