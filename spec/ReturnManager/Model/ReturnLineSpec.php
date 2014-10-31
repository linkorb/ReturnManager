<?php

namespace spec\ReturnManager\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use BusinessComponents\Order\Model\OrderLine;

class ReturnLineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('ReturnManager\Model\ReturnLine');
    }

    public function it_is_correct_setquantity()
    {
        $this->setQuantity(2)->shouldReturn($this);
        $this->getQuantity()->shouldReturn(2);
    }

    public function it_is_correct_setorderline()
    {
        $orderline = new OrderLine();
        $this->setOrderLine($orderline)->shouldReturn($this);
        $this->getOrderLine()->shouldReturn($orderline);
    }
}
