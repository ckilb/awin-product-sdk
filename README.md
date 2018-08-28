# Awin Product SDK
An inofficial PHP SDK to grab product data from Awin.

## Installation
```
composer require ckdot/awin-product-sdk
```

## Usage

```php
<?php
require_once 'vendor/autoload.php';

$apiKey = 'YOUR_API_KEY'
$factory = new \AwinProductSdk\Factory\Factory();
$config = new \AwinProductSdk\ValueObjects\Config(
    'https://productdata.awin.com/datafeed/list/apikey/' . $apiKey
);
$aWin = $factory->createFacade($config);

$advertisers = $aWin->getActiveAdvertisers();

foreach ($advertisers as $advertiser) {
    $products = $aWin->getProducts($advertiser);

    foreach ($products as $product) {
        echo $product->getName().'-'.$product->getUrl().PHP_EOL;
        echo $product->get('your-custom-attribute').PHP_EOL;
    }
}
```

## How it works
The SDK is using the Awin product feed CSV files to read out advertiser and product data.
Basically parsing of these data is quite fast but still you should be aware that some product feeds have a size of several megabytes.
So I recommand to fetch data via SDK in background (cronjob) and store them into your own database.

## Documentation

There is no documention. If you want to know how it works in detail, read the code.


## License

MIT:
https://en.wikipedia.org/wiki/MIT_License
