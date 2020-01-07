<?php

/*
 * This file is part of the "Divante/Integration" package.
 *
 * (c) Divante Sp. z o. o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Divante\Integration\Supplier;

use Divante\Integration\IntegrationEvents;
use Divante\Integration\Parser\FactoryInterface as ParserFactoryInterface;
use Divante\Integration\Parser\ParserType;
use Divante\Integration\Supplier\Listener\ProductsListener;
use Supplier1\Supplier1;
use Supplier2\Supplier2;
use Supplier3\Supplier3;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class Factory
 *
 * @package Divante\Integration\Supplier
 */
class Factory implements FactoryInterface
{
    /**
     * Parser factory
     *
     * @var ParserFactoryInterface
     */
    protected $parserFactory;

    /**
     * Event dispatcher
     *
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * Constructor
     *
     * @param ParserFactoryInterface $parserFactory
     * @param EventDispatcher $eventDispatcher
     */
    public function __construct(ParserFactoryInterface $parserFactory, EventDispatcher $eventDispatcher)
    {
        $this->parserFactory = $parserFactory;
        $this->eventDispatcher = $eventDispatcher;

        // add listener
        $this->eventDispatcher->addListener(
            IntegrationEvents::SUPPLIER_GET_PRODUCTS,
            array(new ProductsListener(), 'logProducts')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getSupplier($supplierName)
    {

        $upperSupplierName = strtoupper($supplierName);

        switch ($upperSupplierName) {
            case Supplier1::getName():
                return new Supplier1(
                    $this->parserFactory->getParser(ParserType::PARSER_TYPE_XML.'_'.Supplier1::getName()),
                    $this->eventDispatcher
                );
            case Supplier2::getName():
                return new Supplier2(
                    $this->parserFactory->getParser(ParserType::PARSER_TYPE_XML.'_'.Supplier2::getName()),
                    $this->eventDispatcher
                );

            case Supplier3::getName():
                return new Supplier3(
                    $this->parserFactory->getParser(ParserType::PARSER_TYPE_JSON.'_'.Supplier3::getName()),
                    $this->eventDispatcher
                );

            default:
                throw new \Exception("Missing supplier $supplierName");
        }
    }
}
