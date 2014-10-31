<?php

namespace spec\ReturnManager\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use BusinessComponents\Order\Model\OrderLine;
use BusinessComponents\Vat\Model\Vat;

class ReturnLineSpec extends ObjectBehavior
{
    public function it_is_initializable()
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

    public function it_is_correct_calculatetotalprice()
    {
        $orderline = new OrderLine();
        $orderline->setUnitPrice(15);
        $this->setOrderLine($orderline)->shouldReturn($this);
        $this->setQuantity(2)->shouldReturn($this);
        $this->setUnitPrice()->shouldReturn($this);
        $this->calculateTotalprice()->shouldReturn(30);
    }

    public function it_is_correct_getvatprice()
    {
        $orderline = new OrderLine();
        $vat       = new Vat();
        $vat->setValue(21);
        $orderline->setUnitPrice(15);
        $orderline->setVat($vat);
        $this->setOrderLine($orderline)->shouldReturn($this);
        $this->setQuantity(2)->shouldReturn($this);
        $this->setUnitPrice()->shouldReturn($this);
        $this->getUnitPriceTotal()->shouldReturn(30);
        $this->setVat()->shouldReturn($this);
        $this->getVatPrice()->shouldReturn(6.3);
    }
}
