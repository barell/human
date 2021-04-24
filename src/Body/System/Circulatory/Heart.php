<?php

namespace Human\Body\System\Circulatory;

use Human\Body\Cells;
use Human\Body\ChannelInterface;
use Human\Body\FluidInterface;
use Human\Body\Metabolism\State;

class Heart
{
    private int $capacity = 0;
    private ?ChannelInterface $input = null;
    private ?ChannelInterface $output = null;
    private $defaultCapacity;
    private ?FluidInterface $fluid;
    private Cells $cells;

    public function __construct(int $defaultCapacity)
    {
        $this->cells = new Cells();
        $this->defaultCapacity = $defaultCapacity;
    }

    public function setInput(ChannelInterface $input): void
    {
        $this->input = $input;
    }

    public function setOutput(ChannelInterface $output): void
    {
        $this->output = $output;
    }

    public function addEnergy(int $energy): void
    {
        $this->cells->addEnergy($energy);
    }

    public function getEnergy(): int
    {
        return $this->cells->getEnergy();
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function expand(): void
    {
        while ($this->capacity < $this->defaultCapacity && $this->cells->consumeEnergy(10) ) {
            $this->capacity++;
        }

        if ($this->input === null) {
            return;
        }

        $this->fluid = $this->input->suck($this->capacity);
    }

    public function contract(): void
    {
        while ($this->capacity > 0 && $this->cells->consumeEnergy(2)) {
            $this->capacity--;
        }

        if ($this->output === null) {
            return;
        }

        $this->output->pump($this->fluid);
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
