<?php
namespace AwinProductSdk\ValueObjects;

use DateTime;

class Advertiser extends DataObject
{

    const KEY_ID = 'Advertiser ID';
    const KEY_NAME = 'Advertiser Name';
    const KEY_PRIMARY_REGION = 'Primary Region';
    const KEY_STATUS = 'Membership Status';
    const KEY_FEED_ID = 'Feed ID';
    const KEY_FEED_NAME = 'Feed Name';
    const KEY_LANGUAGE = 'Language';
    const KEY_VERTICAL = 'Vertical';
    const KEY_LAST_IMPORTED  = 'Last Imported';
    const KEY_LAST_CHECKED = 'Last Checked';
    const KEY_PRODUCTS_COUNT = 'No of products';
    const KEY_FEED_URL = 'URL';

    /**
     * @var array
     */
    protected $data;




    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return (int) $this->data[static::KEY_ID] ?? null;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->data[static::KEY_NAME] ?? null;
    }

    /**
     * @return string|null
     */
    public function getPrimaryRegion(): ?string
    {
        return $this->data[static::KEY_PRIMARY_REGION] ?? null;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->data[static::KEY_STATUS] ?? null;
    }

    /**
     * @return int|null
     */
    public function getFeedId(): ?int
    {
        return $this->data[static::KEY_FEED_ID] ?? null;
    }

    /**
     * @return string|null
     */
    public function getFeedName(): ?string
    {
        return $this->data[static::KEY_NAME] ?? null;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->data[static::KEY_LANGUAGE] ?? null;
    }

    /**
     * @return string|null
     */
    public function getVertical(): ?string
    {
        return $this->data[static::KEY_VERTICAL] ?? null;
    }

    /**
     * @return DateTime|null
     */
    public function getLastImported(): ?DateTime
    {
        if (empty($this->data[static::KEY_LAST_IMPORTED])) {
            return null;
        }

        return new DateTime($this->data[static::KEY_LAST_IMPORTED]);
    }

    /**
     * @return DateTime|null
     */
    public function getLastChecked(): ?DateTime
    {
        if (empty($this->data[static::KEY_LAST_CHECKED])) {
            return null;
        }

        return new DateTime($this->data[static::KEY_LAST_CHECKED]);
    }

    /**
     * @return int|null
     */
    public function getProductsCount(): ?int
    {
        return (int) $this->data[static::KEY_PRODUCTS_COUNT] ?? null;
    }

    /**
     * @return string|null
     */
    public function getFeedUrl(): ?string
    {
        return $this->data[static::KEY_FEED_URL] ?? null;
    }
}
