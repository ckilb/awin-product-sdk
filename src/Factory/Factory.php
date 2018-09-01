<?php
namespace AwinProductSdk\Factory;

use AwinProductSdk\CsvParser\CsvParser;
use AwinProductSdk\CsvParser\CsvParserInterface;
use AwinProductSdk\Facade;
use AwinProductSdk\FacadeInterface;
use AwinProductSdk\Filter\Filter;
use AwinProductSdk\Filter\FilterInterface;
use AwinProductSdk\Reader\Reader;
use AwinProductSdk\Reader\ReaderInterface;
use AwinProductSdk\ValueObjects\Config;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\SimpleCache\CacheInterface;

class Factory
{

    /**
     * @param Config $config
     * @return FacadeInterface
     */
    public function createFacade(Config $config): FacadeInterface
    {
        return new Facade(
            $config,
            $this->createReader($config->getCache()),
            $this->createFilter()
        );
    }
    /**
     * @return ClientInterface
     */
    protected function createClient(): ClientInterface
    {
        return new Client();
    }

    /**
     * @return CsvParserInterface
     */
    protected function createCsvParser(): CsvParserInterface
    {
        return new CsvParser();
    }

    /**
     * @return FilterInterface
     */
    protected function createFilter(): FilterInterface
    {
        return new Filter();
    }

    /**
     * @param CacheInterface $cache
     *
     * @return ReaderInterface
     */
    protected function createReader(CacheInterface $cache): ReaderInterface
    {
        return new Reader(
            $this->createCsvParser(),
            $this->createClient(),
            $cache
        );
    }

}
