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

/**
 * Class Supplier1
 *
 * @package Divante\Integration\Supplier
 */
class Supplier1 extends SupplierAbstract
{
    /**
     * {@inheritdoc}
     */
    public static function getName()
    {
        //TODO: write a code
    }

    /**
     * {@inheritdoc}
     */
    public static function getResponseType()
    {
        //TODO: write a code
    }

    /**
     * {@inheritdoc}
     */
    protected function parseResponse()
    {
        //TODO: write a code
    }

    /**
     * Simulate get response method
     *
     * @return string
     */
    protected function getResponse()
    {
        return file_get_contents('http://localhost/supplier1.xml');
    }
}
