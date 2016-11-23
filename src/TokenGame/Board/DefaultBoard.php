<?php

declare(strict_types=1);

namespace TokenGame\Board;

use TokenGame\Board;
use TokenGame\Exception\InvalidTokenPositionException;
use TokenGame\Exception\TokenAlreadyDiscoveredException;
use TokenGame\Token;

class DefaultBoard implements Board
{
    /**
     * @var Token[]
     */
    protected $tokens;

    public function __construct()
    {
        $this->tokens = [];
    }

    /**
     * @param Token $token
     */
    public function addToken(Token $token)
    {
        $this->tokens[] = $token;
        $this->shuffle();
    }

    /**
     * @return array
     */
    public function getTokens(): array
    {
        return $this->tokens;
    }

    /**
     * @param int $column
     * @param int $row
     *
     * @return bool
     *
     * @throws InvalidTokenPositionException
     * @throws TokenAlreadyDiscoveredException
     */
    public function discoverToken(int $column, int $row): bool
    {
        if ($column < 1 || $column > 5 || $row < 1 || $row > 4) {
            throw new InvalidTokenPositionException($column, $row);
        }

        $token = $this->getToken($column, $row);

        if ($token->isDiscovered()) {
            throw new TokenAlreadyDiscoveredException($column, $row);
        }

        return $token->discover();
    }

    /**
     * @param int $column
     * @param int $row
     *
     * @return Token
     */
    private function getToken(int $column, int $row)
    {
        return $this->tokens[(($column - 1) * 5) + ($row - 1)];
    }

    private function shuffle()
    {
        shuffle($this->tokens);
    }
}
