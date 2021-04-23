<?php

namespace Human\Body;

interface ChannelInterface
{
    public function fillWith(FluidInterface $fluid): void;
    public function getFluid(): ?FluidInterface;
    public function suck(int $volume): ?FluidInterface;
}
