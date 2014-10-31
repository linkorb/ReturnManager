<?php

namespace spec\ReturnManager\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ReturnManager\Model\ReturnLine;

class ReturnRecordSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('ReturnManager\Model\ReturnRecord');
    }
}
