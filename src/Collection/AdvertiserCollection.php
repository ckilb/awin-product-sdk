<?php
namespace AwinProductSdk\Collection;

use AwinProductSdk\ValueObjects\Advertiser;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
class AdvertiserCollection extends Collection
{
    /**
     * @param int $offset
     * @return Advertiser
     */
    public function offsetGet($offset): Advertiser
    {
        $line = $this->data[$offset];

        $data = [];

        foreach ($line as $index => $value) {
            $key = $this->keys[$index];
            $data[$key] = $value;
        }

        return new Advertiser($data);
    }
}
