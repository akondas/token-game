<?php

declare(strict_types=1);

namespace TokenGame;

class Token
{
    /**
     * @var bool
     */
    private $discovered;

    /**
     * @var bool;
     */
    private $winning;

    /**
     * @param bool $winning
     */
    public function __construct(bool $winning = false)
    {
        $this->winning = $winning;
        $this->discovered = false;
    }

    /**
     * @return bool
     */
    public function discover()
    {
        $this->discovered = true;

        return $this->winning;
    }

    /**
     * @return bool
     */
    public function isDiscovered()
    {
        return $this->discovered;
    }

    /**
     * @return bool
     */
    public function isWinning()
    {
        return $this->winning;
    }
}
