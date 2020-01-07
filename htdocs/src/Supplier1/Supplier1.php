<?php

/*
 * This file is part of the "Divante/Integration" package.
 *
 * (c) Divante Sp. z o. o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Supplier1;

use Divante\Integration\IntegrationEvents;
use Divante\Integration\Parser\ParserType;
use Divante\Integration\Supplier\Event\GetProductsEvent;
use Divante\Integration\Supplier\SupplierAbstract;

/**
 * Class Supplier1
 *
 * @package Divante\Integration\Supplier
 */
class Supplier1 extends SupplierAbstract
{
    /**
     * {@inheritdoc}
     */
    public static function getName()
    {
        return "Supplier1";
    }

    /**
     * {@inheritdoc}
     */
    public static function getResponseType()
    {
        return ParserType::PARSER_TYPE_XML;
    }

    /**
     * {@inheritdoc}
     */
    protected function parseResponse()
    {
        $parsed = $this->parser->parse($this->getResponse());

        $this->eventDispatcher->dispatch(
            IntegrationEvents::SUPPLIER_GET_PRODUCTS,
            new GetProductsEvent($parsed['products'], self::getName())
        );

        return $parsed['products'];
    }

    /**
     * Simulate get response method
     *
     * @return string
     */
    protected function getResponse()
    {
        return file_get_contents('http://api/supplier1.xml');
    }
}
