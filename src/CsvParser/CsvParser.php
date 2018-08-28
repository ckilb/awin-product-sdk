<?php
namespace AwinProductSdk\CsvParser;

use AwinProductSdk\ValueObjects\Advertiser;
use AwinProductSdk\ValueObjects\Product;

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
     * @return Advertiser[]
     */
    public function parseAdvertisers(string $csvContent): array
    {
        $lines = $this->parse($csvContent);
        $advertisers = [];

        foreach ($lines as $line) {
            $advertisers[] = new Advertiser(
                (int) $line[static::INDEX_ADVERTISER_ID],
                $line[static::INDEX_ADVERTISER_NAME],
                $line[static::INDEX_ADVERTISER_FEED_URL],
                (int) $line[static::INDEX_ADVERTISER_PRODUCT_COUNT],
                $line[static::INDEX_ADVERTISER_STATUS]
            );
        }

        return $advertisers;
    }

    /**
     * @param string $csvContent
     * @return Product[]
     */
    public function parseProducts(string $csvContent): array
    {
        $lines = $this->parse($csvContent);
        $keys = array_shift($lines);

        $products = [];

        foreach ($lines as $line) {
            $data = [];

            foreach ($line as $index => $value) {
                $key = $keys[$index];
                $data[$key] = $value;
            }

            $products[] = new Product($data);
        }

        return $products;
    }

    /**
     * @param string $content
     * @return array
     */
    private function parse(string $content): array
    {
        $lines = str_getcsv($content, PHP_EOL);

        foreach ($lines as $index => $line) {
            $lines[$index] = str_getcsv($line);
        }

        return $lines;
    }
}
