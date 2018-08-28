<?php
namespace AwinProductSdk\Factory;

use AwinProductSdk\CsvParser\CsvParser;
use AwinProductSdk\CsvParser\CsvParserInterface;
use AwinProductSdk\Facade;
use AwinProductSdk\FacadeInterface;
use AwinProductSdk\Reader\Reader;
use AwinProductSdk\Reader\ReaderInterface;
use AwinProductSdk\Updater\Updater;
use AwinProductSdk\Updater\UpdaterInterface;
use AwinProductSdk\ValueObjects\Config;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

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
            $this->createReader()
        );
    }
    /**
     * @return ClientInterface
     */
    public function createClient(): ClientInterface
    {
        return new Client();
    }

    /**
     * @return CsvParserInterface
     */
    public function createCsvParser(): CsvParserInterface
    {
        return new CsvParser();
    }

    /**
     * @return ReaderInterface
     */
    public function createReader(): ReaderInterface
    {
        return new Reader(
            $this->createCsvParser(),
            $this->createClient()
        );
    }

}
