<?php

use Tbd\Main\FeatureFlags\FeatureFlag;
use Tbd\Main\FeatureFlags\InMemoryFeatureFlags;

require __DIR__ . '/../vendor/autoload.php';

$initialFlags = require __DIR__ . '/../src/Flags.php';
$featureFlags = new InMemoryFeatureFlags($initialFlags);
FeatureFlag::setFeatureFlags($featureFlags);

$app = new \Tbd\Main\Application();
$app->run();