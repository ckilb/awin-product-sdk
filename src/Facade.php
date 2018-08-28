<?php
namespace AwinProductSdk;

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
     * @param Config $config
     * @param ReaderInterface $updater
     */
    public function __construct(Config $config, ReaderInterface $reader)
    {
        $this->config  = $config;
        $this->reader = $reader;
    }

    /**
     * @return Advertiser[]
     */
    public function getAdvertisers(): array
    {
        return $this->reader->getAdvertisers($this->config->getFeedListUrl());
    }

    /**
     * @return Advertiser[]
     */
    public function getActiveAdvertisers(): array
    {
        return $this->reader->getActiveAdvertisers($this->config->getFeedListUrl());
    }

    /**
     * @param Advertiser $advertiser
     * @return Product[]
     */
    public function getProducts(Advertiser $advertiser): array
    {
        return $this->reader->getProducts($advertiser);
    }
}
