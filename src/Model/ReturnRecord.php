<?php

namespace ReturnManager\Model;

use Doctrine\Common\Collections\ArrayCollection;
use ReturnManager\Model\ReturnLine;

class ReturnRecord implements ReturnRecordInterface
{
    private $key;
    private $lines;

    public function __construct()
    {
        $this->lines = new ArrayCollection();
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function addLine(ReturnLine $line)
    {
        $this->lines[] = $line;
    }

    private $totalPrice;

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->lines as $line) {
            $totalPrice += $line->getTotalPrice();
        }
        $this->totalPrice = $totalPrice;
        return $this;
    }

    private $vatPrice;

    public function setVatPrice()
    {
        $vatPrice = 0;
        foreach ($this->lines as $line) {
            $vatPrice += $line->getVatPrice();
        }
        $this->vatPrice = $vatPrice;
        return $this;
    }

    public function getVatPrice()
    {
        return $this->vatPrice;
    }

    private $orderPrice;

    public function getOrderPrice()
    {
        return $this->orderPrice;
    }

    public function setOrderPrice()
    {
        $orderPrice = 0;
        foreach ($this->lines as $line) {
            $orderPrice += $line->getUnitPriceTotal();
        }
        $this->orderPrice = $orderPrice;
        return $this;
    }
}
