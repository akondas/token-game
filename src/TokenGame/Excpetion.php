<?php

declare(strict_types=1);

namespace TokenGame;

class Excpetion extends \Exception
{
    /**
     * @return Excpetion
     */
    public static function invalidColumnNumber()
    {
        return new self('Invalid column number');
    }

    public static function invalidRowNumber()
    {
        return new self('Invalid row number');
    }

    public static function tokenAlreadyDiscovered()
    {
        return new self('Token already discovered');
    }
}
