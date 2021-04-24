<?php

namespace Human\Tests\Unit\Body\System\Circulatory;

use Human\Body\System\Circulatory\Heart;
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
        $heart->addEnergy(500);
        $heart->expand();

        $this->assertSame(5, $heart->getCapacity());
    }

    public function test_nothing_happens_with_no_energy()
    {
        $heart = new Heart(5);
        $heart->expand();

        $this->assertSame(0, $heart->getCapacity());
    }

    public function test_low_energy()
    {
        $heart = new Heart(5);
        $heart->addEnergy(10); // 10 of energy allows heart to expand to 1 capacity
        $heart->expand();

        $this->assertSame(1, $heart->getCapacity());
    }

    public function test_capacity_reduces_on_contraction_after_expanding()
    {
        $heart = new Heart(5);
        $heart->addEnergy(500);

        $heart->expand();
        $this->assertSame(5, $heart->getCapacity());

        $heart->contract();
        $this->assertSame(0, $heart->getCapacity());
    }
}
