<?php

declare(strict_types=1);

namespace TokenGame\Timer;

use TokenGame\Timer;

class DefaultTimer implements Timer
{
    /**
     * @var int
     */
    private $limit;

    /**
     * @var \DateTime
     */
    private $startTime = null;

    /**
     * @param int $limit
     */
    public function start(int $limit)
    {
        $this->limit = $limit;
        $this->startTime = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @return bool
     */
    public function afterLimit(): bool
    {
        $startTime = (clone $this->startTime)->modify(sprintf('+%s seconds', $this->limit));

        return new \DateTime() > $startTime;
    }
}
