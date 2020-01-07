<?php


namespace Supplier1\Models;


class Supplier1XMLModel
{
    private $products = [];

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function setProduct($product)
    {
        $this->products = $product;
    }

    public function toArray()
    {
        return ["products" => $this->products];
    }
}