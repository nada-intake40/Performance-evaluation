<?php

namespace App\Services;

use App\Abstracts\AbstractRequest;

/**
 * Interface ServiceWithInput
 * @package App\Services
 * @author Ahmed Helal Ahmed
 */
interface ServiceWithInput
{
    /**
     * @param AbstractRequest $input
     * @return array
     */
     public function execute(AbstractRequest $input):array ;
}
