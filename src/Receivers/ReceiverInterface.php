<?php
namespace App\Receivers;

interface ReceiverInterface
{
    /**
     * @return string
     */
    public function getContent(): string;
}