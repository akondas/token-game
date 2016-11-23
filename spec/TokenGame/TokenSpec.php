<?php

namespace spec\TokenGame;

use TokenGame\Token;
use PhpSpec\ObjectBehavior;

/**
 * @mixin \TokenGame\Token
 */
class TokenSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Token::class);
    }

    public function it_should_be_covered_by_default()
    {
        $this->isDiscovered()->shouldReturn(false);
    }

    public function it_should_not_be_wining_by_default()
    {
        $this->isWinning()->shouldReturn(false);
    }

    public function it_should_be_able_to_discover()
    {
        // When
        $this->discover();

        // Then
        $this->isDiscovered()->shouldReturn(true);
    }

    public function it_should_be_able_to_be_winning()
    {
        // Given
        $this->beConstructedWith(true);

        // Then
        $this->isWinning()->shouldReturn(true);
    }

    public function it_should_return_wining_status_on_discover()
    {
        // Given
        $this->beConstructedWith(true);

        // Then
        $this->discover()->shouldReturn(true);
    }
}
