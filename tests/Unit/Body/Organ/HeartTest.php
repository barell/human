<?php

namespace Human\Tests\Unit\Body\Organ;

use Human\Body\Channel\Vessel;
use Human\Body\Fluid\Blood;
use Human\Body\Organ\Heart;
use PHPUnit\Framework\TestCase;

class HeartTest extends TestCase
{
    public function test_initial_capacity_is_none()
    {
        $heart = new Heart(5);

        $this->assertSame(0, $heart->getCapacity());
    }

    public function test_capacity_expands()
    {
        $heart = new Heart(5);
        $heart->expand();

        $this->assertSame(5, $heart->getCapacity());
    }

    public function test_capacity_reduces_on_contraction_after_expanding()
    {
        $heart = new Heart(5);
        $heart->expand();
        $heart->contract();

        $this->assertSame(0, $heart->getCapacity());
    }
}
