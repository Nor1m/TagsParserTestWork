<?php

namespace App\Receivers;

class Receiver implements ReceiverInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        try {
            return file_get_contents($this->url);
        } catch (\Exception $e) {
            return '';
        }
    }
}