<?php

namespace App\Utils;

class UrlValidator
{
    private $url;

    /**
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function validate(): bool
    {
        return (bool) filter_var($this->url, FILTER_VALIDATE_URL);
    }
}