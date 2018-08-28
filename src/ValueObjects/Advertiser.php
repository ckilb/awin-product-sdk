<?php
namespace AwinProductSdk\ValueObjects;

class Advertiser
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $feedUrl;

    /**
     * @var int
     */
    protected $productsCount;

    /**
     * @var string
     */
    protected $status;

    /**
     * @param int $id
     * @param string $name
     * @param string $feedUrl
     * @param int $productsCount
     * @param string $status
     */
    public function __construct(int $id, string $name, string $feedUrl, int $productsCount, string $status)
    {
        $this->id            = $id;
        $this->name          = $name;
        $this->feedUrl       = $feedUrl;
        $this->productsCount = $productsCount;
        $this->status        = $status;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFeedUrl(): string
    {
        return $this->feedUrl;
    }

    /**
     * @return int
     */
    public function getProductsCount(): int
    {
        return $this->productsCount;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}
