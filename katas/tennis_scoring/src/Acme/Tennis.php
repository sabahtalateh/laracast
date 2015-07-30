<?php

namespace Acme;

class Tennis
{
    private $player1;
    private $player2;

    protected $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {
        if ($this->hasAWinner()) {
            return 'Win for ' . $this->leader()->name;
        }

        if ($this->hasTheAdvantage()) {
            return 'Advantage ' . $this->leader()->name;
        }

        if ($this->inDeuce()) {
            return 'Deuce';
        }

        return $this->generalScore();
    }

    private function hasAWinner()
    {
        return $this->hasEnoughPointsToWin() && $this->isLeadingByTwo();
    }

    private function hasTheAdvantage()
    {
        return $this->hasEnoughPointsToWin() && $this->isLeadingByOne();
    }

    private function inDeuce()
    {
        return ($this->player1->points + $this->player2->points) && $this->tied();
    }

    private
    function leader()
    {
        return $this->player1->points > $this->player2->points
            ? $this->player1
            : $this->player2;
    }

    private
    function tied()
    {
        return ($this->player1->points == $this->player2->points);
    }

    /**
     * @return bool
     */
    private
    function hasEnoughPointsToWin()
    {
        return (max([$this->player1->points, $this->player2->points]) >= 4);
    }

    /**
     * @return bool
     */
    private
    function isLeadingByTwo()
    {
        return (abs($this->player1->points - $this->player2->points) >= 2);
    }

    /**
     * @return string
     */
    private function generalScore()
    {
        $score = $this->lookup[$this->player1->points] . '-';
        return $score .= $this->tied() ? 'All' : $this->lookup[$this->player2->points];
    }

    /**
     * @return bool
     */
    private function isLeadingByOne()
    {
        return (abs($this->player1->points - $this->player2->points) == 1);
    }
}
