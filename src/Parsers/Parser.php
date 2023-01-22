<?php

namespace App\Parsers;

interface Parser
{

    /**
     * @return array
     */
    public function getCountValues(string $content): array;
}
