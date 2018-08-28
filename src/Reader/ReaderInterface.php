<?php
namespace AwinProductSdk\Reader;

use AwinProductSdk\ValueObjects\Advertiser;
use AwinProductSdk\ValueObjects\Product;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
interface ReaderInterface
{

    /**
     * @param string $feedListUrl
     * @return Advertiser[]
     */
    public function getAdvertisers(string $feedListUrl): array;

    /**
     * @param string $feedListUrl
     * @return Advertiser[]
     */
    public function getActiveAdvertisers(string $feedListUrl): array;

    /**
     * @param Advertiser $advertiser
     * @return Product[]
     */
    public function getProducts(Advertiser $advertiser);

}
