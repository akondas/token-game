<?php

namespace spec\TokenGame\Board;

use TokenGame\Board\DefaultBoard;
use PhpSpec\ObjectBehavior;
use TokenGame\Exception\InvalidTokenPositionException;
use TokenGame\Exception\TokenAlreadyDiscoveredException;
use TokenGame\Token;

/**
 * @mixin \TokenGame\Board\DefaultBoard
 */
class DefaultBoardSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(DefaultBoard::class);
    }

    public function it_should_be_able_to_add_token()
    {
        // Given
        $token = new Token();

        // When
        $this->addToken($token);

        // Then
        $this->getTokens()->shouldHaveCount(1);
    }

    public function it_should_be_able_to_discover_token()
    {
        // Given
        $token = new Token();

        // When
        $this->addToken($token);

        // Then
        $this->discoverToken(1, 1)->shouldReturn(false);
    }

    public function it_should_be_able_to_discover_wining_token()
    {
        // Given
        $token = new Token(true);

        // When
        $this->addToken($token);

        // Then
        $this->discoverToken(1, 1)->shouldReturn(true);
    }

    public function it_should_shuffle_added_tokens()
    {
        // Given
        $tokens = [new Token(), new Token(), new Token()];
        srand(1234);

        // When
        array_map(function ($token) {
            $this->addToken($token);
        }, $tokens);

        // Then
        $this->getTokens()->shouldNotEqual($tokens);
    }

    public function it_should_not_allow_discover_same_token()
    {
        // Given
        $this->addToken(new Token());

        // When
        $this->discoverToken(1, 1);

        // Then
        $this->shouldThrow(TokenAlreadyDiscoveredException::class)->during('discoverToken', [1, 1]);
    }

    public function it_should_throw_exception_on_invalid_column()
    {
        $this->shouldThrow(InvalidTokenPositionException::class)->during('discoverToken', [6, 1]);
    }

    public function it_should_throw_exception_on_invalid_row()
    {
        $this->shouldThrow(InvalidTokenPositionException::class)->during('discoverToken', [2, 5]);
    }
}
