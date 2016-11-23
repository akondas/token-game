<?php

declare(strict_types=1);

namespace TokenGame;

use TokenGame\Exception\GameOverException;

class Game
{
    /**
     * @var array
     */
    private $board;

    /**
     * @var Timer
     */
    private $timer;

    /**
     * @var int
     */
    private $attempts = 0;

    /**
     * @var bool
     */
    private $win = false;

    /**
     * @param Board $board
     * @param Timer $timer
     */
    public function __construct(Board $board, Timer $timer)
    {
        $this->board = $board;
        $this->timer = $timer;
    }

    public function start()
    {
        $this->generateTokens();
        $this->timer->start(60);
    }

    /**
     * @param int $column
     * @param int $row
     */
    public function discoverToken(int $column, int $row)
    {
        $this->checkAllowedAttempts();
        $this->checkTimeLimit();

        if ($this->board->discoverToken($column, $row)) {
            $this->win = true;
        }
        ++$this->attempts;
    }

    /**
     * @return bool
     */
    public function isWin()
    {
        return $this->win;
    }

    /**
     * @throws GameOverException
     */
    private function checkAllowedAttempts()
    {
        if ($this->attempts >= 5) {
            throw new GameOverException('Too many attemps');
        }
    }

    /**
     * @throws GameOverException
     */
    private function checkTimeLimit()
    {
        if ($this->timer->afterLimit()) {
            throw new GameOverException('Time is up');
        }
    }

    private function generateTokens()
    {
        for ($i = 0; $i < 19; ++$i) {
            $this->board->addToken(new Token());
        }
        $this->board->addToken(new Token(true));
    }
}
