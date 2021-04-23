<?php

namespace Human\Body;

interface FluidInterface
{
    public function getVolume(): int;
    public function extract(int $volume): FluidInterface;
}
