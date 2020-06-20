<?php

namespace App\Abstracts;

/**
 * Abstract class for the Request
 *
 * @author ali
 */
abstract class AbstractRequest
{

    /**
     * Make dynamic setter for class members
     *
     * @param array $data
     * @return void
     */
    abstract protected function setValues(array $data):void;
}
