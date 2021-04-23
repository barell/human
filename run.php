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

$blood = new \Human\Body\Fluid\Blood(50);
$vessel = new \Human\Body\Channel\Vessel(50);
$vessel->fillWith($blood);
$heart = new \Human\Body\Organ\Heart(10);
$heart->setInput($vessel);

while (true) {
    if ($vessel->getFluid() !== null) {
        println(\sprintf('There is %d blood in vessel', $vessel->getFluid()->getVolume()));
    } else {
        println('No more blood in vessel');
    }

    $heart->expand();
    println('Heart expanded ' . $heart->getCapacity());
    wait(500);

    $heart->contract();
    println('Heart contracted');
    wait(1000);

    println('---------------------');
}