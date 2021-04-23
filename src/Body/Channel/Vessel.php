<?php

namespace Human\Body\Channel;

use Human\Body\ChannelInterface;
use Human\Body\Fluid\Blood;
use Human\Body\FluidInterface;

class Vessel implements ChannelInterface
{
    private int $capacity;
    private ?FluidInterface $fluid;

    public function __construct(int $capacity = 0)
    {
        $this->capacity = $capacity;
    }

    public function fillWith(FluidInterface $fluid): void
    {
        // @todo check if fluid overflows capacity
        $this->fluid = $fluid;
    }

    public function getFluid(): ?FluidInterface
    {
        return $this->fluid;
    }

    public function suck(int $volume): ?FluidInterface
    {
        if ($this->fluid === null) {
            return null;
        }

        $extractedFluid = $this->fluid->extract($volume);

        if ($this->fluid->getVolume() === 0) {
            $this->fluid = null;
        }

        return $extractedFluid;
    }
}
