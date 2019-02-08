<?php
namespace AwinProductSdk\CsvParser;

use AwinProductSdk\Collection\AdvertiserCollection;
use AwinProductSdk\Collection\ProductCollection;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
class CsvParser implements CsvParserInterface
{

    const INDEX_ADVERTISER_ID            = 0;
    const INDEX_ADVERTISER_NAME          = 1;
    const INDEX_ADVERTISER_STATUS        = 3;
    const INDEX_ADVERTISER_PRODUCT_COUNT = 10;
    const INDEX_ADVERTISER_FEED_URL      = 11;

    /**
     * @param string $csvContent
     * @return AdvertiserCollection
     */
    public function parseAdvertisers(string $csvContent): AdvertiserCollection
    {
        $lines = $this->parse($csvContent);
        $keys = array_shift($lines);

        return new AdvertiserCollection($keys, $lines);
    }

    /**
     * @param string $csvContent
     * @return ProductCollection
     */
    public function parseProducts(string $csvContent): ProductCollection
    {
        $lines = $this->parse($csvContent);
        $keys = array_shift($lines);

        return new ProductCollection($keys, $lines);
    }

    /**
     * @param string $content
     * @return array
     */
    private function parse(string $content): array
    {
        $lines = str_getcsv($content, "\n");

        foreach ($lines as $index => $line) {
            $lines[$index] = str_getcsv($line);
        }

        return $lines;
    }
}
