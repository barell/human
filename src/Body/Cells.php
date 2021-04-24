<?php

namespace Human\Body;

class Cells
{
    private int $energy = 0;

    public function addEnergy(int $energy): void
    {
        $this->energy += $energy;
    }

    public function getEnergy(): int
    {
        return $this->energy;
    }

    public function consumeEnergy(int $energy): bool
    {
        if ($energy > $this->energy) {
            return false;
        }

        $this->energy -= $energy;

        return true;
    }
}
