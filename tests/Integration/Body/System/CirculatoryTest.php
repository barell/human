<?php

namespace Human\Tests\Integration\System;

use Human\Body\System\Circulatory\Blood;
use Human\Body\System\Circulatory\Heart;
use Human\Body\System\Circulatory\Vessel;
use PHPUnit\Framework\TestCase;

class CirculatoryTest extends TestCase
{
    public function test_heart_beats()
    {
        $blood = new Blood(15);
        $vein = new Vessel(20);
        $artery = new Vessel(20);

        $vein->fillWith($blood);

        $heart = new Heart(5);
        $heart->addEnergy(1000);
        $heart->setInput($vein);
        $heart->setOutput($artery);
        $heart->expand();

        $this->assertSame(10, $vein->getFluid()->getVolume());
        $this->assertSame(null, $artery->getFluid());
        $this->assertSame(5, $heart->getFluid()->getVolume());
        $this->assertSame(950, $heart->getEnergy());

        $heart->contract();

        $this->assertSame(10, $vein->getFluid()->getVolume());
        $this->assertSame(5, $artery->getFluid()->getVolume());
        $this->assertSame(null, $heart->getFluid());
        $this->assertSame(940, $heart->getEnergy());

        // stress it out a bit
        $heart->setDefaultCapacity(15);
        $heart->expand();

        $this->assertSame(null, $vein->getFluid());
        $this->assertSame(5, $artery->getFluid()->getVolume());
        $this->assertSame(10, $heart->getFluid()->getVolume());
        $this->assertSame(790, $heart->getEnergy());

        $heart->contract();

        $this->assertSame(null, $vein->getFluid());
        $this->assertSame(15, $artery->getFluid()->getVolume());
        $this->assertSame(null, $heart->getFluid());
        $this->assertSame(760, $heart->getEnergy());
    }
}
