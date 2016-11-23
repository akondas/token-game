<?php

namespace spec\TokenGame\Timer;

use TokenGame\Timer\DefaultTimer;
use PhpSpec\ObjectBehavior;

/**
 * @mixin \TokenGame\Timer\DefaultTimer
 */
class DefaultTimerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(DefaultTimer::class);
    }

    public function it_should_be_able_to_start()
    {
        // When
        $this->start(1);

        // Then
        $this->getStartTime()->shouldHaveType(\DateTime::class);
    }

    public function it_should_return_false_if_limit_has_not_been_exceeded()
    {
        // When
        $this->start(10);

        // Then
        $this->afterLimit()->shouldReturn(false);
    }

    public function it_should_return_true_if_limit_has_been_exceeded()
    {
        // When
        $this->start(-1);

        // Then
        $this->afterLimit()->shouldReturn(true);
    }
}
