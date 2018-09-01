<?php
namespace AwinProductSdk\Filter;

use AwinProductSdk\Collection\AdvertiserCollection;
use AwinProductSdk\Collection\ProductCollection;
use AwinProductSdk\ValueObjects\Advertiser;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
class Filter implements FilterInterface
{

    /**
     * @param string $key
     * @param string $value
     * @param ProductCollection $products
     * @return ProductCollection
     */
    public function filterProducts(string $key, string $value, ProductCollection $products): ProductCollection
    {
        $index    = $this->getIndexByKey($key, $products->getKeys());
        $filtered = $this->filterObjects($index, $value, $products->getData());

        return new ProductCollection($products->getKeys(), $filtered);
    }

    /**
     * @param string $key
     * @param string $regExp
     * @param ProductCollection $products
     * @return ProductCollection
     */
    public function filterProductsByRegExp(string $key, string $regExp, ProductCollection $products): ProductCollection
    {
        $index    = $this->getIndexByKey($key, $products->getKeys());
        $filtered = $this->filterObjectsByRegExp($index, $regExp, $products->getData());

        return new ProductCollection($products->getKeys(), $filtered);
    }

    /**
     * @param string $key
     * @param string $value
     * @param AdvertiserCollection $advertisers
     * @return AdvertiserCollection
     */
    public function filterAdvertisers(string $key, string $value, AdvertiserCollection $advertisers): AdvertiserCollection
    {
        $index    = $this->getIndexByKey($key, $advertisers->getKeys());
        $filtered = $this->filterObjects($index, $value, $advertisers->getData());

        return new AdvertiserCollection($advertisers->getKeys(), $filtered);
    }

    /**
     * @param string $key
     * @param string $regExp
     * @param AdvertiserCollection $advertisers
     * @return AdvertiserCollection
     */
    public function filterAdvertisersByRegExp(string $key, string $regExp, AdvertiserCollection $advertisers): AdvertiserCollection
    {
        $index    = $this->getIndexByKey($key, $advertisers->getKeys());
        $filtered = $this->filterObjectsByRegExp($index, $regExp, $advertisers->getData());

        return new AdvertiserCollection($advertisers->getKeys(), $filtered);
    }

    /**
     * @param string $index
     * @param string $value
     * @param array $objects
     * @return array
     */
    private function filterObjects(string $index, string $value, array $objects): array
    {
        $filtered = [];

        foreach ($objects as $object) {
            if (empty($object[$index])) {
                continue;
            }

            if (mb_strtolower($value) === mb_strtolower($object[$index])) {
                $filtered[] = $object;
            }
        }

        return $filtered;
    }

    /**
     * @param string $index
     * @param string $regExp
     * @param array $objects
     * @return array
     */
    private function filterObjectsByRegExp(string $index, string $regExp, array $objects): array
    {
        $filtered = [];

        foreach ($objects as $object) {
            if (empty($object[$index])) {
                continue;
            }

            if (preg_match($regExp, $object[$index]) === 1) {
                $filtered[] = $object;
            }
        }

        return $filtered;
    }

    /**
     * @param string $key
     * @param array $keys
     * @return int|null
     */
    private function getIndexByKey(string $key, array $keys): ?int
    {
        $indexes = array_flip($keys);

        if (!empty($indexes[$key])) {
            return $indexes[$key];
        }

        return null;
    }
}
