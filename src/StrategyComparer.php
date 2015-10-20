<?php

namespace TickTackToe;

class StrategyComparer
{
    private $results;

    public function start(Player $player1, Player $player2, $loops)
    {
        for ($i = 1; $i <= $loops; $i++) {

            $game   = new Game(new Board(), $player1, $player2);
            $winner = $game->start();

            if ( $winner instanceof Player) {

                $this->results['wins'][$winner->getName()]++;
            }
            else {

                $this->results['undecided']++;
            }
        }

        return $this->getWinner();
    }


    public function getWinner()
    {
        arsort($this->results['wins']);
        return key($this->results['wins']);
    }
}