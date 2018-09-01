<?php
use AwinProductSdk\ValueObjects\Advertiser;
use AwinProductSdk\ValueObjects\Product;

require_once 'vendor/autoload.php';

$apiKey = '2380671ca00594f6ac9eb2d1409e5eb6';
$factory = new \AwinProductSdk\Factory\Factory();
$config = new \AwinProductSdk\ValueObjects\Config(
    'https://productdata.awin.com/datafeed/list/apikey/' . $apiKey,
    new \Symfony\Component\Cache\Simple\FilesystemCache()
);
$aWin = $factory->createFacade($config);


$advertisers = $aWin->getAdvertisers();
$activeAdvertisers = $aWin->filterAdvertisers(Advertiser::KEY_STATUS, 'active', $advertisers);

/**
 * @var Advertiser $advertiser
 */
foreach ($activeAdvertisers as $index => $advertiser) {
    $products = $aWin->getProducts($advertiser);
    $shirts   = $aWin->filterProductsByRegExp(Product::KEY_NAME, '/shirt/i', $products);

    echo $advertiser->getId().': ' . $advertiser->getName() .PHP_EOL;

    /**
     * @var Product $shirt
     */
    foreach ($shirts as $shirt) {
        echo '- ' . $shirt->getId() . ': ' . $shirt->getName().PHP_EOL;
    }
}
