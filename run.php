<?php

include 'vendor/autoload.php';

function println(string $text)
{
    echo $text . "\n";
}

function wait(int $milliseconds)
{
    usleep($milliseconds * 1000);
}

println('Press Ctrl + C to exit');

use Human\Body\System\Circulatory\Blood;
use Human\Body\System\Circulatory\Vessel;
use Human\Body\System\Circulatory\Heart;

$blood = new Blood(50);
$vessel = new Vessel(50);
$vessel->fillWith($blood);
$heart = new Heart(10);
$heart->addEnergy(120 * 10); // add energy for full 10 beats
$heart->setInput($vessel);

while (true) {
    $heart->expand();
    echo str_pad(str_repeat('|', $heart->getCapacity()), 30) . "\r";
    wait(250);

    $heart->contract();
    echo str_pad(str_repeat('|', $heart->getCapacity()) , 30). "\r";
    wait(600);
}