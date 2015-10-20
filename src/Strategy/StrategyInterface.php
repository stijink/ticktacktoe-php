<?php

namespace TickTackToe\Strategy;
use TickTackToe\Board;

/**
 * Description
 */
interface StrategyInterface
{
    public function findBestMove(Board $board);
}