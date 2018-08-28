<?php
namespace AwinProductSdk;

use AwinProductSdk\ValueObjects\Advertiser;
use AwinProductSdk\ValueObjects\Product;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
interface FacadeInterface
{

    /**
     * @return Advertiser[]
     */
    public function getAdvertisers(): array;

    /**
     * @return Advertiser[]
     */
    public function getActiveAdvertisers(): array;

    /**
     * @param Advertiser $advertiser
     * @return Product[]
     */
    public function getProducts(Advertiser $advertiser): array;
}
