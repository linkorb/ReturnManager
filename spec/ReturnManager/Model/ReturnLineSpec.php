<?php

namespace spec\ReturnManager\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReturnLineSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('ReturnManager\Model\ReturnLine');
    }
}
