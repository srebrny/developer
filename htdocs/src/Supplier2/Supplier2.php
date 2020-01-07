<?php


namespace Supplier2;

use Divante\Integration\IntegrationEvents;
use Divante\Integration\Parser\ParserType;
use Divante\Integration\Supplier\Event\GetProductsEvent;
use Divante\Integration\Supplier\SupplierAbstract;


/**
 * Class Supplier2
 *
 * @package Divante\Integration\Supplier
 */
class Supplier2 extends SupplierAbstract
{
    /**
     * {@inheritdoc}
     */
    public static function getName()
    {
        return "SUPPLIER2";
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
            new GetProductsEvent($parsed['items'], self::getName())
        );

        return $parsed['items'];
    }

    /**
     * Simulate get response method
     *
     * @return string
     */
    protected function getResponse()
    {
        return file_get_contents('http://api/supplier2.xml');
    }
}
