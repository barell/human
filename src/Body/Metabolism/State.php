<?php

namespace Human\Body\Metabolism;

class State
{
    private int $oxygenLevel = 0;
    private int $carbonDioxideLevel = 0;

    public function getOxygenLevel(): int
    {
        return $this->oxygenLevel;
    }

    public function getCarbonDioxideLevel(): int
    {
        return $this->carbonDioxideLevel;
    }
}
