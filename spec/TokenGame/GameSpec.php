<?php

namespace spec\TokenGame;

use TokenGame\Board;
use TokenGame\Exception\GameOverException;
use TokenGame\Game;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TokenGame\Timer;
use TokenGame\Token;

/**
 * @mixin \TokenGame\Game
 */
class GameSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Game::class);
    }

    public function let(Board $board, Timer $timer)
    {
        $this->beConstructedWith($board, $timer);
    }

    public function it_should_be_able_to_win(Board $board, Timer $timer)
    {
        // Given
        $this->mockDefaultTimer($timer);
        $board->addToken(Argument::type(Token::class))->shouldBeCalledTimes(20);
        $board->discoverToken(3, 2)->willReturn(true);

        // When
        $this->start();
        $this->discoverToken(3, 2);

        // Then
        $this->isWin()->shouldReturn(true);
    }

    public function it_should_not_allow_for_more_than_5_moves(Timer $timer)
    {
        // Given
        $this->mockDefaultTimer($timer);

        // When
        $this->start();
        $this->discoverToken(1, 2);
        $this->discoverToken(2, 2);
        $this->discoverToken(3, 2);
        $this->discoverToken(4, 2);
        $this->discoverToken(5, 2);

        // Then
        $this->shouldThrow(GameOverException::class)->during('discoverToken', [1, 3]);
    }

    public function it_should_not_allow_for_move_after_max_duration(Timer $timer)
    {
        // Given
        $timer->start(Argument::type('int'))->shouldBeCalled();
        $timer->afterLimit()->willReturn(true);

        // When
        $this->start();

        // Then
        $this->shouldThrow(GameOverException::class)->during('discoverToken', [1, 3]);
    }

    /**
     * @param Timer $timer
     */
    private function mockDefaultTimer(Timer $timer)
    {
        $timer->start(Argument::type('int'))->shouldBeCalled();
        $timer->afterLimit()->willReturn(false);
    }
}
