<?php

namespace ReturnManager\Model;

interface ReturnRecordInterface
{
    /**
     * Set the key of return.
     * @param string $key
     * @return ReturnManager.
     */
    public function setKey($key);

    /**
     * Get the key of the return.
     * @return string
     */
    public function getKey();
}
