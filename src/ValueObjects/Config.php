<?php
namespace AwinProductSdk\ValueObjects;

class Config
{
    /**
     * @var string
     */
    protected $feedListUrl;

    /**
     * @var string
     */
    protected $downloadDirectory;

    /**
     * @param string $feedListUrl
     */
    public function __construct(string $feedListUrl)
    {
        $this->feedListUrl       = $feedListUrl;
    }

    /**
     * @return string
     */
    public function getFeedListUrl(): string
    {
        return $this->feedListUrl;
    }

}
