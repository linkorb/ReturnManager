<?php

namespace Model;

interface ReturnLineInterface
{
    /**
     * Set the key of return line.
     * @param string $key
     * @return ReturnLineManager.
     */
    public function setKey($key);

    /**
     * Get the key of the return line.
     * @return string
     */
    public function getKey();
}
