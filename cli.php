<?php

use App\Helpers\ConsoleHelper;
use App\Main;
require 'vendor/autoload.php';

$f = fopen( 'php://stdin', 'r' );

ConsoleHelper::colorOut("Укажите ссылку на сайт", ConsoleHelper::INFO);

while( $line = fgets( $f ) ) {

    $line = trim($line);

    if ($line) {
        try {
            $main = new Main($line);
            print_r($main->handle());
            ConsoleHelper::colorOut("Укажите ссылку на сайт", ConsoleHelper::INFO);
        } catch (Exception $e) {
            ConsoleHelper::colorOut("Указан неверный url!", ConsoleHelper::ERROR);
        }
    }

}

fclose( $f );
