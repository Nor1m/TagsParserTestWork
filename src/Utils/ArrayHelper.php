<?php

namespace App\Utils;

class ArrayHelper
{
    static function getArrayItemsSum(array $array): int
    {
        $sum = 0;
        foreach($array as $item)
            $sum += $item;

        return $sum;
    }
}