<?php


namespace Supplier2\Models;

class Supplier2XMLModel
{
    private $items = [];

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    public function setItem($item)
    {
        $this->items = $item;
    }

    public function toArray()
    {
        return ["items" => $this->items];
    }
}