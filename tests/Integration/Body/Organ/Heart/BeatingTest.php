<?php

namespace Human\Integration\Body;

use Human\Body\Channel\Vessel;
use Human\Body\Fluid\Blood;
use Human\Body\Organ\Heart;
use PHPUnit\Framework\TestCase;

class BeatingTest extends TestCase
{
    public function test_beats_with_input()
    {
        $blood = new Blood(15); // volume 200
        $vessel = new Vessel(20); // capacity 200 this is very high pressure :/
        $vessel->fillWith($blood);

        $heart = new Heart(5);
        $heart->setInput($vessel);
        $heart->expand();

        $this->assertSame(10, $vessel->getFluid()->getVolume());
        $this->assertSame(5, $heart->getFluid()->getVolume());

        $heart->contract();

        $this->assertSame(10, $vessel->getFluid()->getVolume());
        $this->assertSame(null, $heart->getFluid());

        // stress it out a bit
        $heart->setDefaultCapacity(15);
        $heart->expand();

        $this->assertSame(null, $vessel->getFluid());
        $this->assertSame(10, $heart->getFluid()->getVolume());

        $heart->contract();

        $this->assertSame(null, $vessel->getFluid());
        $this->assertSame(null, $heart->getFluid());
    }
}
