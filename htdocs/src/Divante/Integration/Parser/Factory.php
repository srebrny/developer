<?php


namespace Divante\Integration\Parser;

use Supplier1\Parsers\ParserXML;
use Supplier1\Supplier1;
use Supplier2\Parsers\Supplier2XMLParser;
use Supplier2\Supplier2;

/**
 * Class Factory
 * @package Divante\Integration\Parser
 */
class Factory implements FactoryInterface
{

    /**
     * @inheritDoc
     */
    public function getParser($type)
    {
        if ($type === ParserType::PARSER_TYPE_XML.'_'.strtoupper(Supplier1::getName())) {
            return new ParserXML();
        }

        if ($type === ParserType::PARSER_TYPE_XML.'_'.strtoupper(Supplier2::getName())) {
            return new Supplier2XMLParser();
        }

        if ($type === ParserType::PARSER_TYPE_JSON) {
            return new ParserJson();
        }

        throw new \Exception("Missing parser types? \"$type\"?");
    }
}