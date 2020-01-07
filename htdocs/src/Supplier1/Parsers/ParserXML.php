<?php


namespace Supplier1\Parsers;


use Divante\Integration\Parser\ParserInterface;
use Divante\Integration\Parser\ParserType;
use Supplier1\Models\Supplier1XMLModel;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ParserXML implements ParserInterface
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

        /** @var Supplier1XMLModel $SupplierData */
        $SupplierData = $serializer->deserialize($content, 'Supplier1\Models\Supplier1XMLModel', 'xml');

        return $SupplierData->toArray();
    }
}