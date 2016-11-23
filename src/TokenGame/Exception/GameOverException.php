<?php

declare(strict_types=1);

namespace TokenGame\Exception;

class GameOverException extends \Exception
{
    /**
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
