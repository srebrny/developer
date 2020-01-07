<?php


namespace Divante\Integration\Parser;

use Supplier1\Parsers\ParserXML;

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
        if ($type === ParserType::PARSER_TYPE_XML) {
            return new ParserXML();
        }

        if($type === ParserType::PARSER_TYPE_JSON) {
            return new ParserJson();
        }

        throw new \Exception("Missing parser types? \"$type\"?");
    }
}