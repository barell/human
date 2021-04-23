<?php

namespace Human\Tools\Monitor;

use Human\Body\Organ\Heart;

class HeartMonitor
{
    private Heart $heart;

    public function __construct(Heart $heart)
    {
        $this->heart = $heart;
    }

    public function dump(): string
    {
        return '123';
    }
}
