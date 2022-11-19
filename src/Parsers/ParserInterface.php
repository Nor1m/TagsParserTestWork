<?php

namespace App\Parsers;

interface ParserInterface
{
    /**
     * @param string $content
     */
    public function __construct(string $content);

    /**
     * @return array
     */
    public function getData(): array;
}