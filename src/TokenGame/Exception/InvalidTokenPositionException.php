<?php

declare(strict_types=1);

namespace TokenGame\Exception;

class InvalidTokenPositionException extends \Exception
{
    public function __construct($column, $row)
    {
        parent::__construct(sprintf('Provided position [%s, %s] is out of board range', $column, $row));
    }
}
