<?php

namespace TickTackToe;

class Game
{
    private $players;
    private $board;
    private $numberOfMoves = 0;

    /**
     * @param Board  $board
     * @param Player $player1
     * @param Player $player2
     */
    public function __construct(Board $board, Player $player1, Player $player2)
    {
        $this->board      = $board;
        $this->players[]  = $player1;
        $this->players[]  = $player2;
    }

    /**
     * @return mixed $winner
     */
    public function start()
    {
        while (true) {

            foreach ($this->players as $player) {

                $winner = $this->findWinner();

                if ( ! is_null($winner)) {

                    return $winner;
                }

                if (! $this->board->hasMovesLeft()) {

                    return null;
                }

                $player->makeMove($this->board);
                $this->numberOfMoves++;
            }
        }
    }

    /**
     * @return mixed $winner
     */
    public function findWinner()
    {
        $combinations = [
            // horizontal combionations
            [0, 1, 2], [3, 4 ,5], [6, 7, 8],
            // vertical combinations
            [0, 3, 6], [1, 4, 7], [2, 5, 8]
        ];

        $fields = $this->board->getFields();

        foreach ($combinations as $combination) {

            if ($fields[$combination[0]] !== 0
                && $fields[$combination[0]] === $fields[$combination[1]]
                && $fields[$combination[0]] === $fields[$combination[2]]) {

                return $fields[$combination[0]];
            }
        }

        return null;
    }

    /**
     * @return int $numberOfMoves
     */
    public function getNumberOfMoves()
    {
        return $this->numberOfMoves;
    }
}