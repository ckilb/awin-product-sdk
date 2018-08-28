<?php
namespace AwinProductSdk\Reader;

use AwinProductSdk\Constants;
use AwinProductSdk\CsvParser\CsvParserInterface;
use AwinProductSdk\ValueObjects\Advertiser;
use AwinProductSdk\ValueObjects\Product;
use GuzzleHttp\ClientInterface;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
class Reader implements ReaderInterface
{
    const REQUEST_METHOD = 'GET';

    /**
     * @var CsvParserInterface
     */
    private $csvParser;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param CsvParserInterface $csvParser
     * @param ClientInterface $client
     */
    public function __construct(CsvParserInterface $csvParser, ClientInterface $client)
    {
        $this->csvParser = $csvParser;
        $this->client    = $client;
    }

    /**
     * @param string $feedListUrl
     * @return Advertiser[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAdvertisers(string $feedListUrl): array
    {
        $response = $this->client->request(static::REQUEST_METHOD, $feedListUrl);

        return $this->csvParser->parseAdvertisers($response->getBody());
    }

    /**
     * @param string $feedListUrl
     * @return Advertiser[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getActiveAdvertisers(string $feedListUrl): array
    {
        $advertisers = $this->getAdvertisers($feedListUrl);

        return array_filter($advertisers, function (Advertiser $advertiser) {
            return Constants::ADVERTISER_STATUS_ACTIVE === $advertiser->getStatus();
        });
    }

    /**
     * @param Advertiser $advertiser
     * @return Product[]|
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProducts(Advertiser $advertiser): array
    {
        $response = $this->client->request(static::REQUEST_METHOD, $advertiser->getFeedUrl());
        $content = gzdecode($response->getBody());

        return $this->csvParser->parseProducts($content);
    }

}
