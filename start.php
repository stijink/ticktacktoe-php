<?php

/**
 * Start the Game
 */

use TickTackToe\Game;
use TickTackToe\Board;
use TickTackToe\Player;
use \TickTackToe\Strategy\RandomStrategy;

require "vendor/autoload.php";

$board = new Board();

$player1 = new Player('Bob', new RandomStrategy());
$player2 = new Player('Joe', new RandomStrategy());

$game = new Game($board, $player1, $player2);
$winner = $game->start();

dump($winner);
dump($game->getNumberOfMoves());