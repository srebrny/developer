<?php


namespace Supplier3;


use Divante\Integration\IntegrationEvents;
use Divante\Integration\Parser\ParserType;
use Divante\Integration\Supplier\Event\GetProductsEvent;
use Divante\Integration\Supplier\SupplierAbstract;

class Supplier3 extends SupplierAbstract
{
    /**
     * {@inheritdoc}
     */
    public static function getName()
    {
        return "SUPPLIER3";
    }

    /**
     * {@inheritdoc}
     */
    public static function getResponseType()
    {
        return "application/json";
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
        return file_get_contents('http://api/supplier3.json');
    }
}
