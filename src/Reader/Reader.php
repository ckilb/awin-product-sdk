<?php
namespace AwinProductSdk\Reader;

use AwinProductSdk\Collection\AdvertiserCollection;
use AwinProductSdk\Collection\ProductCollection;
use AwinProductSdk\CsvParser\CsvParserInterface;
use AwinProductSdk\ValueObjects\Advertiser;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\SimpleCache\CacheInterface;
use Psr\SimpleCache\InvalidArgumentException;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
class Reader implements ReaderInterface
{
    const REQUEST_METHOD = 'GET';
    const CACHE_PREFIX   = 'awin-product-sdk';

    /**
     * @var CsvParserInterface
     */
    private $csvParser;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * @param CsvParserInterface $csvParser
     * @param ClientInterface $client
     * @param CacheInterface $cache
     */
    public function __construct(CsvParserInterface $csvParser, ClientInterface $client, CacheInterface $cache)
    {
        $this->csvParser = $csvParser;
        $this->client    = $client;
        $this->cache     = $cache;
    }

    /**
     * @param string $feedListUrl
     * @return AdvertiserCollection
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function getAdvertisers(string $feedListUrl): AdvertiserCollection
    {
        $response    = $this->getResponse($feedListUrl);
        $advertisers = $this->csvParser->parseAdvertisers($response);

        return $advertisers;
    }

    /**
     * @param Advertiser $advertiser
     * @return ProductCollection
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function getProducts(Advertiser $advertiser): ProductCollection
    {
        $response = $this->getResponse($advertiser->getFeedUrl());
        $content = gzdecode($response);

        $products = $this->csvParser->parseProducts($content);

        return $products;
    }

    /**
     * @param string $url
     * @return string
     * @throws InvalidArgumentException
     * @throws GuzzleException
     */
    private function getResponse(string $url): string
    {
        $cacheKey = sprintf('%s-%s',
            static::CACHE_PREFIX,
            md5($url)
        );

        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $response = $this->client->request(static::REQUEST_METHOD, $url);
        $body     = (string) $response->getBody();

        $this->cache->set($cacheKey, $body);

        return $body;
    }

}
