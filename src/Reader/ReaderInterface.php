<?php
namespace AwinProductSdk\Reader;

use AwinProductSdk\Collection\AdvertiserCollection;
use AwinProductSdk\Collection\ProductCollection;
use AwinProductSdk\ValueObjects\Advertiser;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
interface ReaderInterface
{

    /**
     * @param string $feedListUrl
     * @return AdvertiserCollection
     */
    public function getAdvertisers(string $feedListUrl): AdvertiserCollection;

    /**
     * @param Advertiser $advertiser
     * @return ProductCollection
     */
    public function getProducts(Advertiser $advertiser): ProductCollection;

}
