<?php

namespace Supplier2\Parsers;


use Divante\Integration\Parser\ParserInterface;
use Divante\Integration\Parser\ParserType;
use Supplier2\Models\Supplier2XMLModel;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

class Supplier2XMLParser implements ParserInterface
{

    /**
     * @inheritDoc
     */
    public static function getType()
    {
        return ParserType::PARSER_TYPE_XML;
    }

    /**
     * @inheritDoc
     */
    public function parse($content)
    {
        if(empty($content)) {
            throw new \Exception("Content cannot be empty");
        }

        $serializer = new Serializer(
            array(new ObjectNormalizer(), new ArrayDenormalizer()),
            array(new XMLEncoder())
        );

        /** @var Supplier2XMLModel $SupplierData */
        $SupplierData = $serializer->deserialize($content, 'Supplier2\Models\Supplier2XMLModel', 'xml');

        return $SupplierData->toArray();
    }
}