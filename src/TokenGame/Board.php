<?php

declare(strict_types=1);

namespace TokenGame;

interface Board
{
    /**
     * @param Token $token
     */
    public function addToken(Token $token);

    /**
     * @return array
     */
    public function getTokens(): array;

    /**
     * @param int $column
     * @param int $row
     *
     * @return bool
     */
    public function discoverToken(int $column, int $row);
}
