<?php

namespace PHPhysics;

require_once __DIR__ . '/vendor/autoload.php';

use PHPhysics\Model\Body;
use PHPhysics\Model\Simulation;

$simulation = new Simulation();
$simulation->addBody(new Body(150, 250));
$simulation->addBody(new Body(150, 250));
$simulation->addBody(new Body(150, 250));
$simulation->addBody(new Body(150, 250));
$simulation->addBody(new Body(150, 250));
$simulation->addBody(new Body(150, 250));
$simulation->addBody(new Body(150, 250));
$simulation->addBody(new Body(150, 250));

$image = imagecreate(300, 300);
imagefilledrectangle($image, 0, 0, 300, 300, imagecolorallocate($image, 255, 255, 255));

$colorFactor = 8;
for($i = 0; $i < 25; $i++){
    $simulation->nextStep();

    /** @var Body $body */
    foreach($simulation->getBodies() as $body){
        $colorIntensity = 255 - $i * $colorFactor;
        imagesetpixel($image, round($body->getX()), round($body->getY()), imagecolorallocate($image, $colorIntensity, $colorIntensity, $colorIntensity));
    }
}

imageflip($image, IMG_FLIP_VERTICAL);
imagepng($image, 'demo.png');
