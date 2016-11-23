<?php

declare(strict_types=1);

namespace TokenGame\Exception;

class TokenAlreadyDiscoveredException extends \Exception
{
    public function __construct($column, $row)
    {
        parent::__construct(sprintf('Token in [%s, %s] already discovered', $column, $row));
    }
}
