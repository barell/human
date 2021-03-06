<?php

namespace Human\Body\System\Circulatory;

use Human\Body\FluidInterface;

class Blood implements FluidInterface
{
    private int $volume;

    public function __construct(int $volume = 0)
    {
        $this->volume = $volume;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }

    public function extract(int $volume): FluidInterface
    {
        if ($volume > $this->volume) {
            $volume = $this->volume;
        }

        $this->volume -= $volume;

        return new Blood($volume);
    }

    public function add(FluidInterface $fluid): void
    {
        $this->volume += $fluid->getVolume();
    }
}
