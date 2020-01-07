<?php


namespace Divante\Integration\Parser;


class ParserJson implements ParserInterface
{

    /**
     * @inheritDoc
     */
    public static function getType()
    {
        return ParserType::PARSER_TYPE_JSON;
    }

    /**
     * @inheritDoc
     */
    public function parse($content)
    {
        // TODO: Implement parse() method.
    }
}