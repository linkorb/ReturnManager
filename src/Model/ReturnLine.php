<?php

namespace ReturnManager\Model;

use BusinessComponents\Money\Money;
use BusinessComponents\Order\Model\OrderLine;

class ReturnLine implements ReturnLineInterface
{
    private $quantity;
    private $unitPrice;
    private $totalPrice;
    private $basePrice;
    private $key;
    private $orderLine;

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setQuantity($quantity)
    {
        if (0 > $quantity) {
            throw new \OutOfRangeException('Quantity must be greater than 0.');
        }
        $this->quantity = (int)$quantity;
        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setUnitPrice()
    {
        $this->unitPrice = $this->orderLine->getUnitPrice();
        return $this;
    }

    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function setBaseprice()
    {
        $money = new Money($this->unitPrice);
        $money = $money->multiply($this->quantity);
        $this->basePrice = $money->getAmount();
        return $this;
    }

    public function getBasePrice()
    {
        return $this->basePrice;
    }

    public function setOrderLine(OrderLine $orderLine)
    {
        $this->orderLine = $orderLine;
        return $this;
    }

    public function getOrderLine()
    {
        return $this->orderLine;
    }

    private $vat;

    public function setVat()
    {
        $this->vat = $this->orderLine->getVat();
        return $this;
    }

    public function getVat()
    {
        return $this->vat;
    }

    public function getUnitPriceTotal()
    {
        $unit = new Money($this->unitPrice);
        $unit = $unit->multiply($this->quantity);
        return $unit->getAmount();
    }

    public function getVatPrice()
    {
        $unitTotal = new Money($this->getUnitPriceTotal());
        $vatPrice  = new Money(0);
        if ($this->vat !== null) {
            $vatPrice = $unitTotal->multiply($this->vat->getValue());
        }
        $vatPrice = $vatPrice->getAmount();
        return round(($vatPrice / 100), 1);
    }

    public function setTotalPrice()
    {
        $vatPrice  = $this->getVatPrice();
        $unitPrice = $this->getUnitPriceTotal();
        $this->totalPrice = $vatPrice + $unitPrice;
        return $this;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
}
