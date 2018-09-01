<?php
namespace AwinProductSdk;

use AwinProductSdk\Collection\AdvertiserCollection;
use AwinProductSdk\Collection\ProductCollection;
use AwinProductSdk\ValueObjects\Advertiser;
use AwinProductSdk\ValueObjects\Product;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
interface FacadeInterface
{

    /**
     * @return AdvertiserCollection
     */
    public function getAdvertisers(): AdvertiserCollection;

    /**
     * @param Advertiser $advertiser
     * @return ProductCollection
     */
    public function getProducts(Advertiser $advertiser): ProductCollection;

    /**
     * @param string $key
     * @param string $value
     * @param AdvertiserCollection $advertisers
     * @return AdvertiserCollection
     */
    public function filterAdvertisers(
        string $key,
        string $value,
        AdvertiserCollection $advertisers
    ): AdvertiserCollection;

    /**
     * @param string $key
     * @param string $value
     * @param ProductCollection $products
     * @return ProductCollection
     */
    public function filterProducts(
        string $key,
        string $value,
        ProductCollection $products
    ): ProductCollection;

    /**
     * @param string $key
     * @param string $regExp
     * @param AdvertiserCollection $advertisers
     * @return AdvertiserCollection
     */
    public function filterAdvertisersByRegExp(
        string $key,
        string $regExp,
        AdvertiserCollection $advertisers
    ): AdvertiserCollection;

    /**
     * @param string $key
     * @param string $regExp
     * @param ProductCollection $products
     * @return ProductCollection
     */
    public function filterProductsByRegExp(
        string $key,
        string $regExp,
        ProductCollection $products
    ): ProductCollection;
}
