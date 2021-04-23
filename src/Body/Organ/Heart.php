<?php

namespace Human\Body\Organ;

use Human\Body\ChannelInterface;
use Human\Body\FluidInterface;

class Heart
{
    private int $capacity = 0;
    private ?ChannelInterface $input = null;
    private $defaultCapacity;
    private ?FluidInterface $fluid;

    public function __construct(int $defaultCapacity)
    {
        $this->defaultCapacity = $defaultCapacity;
    }

    public function setInput(ChannelInterface $channel): void
    {
        $this->input = $channel;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function expand(): void
    {
        $this->capacity = $this->defaultCapacity;

        if ($this->input === null) {
            return;
        }

        $this->fluid = $this->input->suck($this->capacity);
    }

    public function contract(): void
    {
        $this->capacity = 0;

        // push fluid to output
        $this->fluid = null;
    }

    public function getFluid(): ?FluidInterface
    {
        return $this->fluid;
    }

    public function setDefaultCapacity(int $capacity): void
    {
        $this->defaultCapacity = $capacity;
    }
}
