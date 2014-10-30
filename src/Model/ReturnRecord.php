<?php

namespace Model;

use Doctrine\Common\Collections\ArrayCollection;

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
}
