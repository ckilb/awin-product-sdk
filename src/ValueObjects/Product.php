<?php
namespace AwinProductSdk\ValueObjects;

class Product extends DataObject
{
    const KEY_ID          = 'aw_product_id';
    const KEY_NAME        = 'product_name';
    const KEY_URL         = 'aw_deep_link';
    const KEY_SIZE        = 'Fashion:size';
    const KEY_IMAGE_URL   = 'merchant_image_url';
    const KEY_DESCRIPTION = 'description';
    const KEY_CATEGORY    = 'merchant_category';
    const KEY_PRICE       = 'search_price';
    const KEY_BRAND_NAME  = 'brand_name';
    const KEY_COLOR       = 'color';

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
    public function getUrl(): ?string
    {
        return $this->data[static::KEY_URL] ?? null;
    }

    /**
     * @return string|null
     */
    public function getSize(): ?string
    {
        return $this->data[static::KEY_SIZE] ?? null;
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->data[static::KEY_IMAGE_URL] ?? null;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->data[static::KEY_DESCRIPTION] ?? null;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->data[static::KEY_CATEGORY] ?? null;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->data[static::KEY_PRICE] ?? null;
    }

    /**
     * @return string|null
     */
    public function getBrandName(): ?string
    {
        return $this->data[static::KEY_BRAND_NAME] ?? null;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->data[static::KEY_COLOR] ?? null;
    }

}
