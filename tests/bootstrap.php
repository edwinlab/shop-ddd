<?php
$loader = require __DIR__."/../vendor/autoload.php";
$loader->addPsr4('ShopCore\\', __DIR__.'/ShopCore');
$loader->addPsr4('ShopInfra\\', __DIR__.'/ShopInfra');
date_default_timezone_set('UTC');