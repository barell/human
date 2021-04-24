<?php

namespace Human\Body\System\Circulatory;

use Human\Body\ChannelInterface;
use Human\Body\FluidInterface;

class Vessel implements ChannelInterface
{
    private int $capacity;
    private ?FluidInterface $fluid = null;

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

    public function pump(?FluidInterface $fluid): void
    {
        if ($this->fluid === null) {
            $this->fluid = $fluid;

            return;
        }

        $this->fluid->add($fluid);
    }
}
