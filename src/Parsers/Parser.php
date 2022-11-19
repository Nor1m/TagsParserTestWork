<?php

namespace App\Parsers;

class Parser implements ParserInterface
{
    /**
     * @var string
     */
    private $content;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->getCountValues();
    }

    /**
     * @return array
     */
    private function getCountValues(): array
    {
        preg_match_all('/<([^\/!][a-z1-9]*)/i', $this->content, $matches);
        return array_count_values($matches[1]);
    }
}