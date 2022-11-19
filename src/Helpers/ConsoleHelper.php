<?php

namespace App\Helpers;

class ConsoleHelper
{
    const INFO = 'i';
    const WARNING = 'w';
    const ERROR = 'e';
    const SUCCESS = 's';

    static function colorOut($string, $mode = self::INFO)
    {
        switch ($mode) {
            case self::ERROR:
                echo "\033[31m{$string} \033[0m\n";
                break;
            case self::SUCCESS:
                echo "\033[32m{$string} \033[0m\n";
                break;
            case self::WARNING:
                echo "\033[33m{$string} \033[0m\n";
                break;
            case self::INFO:
                echo "\033[36m{$string} \033[0m\n";
                break;
            default:
                echo $string;
                break;
        }
    }
}