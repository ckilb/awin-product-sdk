<?php
require_once 'vendor/autoload.php';

$factory = new \AwinProductSdk\Factory\Factory();
$config = new \AwinProductSdk\ValueObjects\Config(
    'https://productdata.awin.com/datafeed/list/apikey/2380671ca00594f6ac9eb2d1409e5eb6',
'/tmp/bla'
);
$aWin = $factory->createFacade($config);

$advertisers = $aWin->getActiveAdvertisers();

foreach ($advertisers as $advertiser) {
    $products = $aWin->getProducts($advertiser);

    foreach ($products as $product) {
        echo $product->getName().'-'.$product->getUrl().PHP_EOL;
    }
}
