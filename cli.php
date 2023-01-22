<?php

use App\Helpers\ConsoleHelper;
use App\Main;
require 'vendor/autoload.php';
require 'di.php';

$f = fopen( 'php://stdin', 'r' );

ConsoleHelper::colorOut("Укажите ссылку на сайт", ConsoleHelper::INFO);

$main = getMain()

while( $line = fgets( $f ) ) {

    $line = trim($line);

    if ($line) {
        try {
            print_r($main->handle($line));
            ConsoleHelper::colorOut("Укажите ссылку на сайт", ConsoleHelper::INFO);
        } catch (Exception $e) {
            ConsoleHelper::colorOut("Указан неверный url!", ConsoleHelper::ERROR);
        }
    }

}

fclose( $f );
