<?php


namespace Supplier3\Models;


class Supplier3JSONModel
{
    private $lists = [];

    /**
     * @return array
     */
    public function getLists()
    {
        return $this->lists;
    }

    public function setList($list)
    {
        $this->lists = $list;
    }

    public function toArray()
    {
        return ["products" => $this->lists];
    }

}