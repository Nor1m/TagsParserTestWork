<?php

namespace App;

use App\Parsers\Parser;
use App\Receivers\Receiver;
use App\Utils\UrlValidator;
use InvalidArgumentException;

class Main
{
    /**
     * @var string
     */
    private $url;
    /**
     * @var Receiver
     */
    private $receiver;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $this->prepareUrl($url);
        $this->validation();
        $this->receiver = new Receiver($this->url);
    }

    /**
     * @return array
     */
    public function handle(): array
    {
        $content = $this->receiver->getContent();
        $parser = new Parser($content);
        return $parser->getData();
    }

    /**
     * @param $url
     * @return string
     */
    private function prepareUrl($url): string
    {
        return trim($url);
    }

    /**
     * @return void
     */
    private function validation()
    {
        $validator = new UrlValidator($this->url);
        if (!$validator->validate()) {
            throw new InvalidArgumentException("Url указан неверно!");
        }
    }
}