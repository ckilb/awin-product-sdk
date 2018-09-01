<?php
namespace AwinProductSdk\ValueObjects;

use Psr\SimpleCache\CacheInterface;

class Config
{
    /**
     * @var string
     */
    protected $feedListUrl;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * @var string
     */
    protected $cachePrefix;

    /**
     * @param string $feedListUrl
     * @param CacheInterface $cache
     */
    public function __construct(string $feedListUrl, CacheInterface $cache)
    {
        $this->feedListUrl = $feedListUrl;
        $this->cache       = $cache;
    }

    /**
     * @return string
     */
    public function getFeedListUrl(): string
    {
        return $this->feedListUrl;
    }

    /**
     * @return CacheInterface
     */
    public function getCache(): CacheInterface
    {
        return $this->cache;
    }

    /**
     * @return string
     */
    public function getCachePrefix(): string
    {
        return $this->cachePrefix;
    }

}
