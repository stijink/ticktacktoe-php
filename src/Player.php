<?php

namespace TickTackToe;

use TickTackToe\Strategy\StrategyInterface;

class Player
{
    private $name;
    private $strategy;

    /**
     * @param string $name
     * @param StrategyInterface $strategy
     */
    public function __construct($name, StrategyInterface $strategy)
    {
        $this->name     = $name;
        $this->strategy = $strategy;
    }

    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return StrategyInterface
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * @param Board $board
     */
    public function makeMove(Board $board)
    {
        $field = $this->strategy->findBestMove($board);
        $board->makeMove($field, $this);
    }
}