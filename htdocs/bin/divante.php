<?php
/*
 * This file is part of the "Divante/Integration" package.
 *
 * (c) Divante Sp. z o. o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require __DIR__.'/../vendor/autoload.php';

use Divante\Integration\Parser\Factory as ParserFactory;
use Divante\Integration\Supplier\Factory as SupplierFactory;
use Symfony\Component\Console\Application;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Divante\Integration\Command\SupplierSync;


// Define __APP__ directory path

define("__APP__", realpath(__DIR__."/../"));

$application = new Application();

$dispatcher = new EventDispatcher();
$application->setDispatcher($dispatcher);

$application->add(
    new SupplierSync(
        "Supplier Sync",
        new SupplierFactory(
            new ParserFactory(),
            $dispatcher
        )
    )
);

$application->run();
