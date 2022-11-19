<?php

use App\Main;
use App\Utils\ArrayHelper;

require '../vendor/autoload.php';

if( isset($_GET['url']) ) {
    $url = $_GET['url'];
} else {
    throw new InvalidArgumentException("Не передан обязательный параметр: url");
}

try {
    $main = new Main($url);
    echo output($url, $main->handle());
} catch (Exception $e) {
}

function output($url, $data): string
{
    $result = "<h3>Информация о кол-ве тегов на сайте {$url}:</h3>";
    foreach ($data as $tag => $count) {
        $result .= "<b>" . $tag . "</b> ({$count} шт.)<br>";
    }

    $tagsCount = ArrayHelper::getArrayItemsSum($data);
    $result .= "<br>Всего тегов: <b>{$tagsCount}</b>";

    return strip_tags($result, '<b><br><h3>');
}