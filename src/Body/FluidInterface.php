<?php

namespace Human\Body;

interface FluidInterface
{
    public function getVolume(): int;
    public function extract(int $volume): FluidInterface;
    public function add(FluidInterface $fluid): void;
}
