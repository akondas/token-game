<?php

declare(strict_types=1);

namespace TokenGame;

interface Timer
{
    /**
     * @param int $limit
     */
    public function start(int $limit);

    /**
     * @return bool
     */
    public function afterLimit(): bool;
}
