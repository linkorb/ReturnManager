<?php

namespace Model;

use BusinessComponents\Money\Money;
use BusinessComponents\Order\OrderLine;

class ReturnLine implements ReturnLineInterface
{
    private $quantity;
    private $unitPrice;
    private $totalPrice;
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
        $this->quantity = $quantity;
        return $this;
    }

    public function getQuantity($quantity)
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

    public function calculateTotalprice()
    {
        $money = new Money($this->unitPrice);
        $money = $money->multiply($this->quantity);
        $this->totalPrice = $money->getAmount();
        return $this;
    }

    public function setOrderLine(OrderLine $orderLine)
    {
        $this->orderLine = $orderLine;
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

    public function getVatPrice()
    {
        $unitTotal = new Money($this->getUnitPriceTotal());
        $vatPrice  = new Money(0);
        if ($this->vat !== null) {
            $vatPrice = $unitTotal->multiply($this->vat->getDecimalValue());
        }
        return $vatPrice->getAmount();
    }
}
