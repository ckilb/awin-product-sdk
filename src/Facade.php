<?php
namespace AwinProductSdk;

use AwinProductSdk\Collection\AdvertiserCollection;
use AwinProductSdk\Collection\ProductCollection;
use AwinProductSdk\Filter\FilterInterface;
use AwinProductSdk\Reader\ReaderInterface;
use AwinProductSdk\ValueObjects\Advertiser;
use AwinProductSdk\ValueObjects\Config;
use AwinProductSdk\ValueObjects\Product;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
class Facade implements FacadeInterface
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var ReaderInterface
     */
    protected $reader;

    /**
     * @var FilterInterface
     */
    protected $filter;

    /**
     * @param Config $config
     * @param ReaderInterface $reader
     * @param FilterInterface $filter
     */
    public function __construct(Config $config, ReaderInterface $reader, FilterInterface $filter)
    {
        $this->config = $config;
        $this->reader = $reader;
        $this->filter = $filter;
    }

    /**
     * @return AdvertiserCollection
     */
    public function getAdvertisers(): AdvertiserCollection
    {
        return $this->reader->getAdvertisers($this->config->getFeedListUrl());
    }

    /**
     * @param Advertiser $advertiser
     * @return ProductCollection
     */
    public function getProducts(Advertiser $advertiser): ProductCollection
    {
        return $this->reader->getProducts($advertiser);
    }

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
    ): AdvertiserCollection {
        return $this->filter->filterAdvertisers($key, $value, $advertisers);
    }

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
    ): ProductCollection {
        return $this->filter->filterProducts($key, $value, $products);
    }

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
    ): AdvertiserCollection {
        return $this->filter->filterAdvertisersByRegexp($key, $regExp, $advertisers);
    }

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
    ): ProductCollection {
        return $this->filter->filterProductsByRegExp($key, $regExp, $products);
    }
}
