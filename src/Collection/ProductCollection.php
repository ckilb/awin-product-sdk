<?php
namespace AwinProductSdk\Collection;

use AwinProductSdk\ValueObjects\Product;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
class ProductCollection extends Collection
{

    /**
     * @param int $offset
     * @return Product
     */
    public function offsetGet($offset): Product
    {
        $line = $this->data[$offset];

        $data = [];

        foreach ($line as $index => $value) {
            $key = $this->keys[$index];
            $data[$key] = $value;
        }

        return new Product($data);
    }


}
