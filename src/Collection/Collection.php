<?php
namespace AwinProductSdk\Collection;

use ArrayAccess;
use AwinProductSdk\ValueObjects\DataObject;
use AwinProductSdk\ValueObjects\Product;
use Countable;

/**
 * @package AwinProductSdk\Client
 * @author Christian Kilb <info@cilb.de>
 */
abstract class Collection implements ArrayAccess, Countable, \Iterator
{

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string[]
     */
    protected $keys;

    /**
     * @var int
     */
    protected $position = 0;

    /**
     * @param string[] $keys
     * @param string[] $data
     */
    public function __construct(array $keys, array $data)
    {
        $this->keys = $keys;
        $this->data = $data;
    }

    /**
     * @param int $offset
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        if (!isset($this->data[$offset])) {
            return false;
        }

        return true;
    }

    /**
     * @param int $offset
     * @param Product $value
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        $this->data[$offset] = $value;
    }

    /**
     * @param int $offset
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset): void
    {
        unset($this->data[$offset]);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->data);
    }

    /**
     * @return DataObject
     */
    public function current(): DataObject
    {
        return $this->offsetGet($this->position);
    }

    /**
     * @return void
     */
    public function next()
    {
        $this->position = $this->position + 1;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        if (!isset($this->data[$this->position])) {
            return false;
        }

        return true;
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string[]
     */
    public function getKeys(): array
    {
        return $this->keys;
    }

}
