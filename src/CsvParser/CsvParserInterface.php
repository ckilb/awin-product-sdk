<?php
namespace AwinProductSdk\CsvParser;

use AwinProductSdk\ValueObjects\Advertiser;
use AwinProductSdk\ValueObjects\Product;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
interface CsvParserInterface
{

    /**
     * @param string $csvContent
     * @return Advertiser[]
     */
    public function parseAdvertisers(string $csvContent): array;

    /**
     * @param string $csvContent
     * @return Product[]
     */
    public function parseProducts(string $csvContent): array;

}
