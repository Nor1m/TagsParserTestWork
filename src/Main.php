<?php

namespace App;

use App\Parsers\Parser;
use App\Receivers\Receiver;
use App\Utils\UrlValidator;
use InvalidArgumentException;

class Main
{

    private $receiver;
    private $parser;


    function __constructor(Receiver $receiver, Parser $parser, UrlValidator $validator = null) {
        $this->receiver = $receiver;
        $this->parser = $parser;
        $this->validator = $validator == null ? new UrlValidator() : $validator;
    }

    /**
     * @return array
     */
    public function handle(string $url): array
    {
        $url = $this->prepareUrl($url);
        $this->validation();

        $content = $this->receiver->getContent($url);
        return $this->parser->getCountValues($content);
    }

    /**
     * @param $url
     * @return string
     */
    protected function prepareUrl($url): string
    {
        return trim($url);
    }

    /**
     * @return void
     */
    protected function validation()
    {
        $v = $this->validator;

        if (!$v->validate($this->url)) {
            throw new InvalidArgumentException("Url указан неверно!");
        }
    }
}