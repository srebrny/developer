<?php


namespace Supplier3\Parsers;


use Divante\Integration\Parser\ParserInterface;
use Divante\Integration\Parser\ParserType;
use Supplier3\Models\Supplier3JSONModel;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Supplier3JSONParser implements ParserInterface
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
        if (empty($content)) {
            throw new \Exception("Content cannot be empty");
        }

        $serializer = new Serializer(
            array(new ObjectNormalizer(), new ArrayDenormalizer()),
            array(new JsonEncoder())
        );

        /** @var Supplier3JSONModel $SupplierData */
        $SupplierData = $serializer->deserialize($content, 'Supplier3\Models\Supplier3JSONModel', 'json');

        return $SupplierData->toArray();
    }
}