<?php

namespace App\Utils;

class UrlValidator
{

    public function validate($url): bool
    {
        return (bool) filter_var($url, FILTER_VALIDATE_URL);
    }
}