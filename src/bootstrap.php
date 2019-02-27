<?php
declare(strict_types=1);

namespace App;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$environment = 'development';

/**
 * Register the error handler
 */
$whoops = new Run;

if ($environment !== 'production') {
    $whoops->pushHandler(new PrettyPageHandler);
} else {
    $whoops->pushHandler(function (\Throwable $exception) {
        echo 'Error! Something went horribly wrong: ' . $exception->getMessage();
        echo PHP_EOL;
        echo 'Todo: Friendly error page and send an e-mail to the developer';
        echo PHP_EOL;
    });
}

$whoops->register();

throw new \Exception('Something went wrong!');