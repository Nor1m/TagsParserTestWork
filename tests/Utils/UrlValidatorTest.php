<?php

namespace Utils;

use App\Utils\UrlValidator;
use PHPUnit\Framework\TestCase;

class UrlValidatorTest extends TestCase
{
    /**
     * @dataProvider urlsProvider
     */
    public function testValidate($url)
    {
        $validator = new UrlValidator($url);
        $this->assertIsBool($validator->validate());
    }

    public function testValidateTrue()
    {
        $validator = new UrlValidator('http://site.com');
        $this->assertIsBool($validator->validate());
    }

    public function testValidateFalse()
    {
        $validator = new UrlValidator('wrong');
        $this->assertIsBool($validator->validate());
    }

    public function urlsProvider(): array
    {
        return [
            'ya.ru'  => ['https://ya.ru'],
            'google.com'  => ['https://google.com'],
        ];
    }
}
