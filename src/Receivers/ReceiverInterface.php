<?php
namespace App\Receivers;

interface Receiver
{
    /**
     * @return string
     */
    public function getContent(string $url): string;
}