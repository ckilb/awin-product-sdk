<?php
namespace AwinProductSdk\Factory;

use AwinProductSdk\Client\ClientInterface;

interface FactoryInterface
{

    /**
     * @return ClientInterface
     */
    public function createClient(): ClientInterface;

}
