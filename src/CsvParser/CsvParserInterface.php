<?php
namespace AwinProductSdk\CsvParser;

use AwinProductSdk\Collection\AdvertiserCollection;
use AwinProductSdk\Collection\ProductCollection;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
interface CsvParserInterface
{

    /**
     * @param string $csvContent
     * @return AdvertiserCollection
     */
    public function parseAdvertisers(string $csvContent): AdvertiserCollection;

    /**
     * @param string $csvContent
     * @return ProductCollection
     */
    public function parseProducts(string $csvContent): ProductCollection;

}
